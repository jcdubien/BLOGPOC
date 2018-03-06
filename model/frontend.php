<?php


// Return all articles
function getPosts() {
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM t_article ORDER BY creation_date DESC LIMIT 0, 5');
    return $req;
}

//Return one single article
function getPost($postId) {
    $db=dbConnect();
    $req = $db->prepare('SELECT id, title, content,DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM t_article WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;

}

//Return a comment

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM t_comment WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}



function dbConnect() {

        try{
            $db=new PDO('mysql:host=localhost;dbname=microcms;charset=utf8','microcms_user','secret');
            return $db;
        }

        catch(Exception $e){

            die ('Erreur'.$e->getMessage());
        }

}