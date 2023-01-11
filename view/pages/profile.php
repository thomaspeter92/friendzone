<?php
if ($_SESSION['id'] != session_id() || !isset($_SESSION['user_id'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}
ob_start();
?>

<div class="container profile">
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
        foreach ($posts as $post) :
          include('./view/components/post.php');
        endforeach;
      } else {
        echo '<p>There are currently no posts</p>';
      }
      ?>
    </div>
  </div>

</div>
<script src="public/js/posts.js"></script>

<?php
$content = ob_get_clean();
require_once('./view/layout/layout.php');
