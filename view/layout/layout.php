<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FriendZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0360afe4bb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="public/css/style.css">
</head>

<body class="min-vh-100">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-secondary py-3">
      <div class="container">
        <a class="navbar-brand" href="index.php">FriendZone</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100">
            <?php
            // LOGGED IN USER MENU
            if (isset($_SESSION['id']) && $_SESSION['id'] == session_id()) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=newsfeed">Feed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=profile&user_id=<?= $_SESSION['user_id'] ?>">My Profile</a>
              </li>
              <a href="index.php?action=logout" class="btn btn-info text-light mw-auto">Log Out</a>
            <?php
              // LOGGED OUT USER MENU
            } else {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=signup">Signup</a>
              </li>
            <?php
            }
            ?>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <main id="mainContent" class="bg-light min-vh-100 pt-5 mt-5">
    <?= $content; ?>
  </main>

  <footer>

  </footer>
  <!-- IMPORT JAVASCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>