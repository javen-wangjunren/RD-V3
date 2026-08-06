(function (wp) {
  if (!wp || !wp.plugins || !wp.editPost || !wp.data || !wp.components || !wp.element) {
    return;
  }

  var el = wp.element.createElement;
  var PluginPostStatusInfo = wp.editPost.PluginPostStatusInfo;
  var SelectControl = wp.components.SelectControl;
  var useSelect = wp.data.useSelect;
  var useDispatch = wp.data.useDispatch;

  var options = [
    { label: '—', value: '' },
    { label: 'Kevi', value: 'Kevi' },
    { label: 'Javen', value: 'Javen' },
  ];

  function WriterStatus() {
    var meta = useSelect(function (select) {
      return select('core/editor').getEditedPostAttribute('meta') || {};
    }, []);

    var writer = meta.post_writer || '';
    var editPost = useDispatch('core/editor').editPost;

    return el(
      PluginPostStatusInfo,
      {},
      el(SelectControl, {
        label: 'Writer',
        value: writer,
        options: options,
        onChange: function (value) {
          var newMeta = { post_writer: value };
          editPost({ meta: newMeta });
        },
      })
    );
  }

  wp.plugins.registerPlugin('mml-post-writer', { render: WriterStatus });
})(window.wp);

