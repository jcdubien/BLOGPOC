<?php 




// Return all articles
function getPosts() {
    $db = dbConnect();
    $articles = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM t_article ORDER BY creation_date DESC LIMIT 0, 5');
    return $articles;
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
    $comments = $db->prepare('SELECT id, post_id, author, comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM t_comment WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

function getAllComments()
{
    $db = dbConnect();
    $comments = $db->query('SELECT id, author, comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\'),reported AS comment_date_fr FROM t_comment ORDER BY reported DESC,comment_date DESC');
    return $comments;
}


function postComment($postId,$author,$comment) {

    $db=dbConnect();
    $comments = $db->prepare('INSERT INTO t_comment(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function erasePost($id) {
    $db=dbConnect();
    $article=$db->prepare('DELETE FROM t_article WHERE id=?');
    $affectedLines=$article->execute(array($id));
    return $affectedLines;

}

function editPost($id,$title,$content) {
    $db=dbConnect();
    $article=$db->prepare('UPDATE t_article SET title=?,content=? WHERE id=?');
    $affectedLine=$article->execute(array($title,$content,$id));
    return $affectedLine;

}

function reportBadComment($id) {
    $db=dbConnect();
    $report=$db->prepare('UPDATE t_comment SET reported=1 WHERE id=?');
    $affectedLine=$report->execute(array($id));
    return $affectedLine; 
}

function validateComment($id) {
    $db=dbConnect();
    $report=$db->prepare('UPDATE t_comment SET reported=0 WHERE id=?');
    $affectedLine=$report->execute(array($id));
    return $affectedLine; 
}

function deleteComment($id){
    $db=dbConnect();
    $comment=$db->prepare('DELETE FROM t_comment WHERE id=?');
    /*die(print_r($comment->errorInfo()));*/
    $affectedLines=$comment->execute(array($id));
    return $affectedLines;

}

function postPost($title,$content){
    $db=dbConnect();
    $article=$db->prepare('INSERT INTO t_article(title,content,creation_date) VALUES(:title,:content,NOW())');
    /*die(print_r($article->errorInfo()));*/
    $affectedLines=$article->execute(array(
        'title'=>$title,
        'content'=>$content,
    ));
    return $affectedLines;
}

function listReportedComment(){
$db=dbConnect();
$comment=$db->query('SELECT id,author,comment,post_id,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM t_comment WHERE reported=1 ORDER BY comment_date DESC LIMIT 0,10 ');
return $comment;
}

function addMember($pseudo,$pass,$email){

$passHash=password_hash($pass);

    // Insertion
$db=dbConnect();
$req = $db->prepare('INSERT INTO users(pseudo, pass,email ) VALUES(:pseudo, :pass , :email)');
$affectedLine=$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $passHash,
    'email'=>$email,
    ));
return $affectedLine;
}

function isMember($pseudo) {

$req = $bdd->prepare('SELECT id,pseudo,pass,email FROM users WHERE pseudo=:pseudo');
$affectedLine=$req->execute(array(
    'pseudo'=>$pseudo,
));
return $affectedLine;

}


function listMember($pseudo){
    $req=$bdd->query('SELECT users(id,pseudo,pass,email) ORDER BY id');
    return $req;
    
    
    }



function dbConnect() {

        try{
            $db=new PDO('mysql:host=localhost;dbname=microcms;charset=utf8','microcms_user','secret',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $db;
        }

        catch(Exception $e){

            die ('Erreur'.$e->getMessage());
        }

}