<?php 

require_once("Manager.php");

class PostManager extends Manager {


    public function getPosts() {

        $db = $this->dbConnect();

        $articles = $db->query('SELECT id, title, LEFT(content,150) AS content  , DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM t_article ORDER BY creation_date DESC LIMIT 0, 5');
        
        return $articles;
    }


    public function getPost($postId) {

        $db=$this->dbConnect();

        $req = $db->prepare('SELECT id, title, content,DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM t_article WHERE id = ?');
        
        $req->execute(array($postId));

        $post = $req->fetch();

        
        return $post;
        
     
    }

    public function postPost($title,$content){

        $db=$this->dbConnect();

        $article=$db->prepare('INSERT INTO t_article(title,content,creation_date) VALUES(:title,:content,NOW())');
        
        $affectedLine=$article->execute(array(
            'title'=>$title,
            'content'=>$content,));

        return $affectedLine;
    }

    public function erasePost($id) {

        $db=$this->dbConnect();

        $article=$db->prepare('DELETE FROM t_article WHERE id=?');

        $affectedLine=$article->execute(array($id));

        return $affectedLine;

    }

    public function editPost($id,$title,$content) {

        $db=$this->dbConnect();

        $article=$db->prepare('UPDATE t_article SET title=?,content=? WHERE id=?');

        $affectedLine=$article->execute(array($title,$content,$id));
        
        return $affectedLine;

    }

}