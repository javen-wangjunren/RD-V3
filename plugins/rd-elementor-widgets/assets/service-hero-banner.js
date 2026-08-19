/**
 * Service Hero Banner — video play interaction
 * Multi-instance safe; compatible with Elementor editor preview.
 */
(function () {
  'use strict';

  function parseVideoUrl(url) {
    if (!url) {
      return null;
    }

    let youtubeMatch = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/);
    if (youtubeMatch) {
      return { type: 'iframe', src: 'https://www.youtube.com/embed/' + youtubeMatch[1] + '?autoplay=1&rel=0' };
    }

    let vimeoMatch = url.match(/(?:vimeo\.com\/)(\d+)/);
    if (vimeoMatch) {
      return { type: 'iframe', src: 'https://player.vimeo.com/video/' + vimeoMatch[1] + '?autoplay=1' };
    }

    return { type: 'video', src: url };
  }

  function initWidget(root) {
    if (!root || root.dataset.rdShbInit === '1') {
      return;
    }
    root.dataset.rdShbInit = '1';

    var playButton = root.querySelector('.rd-shb__media-play');
    var videoWrapper = root.querySelector('.rd-shb__media-video');
    if (!playButton || !videoWrapper) {
      return;
    }

    var videoUrl = videoWrapper.dataset.videoUrl || '';
    var parsed = parseVideoUrl(videoUrl);
    if (!parsed) {
      return;
    }

    playButton.addEventListener('click', function () {
      var embed;
      if (parsed.type === 'iframe') {
        embed = document.createElement('iframe');
        embed.src = parsed.src;
        embed.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
        embed.setAttribute('allowfullscreen', '');
        embed.setAttribute('title', 'Video');
      } else {
        embed = document.createElement('video');
        embed.src = parsed.src;
        embed.setAttribute('controls', '');
        embed.setAttribute('autoplay', '');
        embed.setAttribute('playsinline', '');
      }

      embed.className = 'rd-shb__media-embed';
      videoWrapper.innerHTML = '';
      videoWrapper.appendChild(embed);
      if (typeof embed.focus === 'function') {
        embed.focus();
      }
    });
  }

  function initAll() {
    var widgets = document.querySelectorAll('[data-rd-shb-id]');
    for (var i = 0; i < widgets.length; i++) {
      initWidget(widgets[i]);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }

  if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
    elementorFrontend.hooks.addAction('frontend/element_ready/rd-service-hero-banner.default', function ($scope) {
      var root = $scope && $scope[0] ? $scope[0].querySelector('[data-rd-shb-id]') : null;
      initWidget(root);
    });
  }
})();
