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


