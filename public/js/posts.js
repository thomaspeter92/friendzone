if (window.location.search.search("postDeleted=true") > 0) {
  alert('Post successfully deleted')
}
// COMMENTS SCRIPT FOR POSTS
$('.show-comments').on('click', function() {
  let postId = $(this).data('post-id')
  let commentsContainer = $('#comments-container-' + postId)
  

  if (commentsContainer.html().length > 0) {
    commentsContainer.html('')
    return
  }
  $.ajax({
    type: 'GET',
    url: 'index.php?action=get-comments&post_id=' + postId,
    success: data => {
      let result = $.parseJSON(data);
      $.each(result.data, (i, d) => {
        let comment = $('<div class="card mb-2 p-2">')
        comment.html(`
          <div class="d-flex">
          <p class="small text-secondary mb-0"><a href="index.php?action=profile&user_id=${d.author_id}">${d.first_name}</a> replied:</p>
          <small class="text-secondary fw-lighter ms-auto"> ${d.created_at}</small>
          </div>
          <hr class="my-2">
          <p class="small m-0">${d.content}</p>
        `)
        commentsContainer.append(comment)
      })
    }
  })
})
