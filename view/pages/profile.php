<?php
if ($_SESSION['id'] != session_id() || !isset($_SESSION['user_id'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}
ob_start();
?>

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3><?= $user['first_name'] . ' ' . $user['last_name'] ?></h3>
          <p class="text-secondary"><?= $user['email'] ?></p>
          <small class="text-secondary">About me:</small>
          <p class="px-3 fst-italic"><?= $user['biography'] ?></p>
        </div>
        <?php
        if ($user['id'] === $_SESSION['user_id']) { ?>
          <p><button class="btn btn-success">Edit Profile</button></p>
        <?php } ?>
      </div>


      <hr>
      <h6 class="mb-3 text-secondary"><?= $user['first_name'] ?>'s Recent Posts:</h6>
      <?php
      if (isset($posts) && count($posts) > 0) {
        foreach ($posts as $post) : ?>
          <div class="card  text-bg-light mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-0"><?= $user['first_name'] . ' ' . $user['last_name'] ?></h6>
                <p class="mb-0 text-secondary"><small><?= $post['created_at'] ?></small></p>
              </div>
              <?php
              if ($_SESSION["user_id"] == $post['author_id']) { ?>
                <a href="<?= PROJECT_ROOT_PATH ?>/delete-post?post_id=<?= $post['id'] ?>&fromProfile=true" type="button" class="btn-close" aria-label="Delete"></a>
              <?php
              }
              ?>
            </div>
            <p class="card-body"><?= $post['content'] ?></p>
          </div>
      <?php
        endforeach;
      } else {
        echo '<p>There are currently no posts</p>';
      }
      ?>
    </div>
  </div>

</div>
<script>
  if (window.location.search.search("postDeleted=true") > 0) {
    alert('Post successfully deleted')
  }
</script>

<?php
$content = ob_get_clean();
require_once('./view/layout/layout.php');
