<?php
if ($_SESSION['id'] != session_id() || !isset($_SESSION['user_id'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}

ob_start();

?>
<div class="container ">
  <div class="row">
    <form id="postForm" class="col-md-6 mx-auto" action="index.php?action=make-post" method="POST">
      <label for="postInput" class="form-label">Hello, <strong><?= $_SESSION['first_name'] ?></strong>! What's on your mind?</label>
      <textarea required name="content" class="form-control" id="postInput" rows="3"></textarea>
      <div class="invalid-feedback">
        Posts must be between 1 - 280 characters long.
      </div>
      <input type="hidden" name="author_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null ?>">
      <input type="submit" class="btn btn-primary mt-3" value="Post">
    </form>
  </div>
  <row>
    <div class="col-md-6 mx-auto mt-5">
      <h4 class="mb-3">Recent Posts:</h4>
      <?php
      if (isset($posts) && count($posts) > 0) {
        foreach ($posts as $post) :
          include('./view/components/post.php');
        endforeach;
      } else {
        echo '<p>There are currently no posts</p>';
      }
      ?>
    </div>
  </row>
</div>
<script src="public/js/posts.js"></script>
<?php
$content = ob_get_clean();

require('./view/layout/layout.php');
