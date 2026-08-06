var $ = jQuery;
$(document).ready(function () {
  // 首页section2轮播
  let MachineSlicker = ".manufacturing-content-slicker";
  // 首页section2轮播数量
  let MachineSlickerLength = $(".manufacturing-content-slicker .item").length;

  $(MachineSlicker).slick({
    slidesToShow: MachineSlickerLength === 4 ? 3 : 3,
    slidesToScroll: 3,
    dots: false,
    // arrows: false,
    // infinite: false,
    // autoplay: true,
    prevArrow: ".p01-s01-slicker .arrow-left",
    nextArrow: ".p01-s01-slicker .arrow-right",
    responsive: [
      {
        breakpoint: 1401,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToScroll: 1,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToScroll: 1,
          slidesToShow: 1,
        },
      },
    ],
  });

  // 确认首页轮播板块位置
  calcSlickPos();
  $(window).on("resize", function () {
    calcSlickPos();
  });
  function calcSlickPos() {
    // if($(window).width() > 1400 && MachineSlickerLength > 4) {
    //     let slickerLeft = $('.rapiddirect-logo')[0].getBoundingClientRect().left || 0
    //     $(MachineSlicker).css('left', slickerLeft - 15)
    // }else {
    //     $(MachineSlicker).css('left', 0)
    // }

    if (
      $(window).width() > 1400 &&
      MachineSlickerLength > 4 &&
      $(window).width() < 1930
    ) {
      let slickerLeft =
        $(".rapiddirect-logo")[0].getBoundingClientRect().left || 0;
      $(MachineSlicker).css("left", slickerLeft - 15);
    } else {
      $(MachineSlicker).css({
        left: 0,
      });
    }

    $(MachineSlicker + " .slick-slide").each(function (index, item) {
      if ($(item).attr("class").indexOf("slick-active") < 0) {
        $(".p01-s01-slicker .arrow-btn-wrap").css("display", "flex");
      }
    });
  }

  $(".p05-2-slicker").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    // autoplay: true,
  });

  // 表格内的图片点击放大
  $(".img-table").on("click", "img", function () {
    let that = $(this);
    let src = that.attr("src");
    $("body").append(`
            <section id="img-popup">
                <span class="close"><i class="fas fa-times"></i></span>
                <div class="container">
                    <img src="${src}">
                </div>
            </section>
        `);
  });
  $("body").on("click", "#img-popup", function (e) {
    $(this).remove();
  });

  // p03-tab
  $(".p03-tab .tab-btn-item").on("click", function () {
    let that = $(this);
    let index = that.index();
    that.addClass("active").siblings().removeClass("active");
    that
      .parent()
      .next()
      .children()
      .eq(index)
      .addClass("active")
      .siblings()
      .removeClass("active");
  });

  //p02-x-slicker
  $(".p02-x-slicker .content-show-slicker").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    // arrows: false,
    infinite: false,
    prevArrow:
      '<span class="arrow-btn-2 arrow-prev"><i class="fas fa-caret-left"></i></span>',
    nextArrow:
      '<span class="arrow-btn-2 arrow-next"><i class="fas fa-caret-right"></i></span>',
  });

  // p04-3-tab-table
  $(".p04-3-tab-table .tab-btn-item").on("click", function () {
    let that = $(this);
    let index = that.index();
    that.addClass("active").siblings().removeClass("active");
    that
      .parents(".tab-btn-wrap")
      .next()
      .children()
      .eq(index)
      .addClass("active")
      .siblings()
      .removeClass("active");
  });

  //cases-categories
  $(".cases-categories .type-item li").on("click", function () {
    let that = $(this);
    $(".cases-categories .type-item li").removeClass("active");
    that.addClass("active");
  });
  $(".cases-categories .left .clear").on("click", function () {
    let that = $(this);
    that.parent().prev().find("li").removeClass("active");
  });

  //help-center-categories 分类展开
  $(".help-center-categories .first-level-content").on("click", function () {
    let that = $(this);
    if (that.parent().attr("class").indexOf("active") >= 0) {
      that.parent().removeClass("active").siblings().removeClass("active");
    } else {
      that.parent().addClass("active").siblings().removeClass("active");
    }
    // that.parent().parent().find('ul').slideUp()
    // that.next().slideDown()
  });

  //p05-3-tab
  $(".p05-3-tab .tab-btn-item").eq(0).find(".main-content").slideDown();
  $(".p05-3-tab .tab-btn-item .title-wrap").on("click", function () {
    let that = $(this).parent();
    if (that.attr("class").indexOf("active") !== -1) {
      that
        .parent()
        .children()
        .removeClass("active")
        .find(".main-content")
        .slideUp();
    } else {
      that
        .parent()
        .children()
        .removeClass("active")
        .find(".main-content")
        .slideUp();
      that.addClass("active");
      that.find(".main-content").slideDown();
    }
    let index = that.index();
    that
      .parent()
      .prev()
      .children()
      .eq(index)
      .addClass("active")
      .siblings()
      .removeClass("active");
  });

  // vr-slicker
  if ($(".vr-slicker").length > 0) {
    $(".vr-slicker").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      autoplay: false,
      infinite: false,
      draggable: false,
      touchMove: false,
      swipe: false,
      swipeToSlide: false,
      prevArrow:
        '<span class="arrow-btn arrow-left"><i class="fas fa-angle-left"></i></span>',
      nextArrow:
        '<span class="arrow-btn arrow-right"><i class="fas fa-angle-right"></i></span>',
    });
  }

  $(".pagination").on("click", "a", function () {
    console.log(111);
    let that = $(this);
    $("html").animate(
      {
        scrollTop: that.parent().parent().offset().top - 100 + "px",
      },
      800
    );
  });

  //
  if ($(".p04-2-table.no-scroll").length > 0 && $(window).width() > 1024) {
    let navHeight = $(".elementor-location-header").height();

    let positionY = $("#wpadminbar").length
      ? navHeight + $("#wpadminbar").height()
      : navHeight;

    $(".p04-2-table.no-scroll .table-header").css("top", positionY - 22);
  }

  $(".p02-x-tab .item").click(function () {
    let that = $(this);
    let index = that.index();
    that.addClass("active").siblings().removeClass("active");
    that
      .parent()
      .prev()
      .children("img")
      .eq(index)
      .addClass("active")
      .siblings()
      .removeClass("active");
  });

  if ($(".pp-info-box-carousel-wrap").length > 0) {
    $(".pp-info-box-carousel-wrap").on(
      "click",
      ".pp-info-box-icon-wrap",
      function () {
        let that = $(this);
        let src = that.find("img").attr("src");
        $("body").append(`
                <section id="img-popup">
                    <span class="close"><i class="fas fa-times"></i></span>
                    <div class="container">
                        <img src="${src}">
                    </div>
                </section>
            `);
      }
    );
  }
  if ($(".elementor-image-carousel-wrapper").length > 0) {
    $(".elementor-image-carousel-wrapper").on(
      "click",
      ".swiper-slide",
      function () {
        console.log(111);
        let that = $(this);
        let src = that.find("img").attr("src");
        $("body").append(`
                <section id="img-popup">
                    <span class="close"><i class="fas fa-times"></i></span>
                    <div class="container">
                        <img src="${src}">
                    </div>
                </section>
            `);
      }
    );
  }

  if ($(window).width() < 768) {
    $(".pp-image-accordion .pp-image-accordion-item")
      .eq(0)
      .css("flex", "3")
      .addClass("active");
    $(".pp-image-accordion .pp-image-accordion-item").on(
      "mouseenter",
      function () {
        let that = $(this);
        that.removeClass("active").siblings().removeClass("active");
      }
    );
  }

  const rapiddirectNav = document.querySelector(".pp-advanced-menu--main");
  rapiddirectNav.addEventListener("mouseenter", submenuDelete);
  function submenuDelete() {
    console.log("mouseenter");
    const submenu = document.querySelectorAll("#menu-menu-header .sub-menu");
    if (submenu) {
      submenu.forEach((item, index) => {
        item.style.height = 60 + "px";
        item.style.width = 100 + "%";
        const children = item.children;
        if (children) {
          [...children].forEach((item, index) => {
            item.remove();
          });
        }
      });
    }
    rapiddirectNav.removeEventListener("mouseenter", submenuDelete);
  }
});