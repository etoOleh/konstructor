<?php
declare(strict_types=1);

namespace Model;
header('Content-type: json/application');

use PDO;
use \PDOException;


/**
 * Модель поста
 *
 */
class PostModel extends Database
{

    /**
     * @return string
     */
    public function getPosts(): string
    {
        $stmt = $this->select('SELECT * from posts');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }

    /**
     * @param string|null $id
     * @return string
     */
    public function getPost(int $id): string
    {
        $stmt = $this->select("SELECT * FROM `posts` WHERE `id` = '$id'");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }

    /**
     * @param $data
     * @return void
     */
    public function addPost($data)
    {
        $title = $data['title'];
        $body = $data['body'];

        $stmt = $this->select("INSERT INTO `posts` (`id`, `title`, `body`) VALUES (NULL, '$title', '$body' ) ");
        $stmt->execute();

        http_response_code(201);

        $res = [
            "status" => true,
            "post_id" => true
        ];

        echo json_encode($res);
    }

    /**
     * @param $id
     * @param $data
     * @return void
     */
    public function updatePost($id, $data)
    {
        $title = $data['title'];
        $body = $data['body'];
        $stmt = $this->select( "UPDATE `posts` SET `title` = '$title', `body` = '$body' WHERE `posts` . `id` = '$id' ");
        $stmt->execute();
//        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "Post is updated"
        ];

        echo json_encode($res);

    }

    /**
     * @param $id
     * @return void
     */
    public function deletePost($id)
    {
        $stmt = $this->select("DELETE FROM posts WHERE `posts`.`id` = '$id'");
        $stmt->execute();

        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "Post is deleted"
        ];

        echo json_encode($res);

    }

}