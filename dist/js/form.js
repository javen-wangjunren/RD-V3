var $ = jQuery;
$(document).ready(function () {

    // elementor弹窗表单重新初始化
    $('a.elementor-button').each(function (index, item) {
        const link_href = $(item).attr('href') || ''
        if (link_href.startsWith('#elementor-action%')) {
            $(item).on('click', elePopupFormInit)
        }
    })

    //阻止表单重复提交
    stopFormMoreSub('.wpcf7-form', '.wpcf7-submit');

    //解决导航栏多级分类高亮一级不高亮问题
    // $('nav .sub-menu .current-menu-item').parents('li').children('a').addClass('elementor-item-active');
    // $('nav .sub-menu .current-menu-item').parents('li').children('a').addClass('pp-menu-item-active');
})

//阻止表单重复提交()
function stopFormMoreSub(fromSelector, btnSelector) {
    $(fromSelector).submit(function () {
        setTimeout(function () {
            jQuery(btnSelector).prop("disabled", true); //禁用点击按钮
        }, 0);
    });

    document.addEventListener('wpcf7submit', function (event) {
        jQuery(btnSelector).prop("disabled", false); //启用响应后启用按钮
    }, false);
}

//表单初始化
function formInit(formFatherSelector) {
    wpcf7.init(document.querySelector(formFatherSelector + ' div.wpcf7 > form'));
}

//文件上传初始化
function uploadFileInit(formFatherSelector) {
    var TextOJB = dnd_cf7_uploader.drag_n_drop_upload;
    // remove unused dom elements.
    $(formFatherSelector + ' .codedropz-upload-handler').remove();
    $(formFatherSelector + ' .wpcf7-drag-n-drop-file').CodeDropz_Uploader({
        'color': '#fff',
        'ajax_url': dnd_cf7_uploader.ajax_url,
        'text': TextOJB.text,
        'separator': TextOJB.or_separator,
        'button_text': TextOJB.browse,
        'server_max_error': TextOJB.server_max_error,
        'on_success': function (input, progressBar, response) {

            // Progressbar Object
            var $progressDetails = $('#' + progressBar, input.parents('.codedropz-upload-wrapper'));
            var $form = input.parents('form');
            var $span = $('.wpcf7-acceptance', $form);
            var $input = $('input:checkbox', $span);

            // If it's complete remove disabled attribute in button
            if ($span.hasClass('optional') || $input.is(':checked') || $span.length == 0 || $form.hasClass('wpcf7-acceptance-as-validation')) {
                setTimeout(function () { $('input:submit', $form).removeAttr('disabled'); }, 1);
            }

            // Append hidden input field
            $progressDetails
                .find('.dnd-upload-details')
                .append('<span><input type="hidden" name="' + input.attr('data-name') + '[]" value="' + response.data.path + '/' + response.data.file + '"></span>');

            // Update counter
            var $files_counter = (Number(localStorage.getItem(input.data('name') + '_count_files')) - 1);
            $('.dnd-upload-counter span', input.parents('.codedropz-upload-wrapper')).text($files_counter);
        }
    });


    // 修复插件 Bug 。
    // 代码从 /wp-content/plugins/drag-and-drop-multiple-file-upload-contact-form-7/assets/js/codedropz-uploader-min.js 复制而来
    // 原代码中，hasClass('in-progress') 即 return false ，但上传不支持的格式时，进度不会到达 100% ，从而保持 in-progress ，从而永远无法删除。
    $(formFatherSelector).on("click", ".dnd-icon-remove", function (event) {
        var $this = $(this)
            , $container = $this.parents(".dnd-upload-status")
            , $wrapper = $this.parents(".codedropz-upload-wrapper")
            , key = $this.parent("a").attr("data-storage")
            , count = Number(localStorage.getItem(key));
        if ($container.hasClass("in-progress") && $(".has-error", $container).length < 1) // 增加一个条件
            return !1;
        if ($(".has-error", $container).length > 0) // 这次的代码只处理这件事
            return $container.remove(),
                localStorage.setItem(key, count - 1),
                !1;
        // $this.addClass("deleting").text(dnd_cf7_uploader.drag_n_drop_upload.delete.text + "...");
        // var p = {
        //     path: $container.find('input[type="hidden"]').val(),
        //     action: "dnd_codedropz_upload_delete",
        //     security: dnd_cf7_uploader.ajax_nonce
        // };
        // $.post(a.ajax_url, p, function(a) {
        //     a.success && ($container.remove(),
        //     localStorage.setItem(key, count - 1),
        //     e(".dnd-upload-status", $wrapper).length <= 1 && e("span.has-error-msg", $wrapper).remove(),
        //     e(".dnd-upload-counter span", $wrapper).text(Number(localStorage.getItem(key)) - 1))
        // }),
        // $("span.has-error-msg").remove()
    })
}

