<?php
require_once('DB.php');

class PostsModel extends DB
{
  public function getPosts()
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT p.id id, p.author_id author_id, p.content content, p.created_at created_at, u.first_name first_name, u.last_name last_name, (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) as num_comments FROM posts p INNER JOIN users u ON p.author_id = u.id  ORDER BY p.created_at DESC");
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
      $req = $db->prepare("SELECT p.id id, p.author_id author_id, p.content content, p.created_at created_at, u.first_name first_name, u.last_name last_name, (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) as num_comments FROM posts p INNER JOIN users u ON p.author_id = u.id WHERE u.id = :user_id  ORDER BY p.created_at DESC");
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
  public function postComment($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("INSERT INTO comments (content, created_at, author_id, post_id) VALUES (:content, NOW(), :author_id, :post_id)");
      $req->bindValue(':content', $params['content'], PDO::PARAM_STR);
      $req->bindValue(':author_id', $params['author_id'], PDO::PARAM_INT);
      $req->bindValue(':post_id', $params['post_id'], PDO::PARAM_INT);
      $result = $req->execute();
      $req->closeCursor();
      return $result;
    } catch (Exception $e) {
      die("Error writing to DB" . $e->getMessage());
    }
  }

  // get comments
  public function getComments($params)
  {
    try {
      $db = $this->connect();
      $req = $db->prepare("SELECT c.content content, c.created_at created_at, u.first_name first_name, u.id author_id FROM comments c INNER JOIN users u ON c.author_id = u.id WHERE c.post_id = :post_id ORDER BY c.created_at DESC");
      $req->bindValue(':post_id', $params['post_id'], PDO::PARAM_INT);
      $req->execute();
      $result = $req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result;
    } catch (Exception $e) {
      die("An internal error occured: " . $e->getMessage());
    }
  }
  // delete comment
}
