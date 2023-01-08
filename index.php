<?php
// START SESSION, INDEX PHP ACCESSIBLE ACROSS WHOLE APPLICATION
session_start();
// DEFINE PROJECT ROOT PATH GLOBALLY FOR PREFIXING TO SITE LINKS
define("PROJECT_ROOT_PATH", dirname($_SERVER['SCRIPT_NAME']));
// IMPORT CONTROLLER FUNCTIONS
require('./controller/Controller.php');

function getPath()
{
  $path = str_replace(PROJECT_ROOT_PATH, "", $_SERVER['REQUEST_URI']);
  $queryPosition = strpos($path, '?');
  if (!$queryPosition) {
    return $path;
  }

  return substr($path, 0, $queryPosition);
}
function getMethod()
{
  return $_SERVER['REQUEST_METHOD'];
}


if (getMethod() == 'GET') {
  switch (getPath()) {
    case "/":
      home();
      break;
    case '/login':
      login();
      break;
    case "/signup":
      signup();
      break;
    case "/feed":
      newsfeed();
      break;
    case "/logout":
      handleLogout();
      break;
    case "/profile":
      getProfile($_REQUEST);
      break;
    case '/delete-post':
      deletePost($_REQUEST);
      break;
    default:
      home();
      break;
  }
} elseif (getMethod() == "POST") {
  switch (getPath()) {
    case "/handle-login":
      handleLogin($_REQUEST);
      print_r($_REQUEST);
      break;
    case '/handle-signup':
      handleSignup($_REQUEST);
      break;
    case '/make-post':
      makePost($_REQUEST);
      break;
  }
}


// switch ($action) {
//   case 'signup':
//     signup();
//     break;
//   case 'handle-signup':
//     handleSignup($_REQUEST);
//     break;
//   case 'login':
//     login();
//     break;
//   case 'handle-login':
//     handleLogin($_REQUEST);
//     break;
//   case 'logout':
//     handleLogout();
//     break;
//   case 'newsfeed':
//     newsfeed();
//     break;
//   case "profile":
//     getProfile($_REQUEST);
//     break;
//   case 'make-post':
//     makePost($_REQUEST);
//     break;
//   case 'delete-post':
//     deletePost($_REQUEST);
//     break;
//   default:
//     home();
// }
