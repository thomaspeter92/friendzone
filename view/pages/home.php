<?php ob_start(); ?>

<div id="home-container" class="d-flex align-items-center ">
  <div class="container">
    <div class="row">
      <div class="col-md-8 bg-light bg-gradient p-5 rounded" style="--bs-bg-opacity: .75">
        <h1>FriendZone</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam cum asperiores nihil vero tenetur, consequatur tempora aliquid at ex est error numquam fuga sequi qui, doloremque dolorem odit quod expedita.
          Voluptatum veniam cum tenetur nisi eius sed laudantium quasi eveniet, laboriosam modi eligendi dolor numquam esse. Nihil ab hic quasi doloremque libero dolorem unde explicabo dolores. Asperiores accusamus error ut.</p>
        <?php
        if (isset($_SESSION['user_id'])) {
        ?>
          <a class="btn btn-primary btn-lg" href="index.php?action=newsfeed">See Posts!</a>
        <?php
        } else { ?>
          <a class="btn btn-primary btn-lg" href="index.php?action=login">Log In</a>
          <a class="btn btn-success btn-lg" href="index.php?action=signup">Sign Up</a>

        <?php
        }
        ?>
      </div>
    </div>
  </div>

</div>
<script>
  alert("DISCLAIMER: This is a prototype website. Please do not enter your real information.")
</script>

<?php
$content = ob_get_clean();
require_once('./view/layout/layout.php');
