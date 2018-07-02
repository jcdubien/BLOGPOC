<?php 


require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ArticleController {

    public function listPosts(){
        
        $postManager=new PostManager;

        $articles=$postManager->getPosts();

        require('view/frontend/listPostsView.php');
    }

    public function listPostsBackEnd(){

        $postManager=new PostManager;

        $articles=$postManager->getPosts();

        require('view/backend/listPost.php');

    }

    public function post(){

        $postManager=new PostManager;
        $commentManager=new CommentManager;

        $post = $postManager-> getPost($_GET['id']);

        if (!$post) {
            
            header('Location:index.php?action=error');
        } 
        
        else {

            $comments = $commentManager->getComments($_GET['id']);

            require('view/frontend/postView.php');
        }

    }

    public function sendPost($title,$content) {

        $postManager=new PostManager;

        $affectedLine=$postManager->postPost($title,$content);

        if ($affectedLine ===false) { header('Location:index.php?action=error');} else {

        require('view/backend/menuBackEnd.php');}
    }

    public function makeNewPost(){

        require('view/backend/postPost.php');
    }

    public function postBackEnd(){

        $postManager=new PostManager;
        $commentManager=new CommentManager;

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/backend/postViewBackEnd.php');
    }

    public function deletePost($id) {
        
        $postManager=new PostManager;

        $affectedLine=$postManager->erasePost($id);

        if ($affectedLine ===false) { header('Location:index.php?action=error');} else {

        header('Location:index.php?action=listpostbackend');}
        
    }

    public function modifyPost($id){

        $postManager=new PostManager;

        $post=$postManager->getPost($_GET['id']);

        require('view/backend/modifyPost.php');

    }

    public function changePost($id,$title,$content){

        $postManager=new PostManager;

        $affectedLine=$postManager->editPost($id,$title,$content);

        if ($affectedLine===false) { header('Location:index.php?action=error');} else {

        header('Location:index.php?action=listpostbackend');}

    }

}

