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

        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    public function sendPost($title,$content) {

        $postManager=new PostManager;

        $postManager->postPost($title,$content);

        require('view/backend/menuBackend.php');
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

        $postManager->erasePost($id);

        header('Location:index.php?action=listpostbackend');
        
    }

    public function modifyPost($id){

        $postManager=new PostManager;

        $post=$postManager->getPost($_GET['id']);

        require('view/backend/modifyPost.php');

    }

    public function changePost($id,$title,$content){

        $postManager=new PostManager;

        $postManager->editPost($id,$title,$content);

        header('Location:index.php?action=listpostbackend');

    }

}

