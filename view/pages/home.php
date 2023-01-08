<?php ob_start(); ?>

<div class="container  d-flex align-items-center">
  <div class="row">
    <div class="col-8">
      <h1>FriendZone</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod exercitationem ipsa vitae. Dolore quasi deleniti laboriosam numquam? Qui, eum distinctio ut commodi temporibus recusandae odio voluptates placeat officiis id nobis.</p>
      <button class="btn btn-primary btn-lg">Sign Up</button>
      <button class="btn btn-success btn-lg">Log In</button>
      <?php
      foreach ($users as $user) :
      ?>
        <h5><?= $user['first_name'] ?></h5>
      <?php
      endforeach;
      ?>
    </div>
  </div>


</div>


<?php
$content = ob_get_clean();
require_once('./view/layout/layout.php');