// 表单提交情况监测与报告
; (function () {
    if (!window.jQuery) {
        console.log('[MML Form] window.jQuery not found');
        return;
    }
    var $ = window.jQuery;

    var qs = function (obj) {
        var arr = [];
        for (var key in obj) {
            arr.push(key + '=' + encodeURIComponent(obj[key]));
        }
        return arr.join('&');
    };

    var initSingleForm = function (form) {
        // form: DOM <form>
        if (form.mml_cf7_form_report_init) {
            return;
        }
        form.mml_cf7_form_report_init = true;
        var timeoutId = 0, startTime = new Date().getTime();
        var sendReport = function (msg, e) {
            // console.log('[form.js][sendReport] msg=', msg);
            var param = {
                url: window.location.href,
                formData: $(form).serialize(),
                detail: JSON.stringify((e || {}).detail),
                startTime: new Date(startTime).toISOString(),
                endTime: new Date().toISOString(),
                duration: new Date().getTime() - startTime,
                msg: msg
            };
            // console.log(qs(param))
            $.post('https://www.mmldigi.com/?mml-cf7-form-report', qs(param))
                .done(function () { })
                .fail(function () { })
                .always(function () { });
        };
        $('.wpcf7-submit', form).click(function () {
            // 确保不会重复执行
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            startTime = new Date().getTime();
            timeoutId = setTimeout(function () {
                sendReport('10 seconds timeout');
                timeoutId = 0;
            }, 10 * 1000); // 10 秒后
        });
        document.addEventListener('wpcf7invalid', function (e) {
            sendReport('wpcf7invalid', e);
            clearTimeout(timeoutId);
        });
        document.addEventListener('wpcf7spam', function (e) {
            sendReport('wpcf7spam', e);
            clearTimeout(timeoutId);
        });
        document.addEventListener('wpcf7mailsent', function () {
            // sendReport('wpcf7mailsent', e)
            clearTimeout(timeoutId);
        });
        document.addEventListener('wpcf7mailfailed', function (e) {
            sendReport('wpcf7mailfailed', e);
            clearTimeout(timeoutId);
        });
        // document.addEventListener('wpcf7submit', function (e) {
        // 	sendReport('wpcf7invalid', e)
        // 	clearTimeout(timeoutId)
        // })
    };

    $(document).ready(function () {
        $('form.wpcf7-form').each(function (index, form) {
            initSingleForm(form);
        });
    });
})();

// 表单初始化集合
function elePopupFormInit() {
    setTimeout(function () {

        //表单初始化（弹窗表单需重新初始化）
        formInit('.elementor-location-popup');

        //文件上传初始化（弹窗表单文件上传需重新初始化）
        uploadFileInit('.elementor-location-popup');

        //隐藏loading图标（因表单多次初始化产生的多个图标）
        //里面 mml-form需要替换对应表单类名
        $('div.wpcf7 .normal-form .ajax-loader').eq(1).css('display', 'none');

        //阻止表单重复提交
        stopFormMoreSub('.wpcf7-form', '.wpcf7-submit');

    }, 0);
}