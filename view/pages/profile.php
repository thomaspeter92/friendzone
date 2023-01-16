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
          <p><button id="showFormButton" class="btn btn-success">Edit Profile</button></p>
        <?php } ?>
      </div>
      <?php
      if ($user['id'] === $_SESSION['user_id']) { ?>
        <div id="update-user" class="d-none">
          <h6>Update here:</h6>
          <form id="updateForm" action="index.php?action=update-user" method="post">
            <div class="mb-3 row">
              <div class="col">
                <label for="firstNameInput" class="form-label">First Name</label>
                <input value="<?= $user['first_name'] ?>" name="first_name" autocomplete="off" type="text" class="form-control" id="firstNameInput">
                <div class="invalid-feedback">
                  First name cannot be empty.
                </div>
              </div>
              <div class="col">
                <label for="lastNameInput" class="form-label">Last Name</label>
                <input value="<?= $user['last_name'] ?>" name="last_name" autocomplete="off" type="text" class="form-control" id="lastNameInput">
                <div class="invalid-feedback">
                  Last name cannot be empty.
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col">
                <label for="emailInput" class="form-label">Email Address</label>
                <input value="<?= $user['email'] ?>" name="email" autocomplete="off" placeholder="johndoe@example.com" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="col">
                <label for="phoneNumberInput" class="form-label">Phone Number</label>
                <input value="<?= $user['phone_number'] ?>" name="phone_number" autocomplete="off" type="text" class="form-control" id="phoneNumberInput">
                <div class="invalid-feedback">
                  Please enter a valid phone number (9-11 digits).
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="biographyInput" class="form-label">Please add a short biography</label>
              <textarea name="biography" autocomplete="off" name="biography" class="form-control" id="biographyInput"><?= $user['biography'] ?></textarea>
              <div class="invalid-feedback">
                Biography must be between 5 - 300 characters.
              </div>
            </div>
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      <?php } ?>
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
<script src="public/js/update.js"></script>

<?php
$content = ob_get_clean();
require_once('./view/layout/layout.php');
