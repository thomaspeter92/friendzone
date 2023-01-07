<?php
require_once('DB.php');

class PostsModel extends DB
{
  public function getPosts()
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT p.id id, p.author_id author_id, p.content content, p.created_at created_at, u.first_name first_name, u.last_name last_name FROM posts p INNER JOIN users u ON p.author_id = u.id ORDER BY p.created_at DESC");
      $req->execute();
      $result = $req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result;
    } catch (Exception $e) {
      die("Error fethcing posts: " . $e->getMessage());
    }
  }
  public function getPostsByUser($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT * FROM posts WHERE author_id = :user_id ORDER BY created_at DESC");
      $req->bindValue(':user_id', $params['user_id'], PDO::PARAM_STR);
      $req->execute();
      $result = $req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();

      return $result;
    } catch (Exception $e) {
      die("Error fethcing posts: " . $e->getMessage());
    }
  }
  public function makePost($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("INSERT INTO `posts` (`content`, `created_at`, `author_id`) VALUES (:content, NOW(), :author_id)");
      $req->bindValue(':content', $params['content'], PDO::PARAM_STR);
      $req->bindValue(':author_id', $params['author_id'], PDO::PARAM_INT);
      $result = $req->execute();
      $req->closeCursor();
      http_response_code(200);
      echo json_encode($result);
    } catch (Exception $e) {
      die("Error writing to DB");
    }
  }

  public function deletePost($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("DELETE FROM posts WHERE id = :id AND author_id =:author_id ");
      $req->bindValue(':id', $params['post_id'], PDO::PARAM_STR);
      $req->bindValue(':author_id', $params['author_id'], PDO::PARAM_INT);
      $result = $req->execute();
      $req->closeCursor();
      print_r($result);
    } catch (Exception $e) {
      die("Error writing to DB");
    }
  }
  // make comment

  // get comments

  // delete comment
}
