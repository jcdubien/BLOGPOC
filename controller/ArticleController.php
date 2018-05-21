<?php 


require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts(){
    
    $postManager=new PostManager;

    $articles=$postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function listPostsBackEnd(){

    $postManager=new PostManager;

    $articles=$postManager->getPosts();

    require('view/backend/listPost.php');

}

function post(){

    $postManager=new PostManager;
    $commentManager=new CommentManager;

    $post = $postManager-> getPost($_GET['id']);

    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function sendPost($title,$content) {

    $postManager=new PostManager;

    $postManager->postPost($title,$content);

    require('view/backend/menuBackend.php');
}

function makeNewPost(){

    require('view/backend/postPost.php');
}

function postBackEnd(){

    $postManager=new PostManager;
    $commentManager=new CommentManager;

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/backend/postViewBackEnd.php');
}

function deletePost($id) {
    
    $postManager=new PostManager;

    $postManager->erasePost($id);

    header('Location:index.php?action=listpostbackend');
    
}

function modifyPost($id){

    $postManager=new PostManager;

    $post=$postManager->getPost($_GET['id']);

    require('view/backend/modifyPost.php');

}

function changePost($id,$title,$content){

    $postManager=new PostManager;

    $postManager->editPost($id,$title,$content);

    header('Location:index.php?action=listpostbackend');

}

