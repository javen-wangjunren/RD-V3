"use strict";

(function () {
  var $, intervalId, ready;
  intervalId = setInterval(function () {
    if (window.jQuery) {
      clearInterval(intervalId);
      $ = window.jQuery;
      $(document).ready(ready);
    }
  }, 100);

  ready = function ready() {
    var flag = true;
    $('.anchor-btn-list .elementor-icon-list-item').on('click', function () {
      var that = $(this);
      that.addClass('active').siblings().removeClass('active');
      flag = false;
      setTimeout(function () {
        flag = true;
      }, 1000);
    });
    var offsetArr = [];
    var offsetIndex = '';
    $('.capabilities-inner-section').each(function (index, item) {
      offsetArr.push($(item).offset().top - 1);
    });
    $(window).on('scroll', function () {
      if (!flag) {
        return;
      }

      if ($(window).scrollTop() < offsetArr[0] - 100) {
        offsetIndex = 0;
      } else if ($(window).scrollTop() > offsetArr[0] && $(window).scrollTop() < offsetArr[1] - 100) {
        offsetIndex = 0;
      } else if ($(window).scrollTop() > offsetArr[1] && $(window).scrollTop() < offsetArr[2] - 100) {
        offsetIndex = 1;
      } else if ($(window).scrollTop() > offsetArr[2] && $(window).scrollTop() < offsetArr[3] - 100) {
        offsetIndex = 2;
      } else if ($(window).scrollTop() > offsetArr[3] && $(window).scrollTop() < offsetArr[4] - 100) {
        offsetIndex = 3;
      } else if ($(window).scrollTop() > offsetArr[4] - 100) {
        offsetIndex = 4;
      }

      $('.anchor-btn-list .elementor-icon-list-item').eq(offsetIndex).addClass('active').siblings().removeClass('active');
    });
  };
})();