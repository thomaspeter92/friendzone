<?php
if ($_SESSION['id'] != session_id() || !isset($_SESSION['user_id'])) {
  session_destroy();
  header("Location: " . PROJECT_ROOT_PATH);
  exit;
}

ob_start();

?>
<div class="container ">
  <div class="row">
    <form class="col-md-6 mx-auto" action="index.php?action=make-post" method="POST">
      <label for="postInput" class="form-label">Hello, <strong><?= $_SESSION['first_name'] ?></strong>! What's on your mind?</label>
      <textarea required name="content" class="form-control" id="postInput" rows="3"></textarea>
      <input type="hidden" name="author_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null ?>">
      <input type="submit" class="btn btn-primary mt-3" value="Post">
    </form>
  </div>
  <row>
    <div class="col-md-6 mx-auto mt-5">
      <h4 class="mb-3">Recent Posts:</h4>
      <?php
      if (isset($posts) && count($posts) > 0) {
        foreach ($posts as $post) : ?>
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
              <small class="text-primary"><a>comments &#8595;
                </a></small>
            </div>
          </div>
      <?php
        endforeach;
      } else {
        echo '<p>There are currently no posts</p>';
      }
      ?>
    </div>
  </row>
</div>

<script src="public/js/post.js"></script>
<?php
$content = ob_get_clean();

require('./view/layout/layout.php');
