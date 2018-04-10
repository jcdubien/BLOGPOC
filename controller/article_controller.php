<?php 





function listPosts(){

    $articles = getPosts();
    require('view/frontend/listPostsView.php');
}

function listPostsBackEnd(){
    $articles=getPosts();
    require('view/backend/listPost.php');

}

function post(){

    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/frontend/postView.php');
}

function sendPost($title,$content) {

    postPost($title,$content);
    require('view/backend/menuBackend.php');
}

function makeNewPost(){

    require('view/backend/postPost.php');
}

function postBackEnd(){

    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/backend/postViewBackEnd.php');
}