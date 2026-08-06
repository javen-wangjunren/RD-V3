/*
 * @Author: Alan
 * @Date: 2020-08-28 16:25:09
 * @Last Modified by: Alan
 * @Last Modified time: 2020-09-15 10:27:53
 */

// ⚠使用说明：请参考文档： https://shimo.im/docs/hXwPPYJQQ9rHKkC3/ 《购物车插件 》

const ShoppingCart = function(config) {
    config = config || {};
    const $ = config['jQuery'] || jQuery;
    const _this = this;

    const SC_PRODUCT_WRAPPER = '.sc-product-wrapper'; // 所有产品的总父级类名
    const SC_PRODUCT_ITEMS = '.sc-product-items'; // 每个产品对应的包裹父级类名
    const SC_PRODUCT_ITEM = '.sc-product-item'; // 每个产品内所要保存进缓存中的数据的公共类名

    const SC_NUM = '.sc-num'; // 显示购物车数量的元素
    const SC_ADD = '.sc-add'; // 添加购物车按钮
    const SC_DELETE = '.sc-delete'; // 删除购物车按钮
    const SC_CLEAR = '.sc-clear'; // 清空购物车按钮

    const SC_RENDER = '.sc-render'; // 渲染购物车元素的父级包裹标签

    const SC_LISTEN = '.sc-listen'; // 需要对 input、select、textarea 等标签进行监听的父级包裹元素

    const SC_DATA_ID = 'data-sc-id'; // 每个产品对应的包裹元素的 id 属性
    const SC_DATA_KEY = 'data-sc-key'; // 每个产品的所要保存进购物车的子元素的 key 属性

    config.storageType ? '' : config.storageType = 'localStorage'; //缓存类型默认为本地缓存(重启浏览器后依然生效)
    config.storageName ? '' : config.storageName = 'MML-SHOPCART-PRODUCT'; //缓存属性名默认为 MML-SHOPCART-PRODUCT
    const storage = window[config.storageType]; //存储类型分两种: window.localStorage和 window.sessionStorage

    let logTimer = null;

    //获取storage缓存中的购物车数据
    _this._getCartData = function() {
        return storage[config.storageName] ? JSON.parse(storage[config.storageName]) : [];
    };
    //获取storage缓存中的购物车数据长度
    _this._getCartLen = function() {
        return storage[config.storageName] ? JSON.parse(storage[config.storageName]).length : 0;
    };
    //更新购物车数字
    _this._upadteNum = function() {
        let num = _this._getCartLen();
        $(SC_NUM).text(num);
    };
    //根据当前需要调用的初始化方法来返回 true 或 false 以决定是否执行某些代码
    _this._isRun = function(func) {
        let useFunc = config.useFunc;
        return useFunc && Array.isArray(useFunc) ? useFunc.includes(func) : true; // 如果没传iniFunc或者不为数组类型,则默认返回true
    };
    //对购物车数组进行增删改查的操作
    _this._handleCartData = function(query) {
        let productArr = _this._getCartData(); //获取storage缓存中的购物车数据
        for (let i = 0; i < productArr.length; i++) {
            if (productArr[i].id === query.id) {
                switch (query.operation) {
                    case 'add':
                        if (!config.allowRepeat) {
                            // 若不允许重复添加
                            return '已添加过该产品'; // 如果购物车匹配到该id,说明已添加过,返回false不再添加
                        } else {
                            //  若允许重复添加
                            return '允许继续添加同一个产品';
                        }
                    case 'update':
                        if (query.value.type === 'checkbox') {
                            let newValue = $.extend(productArr[i][query.tag], query.value); // 复选框要保存所有选中状态,先$.extend()方法合并对象再赋值
                            delete newValue.type;
                            productArr[i][query.tag] = newValue;
                        } else {
                            productArr[i][query.tag] = query.value; // 其它类型的表单元素也是直接覆盖赋值
                        }
                        break;
                    case 'delete':
						let block = typeof config.beforeDelete === 'function' ? config.beforeDelete() : true;
                        if (typeof block === 'undefined') {
							// 不返回（没有 return 语句，或者 return 后没有任何东西），删除
							productArr.splice(i, 1); // 删除
                        } else if (typeof block === 'boolean' && block === true) {
							// 若 return false , 则不删除。
							// false 表示阻止既定操作
							productArr.splice(i, 1); // 删除
                        } else if (typeof block.then === 'function') {
							// 若 返回 promise , 则在 then 删除
							block.then(function () {
								productArr.splice(i, 1); // 删除
								_this._updateStorage(productArr);
								_this._upadteNum();
								_this._isEmpty();
								_this._render()
							}).catch(err => {})
						}
                        break;
                }
                break;
            }
        }

        _this._updateStorage(productArr); //保存进storage
    };
    //同步已添加进购物车的产品中已编辑好的选项
    _this._initEdited = function() {
        //只有在不允许重复添加同一产品的时候,才可对产品详情页已编辑好的选项初始化
        if (!config.allowRepeat) {
            let productArr = _this._getCartData(); //获取storage缓存中的购物车数据
            let dom = $('[data-sc-id]');
            dom.each(function(index, ele) {
                let id = $(ele).attr('data-sc-id');
                for (let i = 0; i < productArr.length; i++) {
                    if (productArr[i].id === id) {
                        for (let key in productArr[i]) {
                            let currentDom = $(ele).find($('[data-sc-key=' + key + ']'));
                            if (currentDom.length !== 0) {
                                let nodeType = currentDom[0].nodeName;
                                if (nodeType === 'INPUT' || nodeType === 'TEXTAREA' || nodeType === 'SELECT') {
                                    let value = productArr[i][key];
                                    switch (nodeType) {
                                        case 'INPUT':
                                            let inputType = currentDom.attr('type');
                                            switch (inputType) {
                                                case 'radio':
                                                    currentDom.each(function(index, ele2) {
                                                        if (ele2.value === value) {
                                                            $(ele2).attr('checked', true);
                                                        }
                                                    });
                                                    break;
                                                case 'checkbox':
                                                    currentDom.each(function(index, ele2) {
                                                        let chexcBoxArr = value.split(" ");
                                                        if (chexcBoxArr.includes(ele2.value)) {
                                                            $(ele2).attr('checked', true);
                                                        }
                                                    });
                                                    break;
                                                default:
                                                    currentDom.val(value);
                                                    break;
                                            }
                                            break;
                                        case 'TEXTAREA':
                                            currentDom.val(value);
                                            break;
                                        case 'SELECT':
                                            currentDom.val(value);
                                            break;
                                    }
                                }
                            }
                        }
                    }
                }
            });
        }
    };
    //一开始对于下拉选择框,如果用户并没有点击到,则缓存中不会保存相关数据,但用户看到的界面以为默认选中第一条,所以我们在缓存中需要默认选中第一条
    _this._initStorage = function() {
        let productArr = _this._getCartData(); //获取storage缓存中的购物车数据
        let selectTag = $(SC_PRODUCT_ITEMS).eq(0).find('select');
        selectTag.each(function(index, ele) {
            let key = $(ele).attr('data-sc-key');
            let value = $(ele).find('option').eq(0).text() || $(ele).find('option').eq(0).val();
            for (let i = 0; i < productArr.length; i++) {
                // 如果该下拉选择框未赋值,则将第一个选中的选项作为默认值进行赋值
                if (!productArr[i][key]) {
                    productArr[i][key] = value;
                }
            }
        });

        _this._updateStorage(productArr); //保存进storage
    };
    //将购物车数组格式化为字符串后再插入storage(storage无法存储引用值,所以用JSON.stringify转换成字符串再存入)
    _this._updateStorage = function(productArr) {
        storage[config.storageName] = JSON.stringify(productArr); //保存进storage
        _this._log();
    };
    //渲染出购物车的元素
    _this._render = function() {
        let productArr = _this._getCartData(); // 获取storage缓存中的购物车数据
        if (typeof config.renderDom === 'function') {
            let dom = config.renderDom(productArr); // 将 renderDom 函数返回的dom结构字符串插入页面
            $(SC_RENDER).html(dom);
        } else {
            if (typeof config.useFunc !== 'undefined') {
                alert('检查到您在useFunc数组里添加了render参数，请正确定义renderDom方法');
            }
        }
    };
    //当购物车为空或不为空时显示不同的section板块
    _this._isEmpty = function() {
        let num = _this._getCartLen();
        if (num === 0) {
            $('.shopcart-empty').show();
            $('.shopcart-noempty').hide();
        } else {
            $('.shopcart-empty').hide();
            $('.shopcart-noempty').show();
        }
    };
    //监听购物车页面备注信息或者下拉选择框等元素的修改
    _this._listenMes = function() {
        let timer = null;
        //监听购物车表单元素内容变化
        $(SC_LISTEN).on('input change', 'input,textarea,select', function(e) {
            let dom = this;
            if (timer) {
                window.clearInterval(timer); // 函数防抖
            };
            timer = setTimeout(function() {
                let id = $(dom).parents(SC_PRODUCT_ITEMS).attr(SC_DATA_ID); // 修改元素在购物车中所属对象的data-sc-id值
                let key = $(dom).attr('data-sc-key'); // 当前修改元素的data-sc-key值
                let inputType = $(dom).attr('type'); // 当前input框所对应的类型(文本框、单选框、复选框等)
                let value = dom.value; // 所要更新的值

                // 如果input元素的单选框或者复选框, 进行特殊处理
                if (inputType === 'checkbox' || inputType === 'radio') {
                    let tag = $(dom).attr('data-sc-tag'); //取出当前标签的 tag 名作为属性名
                    //单选框
                    if (inputType === 'radio') {
                        _this.update(id, key + '-radio', { // 用当前元素的 name名记录下该元素的选中状态,方便渲染出选中效果
                            [tag]: true
                        });
                    }
                    //复选框
                    if (inputType === 'checkbox') {
                        _this.update(id, key + '-checkbox', { // 用当前元素的 name名记录下该元素的选中状态,方便渲染出选中效果
                            [tag]: $(dom).prop('checked'),
                            type: 'checkbox'
                        });
                        // 如果当前操作的是复选框, 对 value 值进行拼接
                        let checkboxArr = $(dom).parents(SC_PRODUCT_ITEMS).find($("input[type='checkbox'][data-sc-key=" + key + "]:checked"));
                        value = '';
                        checkboxArr.each(function(index, ele) {
                            value += $(ele).val() + ' ';
                        });
                    }
                }
                _this.update(id, key, value.trim()); // 更新购物车中的当前元素
            }, 300); // 每300毫秒最多执行一次
        });
    };
    //打印出购物车的数据
    _this._log = function() {
        //这里用定时器的原因是因为有时候会一次性从控制台打印出两条(遇到单选框和复选框的时候),但我只希望打印出一条就够了
        logTimer ? window.clearTimeout(logTimer) : '';
        logTimer = setTimeout(() => {
            let date = new Date();
            let now = date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
            let arr = _this._getCartData();
            _this._betterLog(arr);
            console.log(now, "当前购物车数据:", arr);
        });
    };
    // 优化打印的购物车数据 (去掉保存单选框和复选框状态的属性)
    _this._betterLog = function(arr) {
        let deleteKeys = [];
        typeof arr[0] === 'object' && function() {
            let keys = Object.keys(arr[0]);
            keys.map(ele => {
                if (ele.match(/-checkbox|-radio$/)) {
                    deleteKeys.push(ele);
                }
            });
        }();
        arr.forEach(ele => {
            deleteKeys.forEach(key => {
                delete ele[key];
            });
        });
    };
    //加入购物车元素操作
    _this.add = function(dom) {
        let id = $(dom).parents(SC_PRODUCT_ITEMS).attr(SC_DATA_ID);
        config.allowRepeat ? id += '-' + new Date().valueOf() : ''; // 如果是允许重复添加, 则给id拼接上时间戳
        let query = {
            operation: 'add',
            id: id
        };
        let productItems = $(dom).parents(SC_PRODUCT_ITEMS)[0];
        let productArr = _this._getCartData(); //获取storage缓存中的购物车数据

        if (_this._handleCartData(query) !== '已添加过该产品') {
            let shopCartItems = $(dom).parents(SC_PRODUCT_ITEMS).find(SC_PRODUCT_ITEM); //找出当前产品所有要存入storage中的元素集合(这里要给img标签、h标签或p标签加上sc-product-items-item类名)
            let item = {};
            item.id = id; //把该产品所对应的唯一 id 保存进去
            shopCartItems.each(function(index, ele) {
                //遍历当前产品所有要存入storage的属性
                let key = $(ele).attr(SC_DATA_KEY);
                let value = null;
                let nodeType = $(ele).prop('nodeName');
                if (nodeType === 'INPUT') {
                    let inputType = $(ele).attr('type');
                    switch (inputType) {
                        case 'text':
                            value = $(ele).val();
                            break;
                        case 'radio':
                            let tag = $("input[type='radio'][data-sc-key=" + key + "]:checked").attr('data-sc-tag');
                            value = $("input[type='radio'][data-sc-key=" + key + "]:checked").val();
                            tag && (item[key + '-radio'] = {
                                [tag]: true
                            });
                            break;
                        case 'checkbox':
                            if (typeof item[key] === 'undefined') item[key] = "";
                            if (typeof item[key + '-checkbox'] === 'undefined') item[key + '-checkbox'] = {};
                            if ($(ele).prop('checked')) {
                                let tag = $(ele).attr('data-sc-tag');
                                value = item[key] + " " + $(ele).val();
                                item[key + '-checkbox'][tag] = true;
                            } else {
                                value = item[key];
                            }
                            break;
                    }
                } else if (nodeType === 'TEXTAREA' || nodeType === 'SELECT') {
                    value = $(ele).val();
                } else if (nodeType === 'IMG') {
                    value = $(ele).attr('src');
                } else {
                    value = $(ele).text();
                }
                value = value ? value.replace(/[\r\n]/g, "") : ''; //去除所有换行符
                item[key] = value ? value.trim() : ''; //去除前后空格
            });

            productArr.push(item);

            _this._updateStorage(productArr); //保存进storage
            _this._betterLog(productArr);
            typeof config.addSuccessCallback === 'function' ? config.addSuccessCallback(productItems, productArr) : ''; //将父级包裹元素和当前购物车的数据作为参数传入
        } else {
            typeof config.addErrorCallback === 'function' ? config.addErrorCallback(productItems, productArr) : alert('请勿重复添加,若要重复添加,请将所有相关页面的 allowRepeat 属性都设为true'); // 执行添加失败回调
        }

        _this._initStorage(); // 初始化缓存中的某些属性(目前只需初始化下拉选择框属性)
    };
    //更新购物车数据
    _this.update = function(id, tag, value) {
        let query = {
            operation: 'update',
            id: id,
            tag: tag,
            value: value
        };
        _this._handleCartData(query);
    };
    //删除购物车元素操作
    _this.delete = function(dom) {
        let query = {
            operation: 'delete',
            id: $(dom).parents(SC_PRODUCT_ITEMS).attr(SC_DATA_ID)
        };
        _this._handleCartData(query);
    };
    //清空购物车操作
    _this.clear = function() {
        let block = typeof config.beforeDelete === 'function' ? config.beforeClear() : true;
        if (block) {
            storage.removeItem(config.storageName);
            _this._log();
        }
    };
    //给按钮绑定事件
    _this.bindEvent = function() {
        //加入购物车按钮点击事件(如果按钮是动态渲染出来的,注意不能直接给 .mml-sc-add-btn 按钮绑定事件,不然是绑定不到的)
        _this._isRun('add') && $(SC_PRODUCT_WRAPPER).on('click', SC_ADD, function() {
            _this.add(this);
            _this._upadteNum();
        });
        //删除购物车按钮点击事件(如果按钮是动态渲染出来的,注意不能直接给 .mml-sc-add-btn 按钮绑定事件,不然是绑定不到的)
        _this._isRun('delete') && $(SC_RENDER).on('click', SC_DELETE, function() {
            _this.delete(this);
            _this._upadteNum();
            _this._render();
            _this._isEmpty();
        });
        //清空购物车按钮点击事件
        _this._isRun('clear') && $(SC_PRODUCT_WRAPPER).on('click', SC_CLEAR, function() {
            _this.clear();
            _this._upadteNum();
            _this._render();
            _this._isEmpty();
        });
    };
    //页面初始化
    _this.init = function() {
        _this.bindEvent(); // 初始化绑定事件
        _this._upadteNum(); // 初始化顶部购物车图标数字
        _this._isRun('render') && _this._render(); // 初始化购物车页面内容
        _this._isRun('isEmpty') && _this._isEmpty(); //根据购物车是否为空显示购物车页面不同的板块
        _this._isRun('listen') && _this._listenMes(); //监听购物车表单元素内容变化
        _this._isRun('initEdited') && _this._initEdited(); // 在产品详情页初始化已经编辑过的选项
        _this._initStorage(); // 初始化缓存中的某些属性(目前只需初始化下拉选择框属性)
        typeof config.initFunc === 'function' ? config.initFunc(_this._getCartData()) : ''; //执行自定义的初始化执行代码
    };
    _this.init();
};
