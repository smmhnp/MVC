<?php

class Article {
    private $db;

    function __construct (){
        $this -> db = new Database;
    }

    function GetArticle (){
        // article.id as articleID -> mean: from article table in mvc database, id column save as articleID
        // ON article.user_id = users.id -> mean: on article table, user_id column just show row that equal to users table, id column
        // ORDER BY article.CreateDate DESC -> mean: sort articles from newwst ti oldest

        $this -> db -> query ("
            SELECT *,
            article.id as articleID,
            users.id as userID,
            article.CreateDate as articleCreated,
            users.CreateDate as userCreated
            FROM article
            INNER JOIN users
            ON article.user_id = users.id
            ORDER BY article.CreateDate DESC
        ");

        return $this -> db -> fetchAll();
    }

    function AddArticle ($data){
        $this -> db -> query ('
            INSERT INTO `article`(`user_id`, `title`, `bady`) 
            VALUES (:user_id, :title, :body)
        ');

        $this -> db -> bind(':title', $data['title']);
        $this -> db -> bind(':user_id', $data['user_id']);
        $this -> db -> bind(':body', $data['body']);

        if ($this -> db -> execute()){
            return true;
        }
        return false;
    }

    function GetArticleById ($id){
        $this -> db -> query ('SELECT * FROM article WHERE id = :id');
        $this -> db -> bind(':id', $id);
        return $this -> db -> fetch();
    }

    function UpdateArticle ($data){
        $this -> db -> query ('
            UPDATE `article` SET 
            title = :title, 
            bady = :body
            WHERE id = :id
        ');

        $this -> db -> bind(':id', $data['id']);
        $this -> db -> bind(':title', $data['title']);
        $this -> db -> bind(':body', $data['body']);
        
        if ($this -> db -> execute()){
            return true;
        }
        return false;
    }

    function DeleteArticle ($id){
        $this -> db -> query ('DELETE FROM `article` WHERE id = :id');
        $this -> db -> bind(':id', $id);

        if ($this -> db -> execute()){
            return true;
        }
        return false;
    }
}