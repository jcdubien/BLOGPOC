<?php

require_once("manager.php");

class CommentManager extends Manager {

    public function getComments($postId){

        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, post_id, author, comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM t_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    

    public function getAllComments() {

        $db = $this ->dbConnect();

        $comments = $db->query('SELECT id, author, comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\'),reported AS comment_date_fr FROM t_comment ORDER BY reported DESC,comment_date DESC');
        
        return $comments;
    }


    public function postComment($postId,$author,$comment) {

        $db=$this->dbConnect();

        $comments = $db->prepare('INSERT INTO t_comment(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');

        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function listReportedComment(){

        $db=$this->dbConnect();

        $comment=$db->query('SELECT id,author,comment,post_id,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM t_comment WHERE reported=1 ORDER BY comment_date DESC LIMIT 0,10 ');
        
        return $comment;

    }

    public function reportBadComment($id) {

        $db=$this->dbConnect();

        $report=$db->prepare('UPDATE t_comment SET reported=1 WHERE id=?');

        $affectedLine=$report->execute(array($id));

        return $affectedLine; 
    }

    public function isreported($id) {
        
        $db=$this->dbConnect();

        $report=$db->prepare('SELECT reported FROM t_comment WHERE id=?');

        $affectedLine=$report->execute(array($id));

        return $affectedLine;

    }

    public function validateComment($id) {

        $db=$this->dbConnect();

        $report=$db->prepare('UPDATE t_comment SET reported=0 WHERE id=?');

        $affectedLine=$report->execute(array($id));

        return $affectedLine; 
    }

    public function deleteComment($id){

        $db=$this->dbConnect();

        $comment=$db->prepare('DELETE FROM t_comment WHERE id=?');

        $affectedLines=$comment->execute(array($id));

        return $affectedLines;
    }

}