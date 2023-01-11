<div class="card  text-bg-light mb-3">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>
      <h6 class="mb-0"><a href="index.php?action=profile&user_id=<?= $post['author_id'] ?>"><?= $post['first_name'] . ' ' . $post['last_name'] ?></a></h6>
      <p class="mb-0 text-secondary"><small><?= $post['created_at'] ?></small></p>
    </div>
    <?php
    if ($_SESSION["user_id"] == $post['author_id']) { ?>
      <a href="index.php?action=delete-post&post_id=<?= $post['id'] ?>" type="button" class="btn-close" aria-label="Delete"></a>
    <?php
    }
    ?>
  </div>
  <div class="card-body">
    <p><?= $post['content'] ?></p>
  </div>
  <div class="card-footer">
    <div class="d-flex justify-content-between align-items-center my-2">
      <small class="text-secondary">Total Comments: <?= $post['num_comments'] ?> </small>
      <?php
      if ($post['num_comments'] > 0) {
      ?>
        <button data-post-id="<?= $post['id'] ?>" class="show-comments text-primary small pe-auto border-0">View comments &#9660;</button>
      <?php
      }
      ?>
    </div>
    <div id="comments-container-<?= $post['id'] ?>"></div>

    <hr>
    <small class="text-primary">
      <p>Leave a comment:</p>
    </small>

    <form action='index.php?action=post-comment&fromProfile=<?= isset($user['id']) ? $user['id'] : 'false' ?>' method="POST">
      <textarea name="content" required class="form-control" rows="1"></textarea>
      <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
      <input type="hidden" name="author_id" value="<?= $_SESSION['user_id'] ?>">
      <button type="submit" class="btn btn-outline-primary my-3">Post</button>
    </form>
  </div>
</div>