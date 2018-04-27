<?php

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

function listReportedComment(){
    $db=dbConnect();
    $comment=$db->query('SELECT id,author,comment,post_id,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM t_comment WHERE reported=1 ORDER BY comment_date DESC LIMIT 0,10 ');
    return $comment;
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

