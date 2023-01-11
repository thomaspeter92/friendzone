<?php

require_once('DB.php');

class UserModel extends DB
{
  public function getAllUsers()
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT * FROM users");
      $req->execute();
      $results = $req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    } catch (Exception $e) {
      http_response_code(500);
      echo $e->getMessage();
    }
  }
  public function checkUser($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT * FROM users WHERE email = :email OR phone_number = :phone_number");
      $req->bindValue(':email', $params['email'], PDO::PARAM_STR);
      $req->bindValue(':phone_number', $params['phone_number'], PDO::PARAM_STR);
      $req->execute();
      $results = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    } catch (Exception $e) {
      http_response_code(500);
      echo $e->getMessage();
    }
  }
  function getUser($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
      $req->bindValue(':user_id', $params['user_id'], PDO::PARAM_STR);
      $req->execute();
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result;
    } catch (Exception $e) {
    }
  }
  public function signup($params)
  {
    try {
      $securePassword = password_hash($params['password'], PASSWORD_BCRYPT);
      $db = $this->connect();
      $req = $db->prepare("INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `phone_number`, `biography`) VALUES (:first_name, :last_name, :email, :password,:phone_number, :biography )");
      $req->bindValue(':first_name', $params['first_name'], PDO::PARAM_STR);
      $req->bindValue(':last_name', $params['last_name'], PDO::PARAM_STR);
      $req->bindValue(':email', $params['email'], PDO::PARAM_STR);
      $req->bindValue(':phone_number', $params['phone_number'], PDO::PARAM_STR);
      $req->bindValue(':password', $securePassword, PDO::PARAM_STR);
      $req->bindValue(':biography', trim($params['biography']), PDO::PARAM_STR);
      $result = $req->execute();
      $req->closeCursor();
      return $result;
    } catch (Exception $e) {
      die("An internal error occured: " . $e->getMessage());
    }
  }
  public function checkLogin($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT * FROM users WHERE email = :email");
      $req->bindValue(':email', $params['email'], PDO::PARAM_STR);
      $req->execute();
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      if ($result && password_verify($params['password'], $result['password'])) {
        return $result;
      }
      return false;
    } catch (Exception $e) {
      die();
    }
  }
  public function updateUser($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("UPDATE users
                           SET first_name = COALESCE(:first_name, first_name),
                               last_name = COALESCE(:last_name, last_name),
                               email = COALESCE(:email, email),
                               phone_number = COALESCE(:phone_number, phone_number),
                               biography = COALESCE(:biography, biography)
                           WHERE id = :user_id");
      $req->bindValue(':first_name', $params['first_name'], PDO::PARAM_STR);
      $req->bindValue(':last_name', $params['last_name'], PDO::PARAM_STR);
      $req->bindValue(':email', $params['email'], PDO::PARAM_STR);
      $req->bindValue(':phone_number ', $params['phone_number'], PDO::PARAM_STR);
      $req->bindValue(':biography', $params['biography'], PDO::PARAM_STR);
      $result = $req->execute();
      $req->closeCursor();
      echo $result;
    } catch (Exception $e) {
    }
  }
}
