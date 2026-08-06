;(function(doc, win){

    const $toolkits = doc.querySelector('.brk-list');
    const $sketch = doc.querySelector('.brk-sketch');
    const $contextmenu = doc.querySelector('.brk-contextmenu');
    const $editor = doc.querySelector('.brk-editor');
    const $pages = doc.querySelector('.brk-pages');
    const $styles = doc.getElementById('section-styles');
    const $scripts = doc.getElementById('section-scripts');
    const $message = doc.querySelector('.brk-message');

    let $brick = null;
    let $copy = null;   // 被复制对象
    let $exchanger = null;  // 被交换对象


    // 消息提醒
    let messageTtl = null;
    let message = txt => {
        $message.innerHTML = txt;
        $message.classList.add('brk-active');
        messageTtl && clearTimeout( messageTtl );
        messageTtl = setTimeout(() => {
            $message.classList.remove('brk-active');
        }, 5000);
    }

    // 生成请求数据结构 FormData
    let formatSectionReq = kv => {
        let data = new FormData();
        data.append('action', 'mml_section_get_code');
        Object.keys( kv ).forEach( k => {
            if( k === 'style' ) kv['style']['class'] = (kv['style']['class'] || '')+ ' brk-section';
            if( k === 'content' || k === 'style' ) kv[k] = JSON.stringify(kv[k]);
            data.append(k, kv[k]);
        });
        return data;
    }

    // 将 HTML 转换为 节点
    let parseHTML = html => {
        let div = doc.createElement( 'DIV' );
        div.innerHTML = html;
        return div.firstElementChild;
    }

    // 根据数组生成页面结构
    let initTemplate = async sections => {
        let styles = '';
        let htmls = doc.createDocumentFragment();
        let scripts = doc.createDocumentFragment();
        for await ( let section of sections ){
            let res = await fetch('/wp-admin/admin-ajax.php', {
                body: formatSectionReq( section ),
                method: 'POST'
            }).then(res => res.json());

            if( res.success ){
                styles += `<style data-id='${section.id}'>${res.data.style}</style>`;
                
                let html = parseHTML( res.data.html );
                html.$data = section;
                htmls.append( html );
                
                let script = doc.createElement( 'SCRIPT' );
                script.innerHTML = res.data.script;
                script.dataset.id = section.id;
                scripts.append( script );
            } else {
                message( `获取组件 <b>${section.name}#${section.id}</b> 失败` );
            }
        }
        
        $styles.innerHTML = styles;
        $sketch.append( htmls );
        $scripts.append( scripts );

        // 移除 sketch 里所有<a>标签的[href]属性，禁止跳转
        Array.from( $sketch.getElementsByTagName('a') ).forEach( $a => { $a.removeAttribute('href'); });

        $sketch.classList.remove('brk-loading');
    }

    // 创建编辑框表单
    let createEditForm = ( name, configs ) => {
        $editor.firstElementChild.innerHTML = `<a data-act="cancel">&lt; ${name}</a><a data-act="save">保存</a>`;
        $editor.lastElementChild.innerHTML = `<label><span>ID *</span><input type="text" name="id"></label>
                                            <label><span>Style</span><textarea name="style" rows="3"></textarea></label>`;
    }


    // 创建 Section
    let createSection = async () => {
        let $inputs = doc.forms['brk-editor'].elements;
        let id = $inputs['id'].value;
        if( !id || $styles.querySelector(`[data-id='${id}']`) ){
            message( 'ID值为空或已重复' );
            return;
        }

        let css = $editor.classList;
        css.add( 'brk-saving' );

        let name = $editor.dataset.section;
        let style = {};
        let content = {};

        let res = await fetch('/wp-admin/admin-ajax.php', {
            body: formatSectionReq({ id, name, style, content }),
            method: 'POST'
        }).then( res => res.json() );

        if( res.success ){
            let $rel = $editor.$rel;
            if( $editor._status === 1 ){
                // 新建 section
                $styles.insertAdjacentHTML( 'beforeend', `<style data-id="${id}">${res.data.style}</style>` );

                let $html = parseHTML( res.data.html );
                $html.$data = { id, name, style, content };
                // 移除<a>标签的[href]属性，禁止跳转
                Array.from( $html.getElementsByTagName('a') ).forEach( $a => { $a.removeAttribute('href'); });

                $rel.insertAdjacentElement( $rel === $sketch? 'afterbegin': 'afterend', $html );

                let $script = doc.createElement( 'SCRIPT' );
                $script.innerHTML = res.data.script;
                $script.dataset.id = id;
                $scripts.append( $script );

            } else if( $editor._status === 2 ){
                // 编辑 section

            }
            $rel = $html = $script = null;

        } else {
            message( `获取组件 <b>${name}#${id}</b> 失败` );
        }
        $editor.$rel = null;
        $editor.className = 'brk-editor';
    }


    // 搜索组件功能
    let search = ( key, maps ) => {
        let $list = doc.querySelector('.brk-list');
        let keys = Object.keys( maps );
        let html = '';

        key = key.toLowerCase();
        for( let k of keys ){
            if( maps[k] !== false && k.toLowerCase().includes(key) ){
                html += `<li class="brk-li" data-name="${k}">${maps[k]}</li>`;
            }
        }

        $list.innerHTML = html || '<li class="brk-404">未找到相关组件</li>';
    }

    let initSearch = ( maps = {} ) => {
        let $input = doc.querySelector('.brk-search input');
        let $btn = $input.nextElementSibling;
        
        $btn.addEventListener('click', () => { search($input.value, maps); });
        $input.addEventListener('keypress', e => { e.which === 13 && search( $input.value, maps ); });
    }

    
    // 从侧边栏拖拽组件
    $toolkits.addEventListener('mousedown', e => {
        let tar = e.target;
        let name = tar.dataset.name;
        if( name ){
            $brick = doc.createElement( 'DIV' );
            $brick.className = 'brk-brick';
            $brick.style.cssText = `left:${e.clientX}px;top:${e.clientY}px;`;
            $brick.innerHTML = $brick.dataset.init = name;
            doc.body.append( $brick );
            $sketch.classList.add( 'wait4-drop' );
        }
    });

    doc.addEventListener('mousemove', e => {
        if( !$brick ) return false;
        $brick.style.cssText = `left:${e.clientX}px;top:${e.clientY}px;`;
    });

    // 释放拖拽
    doc.addEventListener('mouseup', e => {
        if( !$brick ) return false;
        let tar = e.target;
        let $container = $sketch.parentNode;

        while( tar !== $container && tar.nodeType !== 9 ){
            if( tar.classList.contains('brk-section') || tar === $sketch ){
                let name = $brick.dataset.init;
                if( name ){
                    // 新建组件
                    $editor.dataset.section = name;
                    $editor.$rel = tar;
                    $editor._status = 1;
                    createEditForm( name );
                    $editor.classList.add('brk-active');

                } else if( $exchanger !== tar && tar.classList.contains('brk-section') ) {
                    // 交换组件
                    let $prev = $exchanger.previousElementSibling;
                    let $next = tar.nextElementSibling;

                    if( tar.previousElementSibling === $exchanger ){
                        tar.insertAdjacentElement('afterend', $exchanger);
                    } else {
                        tar.insertAdjacentElement('beforebegin', $exchanger);
                        $prev? $prev.insertAdjacentElement('afterend', tar): $next.insertAdjacentElement('beforebegin', tar);
                    }
                    tar = $sketch.parentNode;
                    $prev = $next = null;
                }
            }
            tar = tar.parentNode;
        }
        
        $sketch.classList.remove( 'wait4-drop' );
        $sketch.classList.remove( 'wait4-exchange' );
        $brick.remove();
        $brick = tar = $exchanger = $container = null;

    });
    
    // sketch内拖拽交换位置
    $sketch.addEventListener('mousedown', e => {
        let tar = e.target;
        while( tar !== $sketch ){
            if( tar.classList.contains('brk-section') && e.which !== 3 ){
                $sketch.classList.add( 'wait4-exchange' );

                $brick = doc.createElement( 'DIV' );
                $brick.className = 'brk-brick';
                $brick.style.cssText = `left:${e.clientX}px;top:${e.clientY}px;`;
                $brick.innerHTML = `&lt;${tar.$data.name}&gt;#${tar.$data.id}`;
                $exchanger = tar;
                doc.body.append( $brick );

            }
            tar = tar.parentNode;
        }
    });

    // 右键菜单
    $sketch.addEventListener('mouseup', e => {
        let tar = e.target;
        $contextmenu.classList.remove('brk-active');
        while( tar !== $sketch ){
            if( tar.classList.contains('brk-section') && e.which === 3 ){
                $contextmenu.style.cssText = `left:${e.clientX}px;top:${e.clientY}px`;
                $contextmenu.$target = tar;
                $contextmenu.classList.add('brk-active');
            }
            tar = tar.parentNode;
        }
    });

    

    // 右键菜单选项
    $contextmenu.addEventListener('click', e => {
        let tar = e.target;
        let act = tar.dataset.act;
        if( act && $contextmenu.$target ){
            let $section = $contextmenu.$target;
            switch( act ){
                case 'edit':
                    $editor.classList.add('brk-active');
                    createEditForm( $section.$data.name );
                    $editor.$rel = $section;
                    $editor._status = 2;
                break;
                case 'copy':
                    $copy = $section;
                break;
                case 'paste':
                    if( $copy ){
                        let $clone = $copy.cloneNode( true );
                        $clone.$data = $copy.$data;
                        $section.insertAdjacentElement('afterend', $clone);
                    }
                break;
                case 'remove':
                    $editor.classList.remove('brk-active');
                    let id = $section.$data.id;
                    let $style = $styles.querySelector(`[data-id=${id}]`);
                    let $script = $scripts.querySelector(`[data-id=${id}]`);
                    $style && $style.remove();
                    $script && $script.remove();
                    $section.remove();
                break;
                default: break;
            }
        }
        $contextmenu.classList.remove('brk-active');
        $contextmenu.$target = null;
    });

    // 属性编辑框
    $editor.children[0].addEventListener('click', e => {
        let tar = e.target;
        let act = tar.dataset.act;
        if( act === 'cancel'){
            $editor.classList.remove('brk-active');
        } else if( act === 'save' ){
            createSection();
        }
    });


    // 保存页面
    doc.querySelector('.brk-save').addEventListener('click', () => {

    });
    

    // 事件绑定杂项
    $pages.addEventListener('click', e => {
        e.stopPropagation();
        $pages.querySelector('.brk-dropdown').classList.add('brk-active');
        return false;
    });
    doc.querySelector('.brk-sidebar').addEventListener('click', () => { $pages.querySelector('.brk-dropdown').classList.remove('brk-active'); });
    doc.querySelector('.brk-tgl-sidebar').addEventListener('click', () => { $sketch.parentNode.classList.toggle('brk-off-sidebar'); });
    $message.addEventListener('click', () => {
        messageTtl && clearTimeout( messageTtl );
        $message.classList.remove('brk-active');
    });

    


    let WALL = [
        { id: 'p1-2', name: 'Feature_002', content: {}, style: {} },
        { id: 'p1-3', name: 'Feature_010', content: {}, style: {} }
    ];
    
    // 初始化模板
    initTemplate( WALL );

    // 初始化搜索组件功能
    fetch('/wp-content/themes/mml-theme/sections.json')
    .then( res => res.json() )
    .then( res => {
        initSearch( res );
    });


})(document, window);