<?php
// START SESSION, INDEX PHP ACCESSIBLE ACROSS WHOLE APPLICATION
session_start();

// IMPORT CONTROLLER FUNCTIONS
require('./controller/Controller.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
switch ($action) {
  case 'signup':
    signup();
    break;
  case 'handle-signup':
    handleSignup($_REQUEST);
    break;
  case 'update-user':
    updateUser($_REQUEST);
    break;
  case 'login':
    login();
    break;
  case 'handle-login':
    handleLogin($_REQUEST);
    break;
  case 'logout':
    handleLogout();
    break;
  case 'newsfeed':
    newsfeed();
    break;
  case "profile":
    getProfile($_REQUEST);
    break;
  case 'make-post':
    makePost($_REQUEST);
    break;
  case 'delete-post':
    deletePost($_REQUEST);
    break;
  case 'get-comments':
    getComments($_REQUEST);
    break;
  case 'post-comment':
    postComment($_REQUEST);
    break;
  default:
    home();
}
