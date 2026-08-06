"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

/**
 * MML Cart
 *
 * 使用方法:
 * <script src="/wp-content/themes/mml-theme/dist/js/cart.js"></script>
 * 默认不存在这个文件，在使用前请先执行 npm run gulp-cart ， 执行成功后就生成了这个文件。
 *
 * let cart = new MmlCart()
 * cart.addItem(item)
 *     添加商品到购物车. item 包含商品的信息。 id 是必需的。
 * cart.delItem(id)
 *     从购物车中删除商品。 id 是商品的 id 。
 * cart.updateItem(item)
 *     更新购物车中的商品。 item 是新的商品信息。 id 是必需的。
 * cart.getList()
 *     获取购物车的商品列表。 返回数组。
 * cart.getList().length
 *     购物车产品数量
 * cart.clear()
 *     清空购物车。
 * cart.toHtmlTable(fields)
 *     转换成 HTML ，用于提交表单。返回 HTML 字符串。直接填写入表单的字段中即可。
 *         举例: let html = cart.toHtmlTable([ { tag: 'td', key: 'id', text: 'ID' }, { tag: 'td', key: 'name', text: '产品名' }, { tag: 'img', key: 'image', text: '图片' } ])
 *         fields 的格式是 对象数组，每个元素是一个对象，该对象有 tag, key, text 三个属性
 *            tag: 标签，目前仅支持 td 和 img 两种标签。
 *            key: 产品对象的 key ，用于读取产品属性值。如 productName, id, image, 等等。
 *            text: 显示出来的表格标题
 *
 * 开发说明:
 *   在 wp-content/themes/mml-theme/src/js/cart.js 中进行开发。 ---- src 文件夹
 *   页面引用的是 wp-content/themes/mml-theme/dist/js/cart.js 。 ---- dist 文件夹
 *   修改完成后， npm run gulp-cart 便可更新 dist/js 文件夹中的 cart.js 文件。
 */
var MmlCart = /*#__PURE__*/function () {
  function MmlCart() {
    var key = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'mml-cart';

    _classCallCheck(this, MmlCart);

    this.key = key;
  }

  _createClass(MmlCart, [{
    key: "addItem",
    value: function addItem(item) {
      if (!item.id) {
        throw new Error('[MmlCart.addItem] Please set id for cart item');
      }

      var list = this.getList();
      var existed = list.find(function (i) {
        return i.id === item.id;
      });

      if (!existed) {
        list.push(item);

        this._save(list);
      }
    }
  }, {
    key: "delItem",
    value: function delItem(id) {
      var list = this.getList();
      var arr = [];

      for (var i = 0; i < list.length; i++) {
        var item = list[i];

        if (item.id === id) {
          continue;
        }

        arr.push(item);
      }

      this._save(arr);
    }
  }, {
    key: "updateItem",
    value: function updateItem(item) {
      if (!item.id) {
        throw new Error('[MmlCart.updateItem] Please set id for cart item');
      }

      var list = this.getList();
      var arr = [];

      for (var i = 0; i < list.length; i++) {
        var cartItem = list[i];

        if (cartItem.id === item.id) {
          arr.push(item);
        } else {
          arr.push(cartItem);
        }
      }

      this._save(arr);
    }
  }, {
    key: "getList",
    value: function getList() {
      var item = window.localStorage.getItem(this.key);
      var result;

      if (item) {
        try {
          result = JSON.parse(item);
        } catch (e) {
          result = [];
        }
      } else {
        result = [];
      }

      return result;
    }
  }, {
    key: "clear",
    value: function clear() {
      window.localStorage.removeItem(this.key);
    }
  }, {
    key: "toHtmlTable",
    value: function toHtmlTable(fields) {
      var list = this.getList();
      var html = '<table border="1" cellspacing="0" cellpadding="3">'; // head

      html += '<thead><tr>';
      fields.forEach(function (k) {
        html += '<th>' + k.text + '</th>';
      });
      html += '</tr></thead>'; // body

      html += '<tbody>';
      list.forEach(function (item) {
        html += '<tr>';
        fields.forEach(function (field) {
          var value = item[field.key];

          if (typeof value === 'undefined' || value === null) {
            value = '';
          } else if (typeof value === 'boolean') {
            value = value ? 'true' : 'false';
          } else if (typeof value === 'string') {// 字符串，不处理
          } else {
            // 其他，全部用 json 处理一下
            value = JSON.stringify(value);
          }

          if (field.tag === 'img') {
            html += '<td><img src="' + value + '" style="max-width: 100px;" /></td>';
          } else {
            html += '<td>' + value + '</td>';
          }
        });
        html += '</tr>';
      });
      html += '</tbody>';
      html += '</table>';
      return html;
    }
  }, {
    key: "_save",
    value: function _save(data) {
      window.localStorage.setItem(this.key, JSON.stringify(data));
    }
  }]);

  return MmlCart;
}();