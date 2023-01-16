<?php
require_once('./model/UserModel.php');
require_once('./model/PostModel.php');

function home()
{
  $userManager = new UserModel();
  $users = $userManager->getAllUsers();
  require('./view/pages/home.php');
}
function login()
{
  require('./view/pages/login.php');
}
function handleLogin($params)
{
  $userManager = new UserModel();
  $result = $userManager->checkLogin($params);
  if ($result) {
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['first_name'] = $result['first_name'];
    $_SESSION['last_name'] = $result['last_name'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['phone_number'] = $result['phone_number'];
    $_SESSION['id'] = session_id();
    header('Location: index.php?action=newsfeed');
    return;
  } else {
    header('Location: index.php?action=login&error=noUser');
  }
}
function signup()
{
  require('./view/pages/signup.php');
}
function handleSignup($params)
{
  $userManager = new UserModel();
  $user = $userManager->checkUser($params);
  if ($user) {
    echo json_encode(array("success" => false, "message" => "User already exists"));
  } else {
    $result = $userManager->signup($params);
    if ($result) {
      http_response_code(200);
      echo json_encode(array("success" => true, "message" => "User was created"));
    } else {
      http_response_code(500);
      echo json_encode(array("success" => false, "message" => "Internal server error"));
    }
  }
}
function updateUser($params)
{
  $userManager = new UserModel();
  $userManager->updateUser($params);
  getProfile($params);
}
function handleLogout()
{
  session_destroy();
  header("Location: index.php");
}

function newsfeed()
{
  $userManager = new UserModel();
  $users = $userManager->getAllUsers();
  $postsManager = new PostsModel();
  $posts = $postsManager->getPosts();
  require('./view/pages/newsfeed.php');
}
function getProfile($params)
{
  $userManager = new UserModel();
  $user = $userManager->getUser($params);
  $postsManager = new PostsModel();
  $posts = $postsManager->getPostsByUser($params);
  require('./view/pages/profile.php');
}
function makePost($params)
{
  $postsManager = new PostsModel();
  $postsManager->makePost($params);
  header('Location: index.php?action=newsfeed');
}
function deletePost($params)
{
  $postsManager = new PostsModel();
  $result = $postsManager->deletePost(array("post_id" => $params['post_id'], "author_id" => $_SESSION['user_id']));
  if ($params['fromProfile']) {
    header('Location: index.php?action=profile&user_id=' . $_SESSION['user_id'] . '&postDeleted=true');
    return;
  }
  header('Location: index.php?action=newsfeed&postDeleted=true');
}

function getComments($params)
{
  $postsManager = new PostsModel();
  $result = $postsManager->getComments($params);
  if ($result) {
    http_response_code(200);
    echo json_encode(array("success" => true, "data" => $result));
  } else {
    http_response_code(500);
    echo json_encode(array("success" => false));
  }
}
function postComment($params)
{
  $postsManager = new PostsModel();
  $result = $postsManager->postComment($params);
  if ($result) {
    if (isset($params['fromProfile']) && $params['fromProfile'] != 'false') {
      header("Location: index.php?action=profile&user_id=" . $params['fromProfile'] . "&commentPosted=true");
    } else {
      header("Location: index.php?action=newsfeed&commentPosted=true");
    }
  } else {
    header("Location: index.php?action=" . isset($params['fromProfile']) ? 'profile&user_id=' . $params['fromProfile'] : 'newsfeed' . "&commentPosted=false");
  }
}
