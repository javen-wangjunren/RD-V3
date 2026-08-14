(function () {
    'use strict';

    if (typeof rapidDirectEbooks === 'undefined') {
        return;
    }

    document.addEventListener('wpcf7mailsent', function (event) {
        var currentFormId = String(event.detail.contactFormId);
        var ebookFormId = String(rapidDirectEbooks.formId);

        // 仅当提交的是电子书专用表单时才触发跳转，避免页面内其他 CF7 表单被误拦截
        if (currentFormId !== ebookFormId) {
            return;
        }

        var pagePath = window.location.pathname.replace(/\/+$/, '') + '/';
        var ebookUrl = rapidDirectEbooks.redirects[pagePath];

        if (!ebookUrl) {
            console.error('[RapidDirect Ebook] 当前页面未配置 PDF:', pagePath);
            return;
        }

        // 安全校验：只允许跳转到本站 /docs/ 目录下的 PDF
        if (
            !ebookUrl.startsWith('/docs/') ||
            !ebookUrl.toLowerCase().endsWith('.pdf')
        ) {
            console.error('[RapidDirect Ebook] 非法 PDF 地址:', ebookUrl);
            return;
        }

        window.setTimeout(function () {
            window.location.assign(ebookUrl);
        }, Number(rapidDirectEbooks.delay) || 1200);
    });
})();
