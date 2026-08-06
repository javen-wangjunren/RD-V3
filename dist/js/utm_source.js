"use strict";

;

(function () {
  var setKeyValue = function setKeyValue(item) {
    var keywords = document.getElementsByClassName('keyword');
    item = item.replace(/[{}"]/g, "");
    item = item.replace(/\:/g, ": ");

    for (var i = 0; i < keywords.length; i++) {
      keywords[i].value = item;
    }
  };

  var save = function save() {
    var request = new Object();
    request = GetRequest();
    request = JSON.stringify(request);
    var item = '';

    if (request != '{}') {
      try {
        request = decodeURI(request);
        localStorage.setItem("request", request);
        item = request;
      } catch (e) {
        console.error(e);
      }
    } else if (request == '{}' && localStorage.getItem("request") != "{}") {
      item = localStorage.getItem("request");
    }

    if (item) {
      setKeyValue(item);
    }
  };

  var GetRequest = function GetRequest() {
    var url = location.search; //获取url中"?"符后的字串

    var theRequest = new Object();

    if (url.indexOf("utm_term") != -1) {
      var index = url.indexOf("utm_term");
      var str = url.substring(index);

      if (str.indexOf("&") != -1) {
        var newIndex = str.indexOf("&");
        str = str.substring(0, newIndex);
      }

      theRequest[str.split("=")[0]] = unescape(str.split("=")[1]);
    }

    return theRequest;
  };

  if (typeof Storage !== "undefined") {
    save();
  } else {
    console.log('抱歉! 不支持 web 存储。');
  }

  document.addEventListener('wpcf7mailsent', function (event) {
    if (localStorage.getItem("request")) {
      localStorage.removeItem('request');
    }
  }, false);
})();