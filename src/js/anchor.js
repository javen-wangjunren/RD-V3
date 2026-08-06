(function () {
    let $, intervalId, ready

    intervalId = setInterval(() => {
        if (window.jQuery) {
            clearInterval(intervalId)
            $ = window.jQuery
            $(document).ready(ready)
        }
    }, 100);

    ready = function () {
        let flag = true;
        $('.anchor-btn-list .elementor-icon-list-item').on('click', function() {
            let that = $(this)
            that.addClass('active').siblings().removeClass('active')
            flag = false;
            setTimeout(() => {
                flag = true;
            }, 1000)
        })

        let offsetArr = []
        let offsetIndex = ''
        $('.capabilities-inner-section').each(function(index, item) {
            offsetArr.push($(item).offset().top - 1)
        })

        $(window).on('scroll', () => {
            if(!flag) {
                return
            }
            if($(window).scrollTop() < offsetArr[0] - 100) {
                offsetIndex = 0
            }else if($(window).scrollTop() > offsetArr[0] && $(window).scrollTop() < offsetArr[1] - 100) {
                offsetIndex = 0
            }else if($(window).scrollTop() > offsetArr[1] && $(window).scrollTop() < offsetArr[2] - 100) {
                offsetIndex = 1
            }else if($(window).scrollTop() > offsetArr[2] && $(window).scrollTop() < offsetArr[3] - 100) {
                offsetIndex = 2
            }else if($(window).scrollTop() > offsetArr[3] && $(window).scrollTop() < offsetArr[4] - 100) {
                offsetIndex = 3
            }else if($(window).scrollTop() > offsetArr[4] - 100) {
                offsetIndex = 4
            }
            $('.anchor-btn-list .elementor-icon-list-item').eq(offsetIndex).addClass('active').siblings().removeClass('active')
        })

    }
})();
