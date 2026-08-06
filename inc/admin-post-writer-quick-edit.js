(function ($) {
  if (typeof inlineEditPost === 'undefined') {
    return;
  }

  var oldEdit = inlineEditPost.edit;
  inlineEditPost.edit = function (id) {
    oldEdit.apply(this, arguments);

    var postId = 0;
    if (typeof id === 'object') {
      postId = parseInt(this.getId(id), 10);
    } else {
      postId = parseInt(id, 10);
    }
    if (!postId) {
      return;
    }

    var $row = $('#post-' + postId);
    var writer = $row.find('.column-post_writer .mml-post-writer').data('writer');
    if (typeof writer === 'undefined') {
      writer = '';
    }

    var $editor = $('#edit-' + postId);
    $editor.find('select[name="post_writer"]').val(writer);
  };
})(jQuery);

