/**
 *   使用说明
 *
 *   $(selector).mmlpage(currentPage, totalPages[, options]);
 *
 *   options为一个对象，有以下参数设置
 *   prev:           上一页的文本，默认值为false
 *   next:           下一页的文本，默认值为false
 *   ellipsis:       省略号的文本，默认值为┅
 *   siblings:       相邻显示的页码数量，默认值为2，当设置为false时，只显示上一页与下一页
 *   pageClass:      页码的class名，默认值为mml-page
 *   activeClass:    当前页的class名，默认值为mml-active
 *   href:           页码的href属性
 *   click:          页码点击回调函数，只对第一次设置起效
 *
 **/
;(function($){
    $.fn.mmlpage = function(p, pages, options){
        this.each(function(){
            p -= 0;
            pages -= 0;
            if(pages < p) return;
            var html = '',
                def = {
                    siblings: 2,
                    pageClass: 'mml-page',
                    activeClass: 'mml-active',
                    ellipsis: '┅'
                };

            if( options ){
                def = $.extend(def, options);
                this.$settings = def;
            } else {
                def = this.$settings || def;
            }

            var siblings = def.siblings,
                href = def.href,
                term = def.term,
                prev, next;
            console.log(href);
            if(siblings === false){
                // prev = p > 1? (p - 1): 1;
                // next = p === pages? pages: (p + 1);
                if (p > 1){
                    prev = p - 1;
                    html += formatPage(def.pageClass +' mml-page-prev mml-page-btn', prev, (def.prev? def.prev: 'PREV'), href,term);
                }
                if (p !== pages){
                    next = p + 1;
                    html += formatPage(def.pageClass +' mml-page-next mml-page-btn', next, (def.next? def.next: 'NEXT'), href,term);

                }
                // html += formatPage(def.pageClass +' mml-page-next', next, (def.next? def.next: 'NEXT'), href,term);
                this.innerHTML = html;
                return;
            }

            html = '<a'+ (href? ' href="'+ href + p +(term ? '?cate='+term :'')+'"': '') +' class="'+ def.pageClass +' '+ def.activeClass +'">'+ p +'</a>';

            ++siblings;
            var i = 1;
            for(; i < siblings; i++){
                prev = p - i;
                next = p + i;
                if(prev > 1){ html = formatPage(def.pageClass, prev, prev, href,term) + html; }
                if(next < pages){ html += formatPage(def.pageClass, next, next, href,term); }
            }

            if(p - siblings > 1){
                html = formatPage(def.pageClass, 1, 1, href,term) +'<span class="mml-ellipsis">'+ def.ellipsis +'</span>'+ html;
            } else if(p != 1){
                html = formatPage(def.pageClass, 1, 1, href,term) + html;
            }

            if(p + siblings < pages){
                html += '<span class="mml-ellipsis">'+ def.ellipsis +'</span>'+ formatPage(def.pageClass, pages, pages, href,term);
            } else if(p != pages){
                html += formatPage(def.pageClass, pages, pages, href,term);
            }

            if( def.prev ){
                // prev = p > 1? (p - 1): 1;
                // html = formatPage(def.pageClass +' mml-page-prev', prev, (def.prev? def.prev: '上页'), href,term) + html;
                if (p > 1){
                    prev = p - 1;
                    html = formatPage(def.pageClass +' mml-page-prev mml-page-btn', prev, (def.prev? def.prev: '上页'), href,term) + html;
                }

            }
            if( def.next ){
                // next = p === pages? pages: (p + 1);
                // html += formatPage(def.pageClass +' mml-page-next', next, (def.next? def.next: '下页'), href,term);
                if (p !== pages){
                    next = p + 1;
                    html += formatPage(def.pageClass +' mml-page-next mml-page-btn', next, (def.next? def.next: '下页'), href,term);
                }
            }

            this.innerHTML = html;

            if( typeof def.click === 'function' ){
                var self = this;
                var fn = self.$clickfn;
                if( fn ) return;
                self.$clickfn = function( e ){
                    var tar = e.target;
                    while(tar !== this){
                        if(tar.matches('[data-page]')){
                            def.click.call(tar, tar.dataset.page - 0, tar);
                            break;
                        }
                        tar = tar.parentNode;
                    }
                }
                this.addEventListener('click', self.$clickfn);
            }
        });

        return this;
    }

    function formatPage(pageClass, p, text, href,term){
        return '<a'+ (href? ' href="'+ href + p +(term ? '?cate='+term :'') +'"': '') +' class="'+ pageClass +'" data-page="'+ p +'">'+ text + '</a>';
    }

})(jQuery);
