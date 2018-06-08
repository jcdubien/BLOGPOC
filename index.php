<?php

session_start();

require('model/BackendManager.php');
require('model/CommentManager.php');
require('model/PostManager.php');
require('controller/ArticleController.php');
require('controller/CommentController.php');
require('controller/BackendController.php');


if (isset($_GET['action'])){
    $menu=$_GET['action'];
    
}
else {
    $menu='listPosts';
}

switch($menu) {

    case "post":
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $Post=new ArticleController;
                       
            $Post->post();
        }
        else {

            throw new Exception('Aucun identifiant de billet envoyé');
        }
    break;

    case "addComment":

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $Comment=new CommentController;

                $Comment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    break;

    case "listPosts":

        $Post=new ArticleController;

        $Post->listPosts();

    break;
   
    case "makenewpost":

        $Post=new ArticleController;
        
        $Post->makeNewPost();

    break;

    case "listpostbackend":

        $Backend=new ArticleController;


        $Backend->listPostsBackEnd();

    break;

    case "postpost":
                
       $Post=new ArticleController;

       $Post->sendPost($_POST['title'],$POST['']);

    break;

    case "menubackend":

        $Backend=new BackendController;
                
        $Backend->showMenu();

    break;

    case "addComment":

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $Comment=new CommentController;

                $Comment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);

            }
            else {
                // Autre exception
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

    break;

    case "checkcomment":

        $Comment=new CommentController;
        
        $Comment->checkReportedComment();

    break;
    
    case "deletecomment":

        $Comment=new CommentController;

        $Comment->eraseComment($_GET['id'],$_GET['postID']);

    break;

    case "confirmcomment":

        $Comment=new CommentController;

        $Comment->confirmComment($_GET['id'],$_GET['postID']);

    break;
    
    case "report":

        $Comment=new CommentController;

        $Comment->markBadComment($_GET['id'],$_GET['postID']);
        
    break;

    case "postbackend":

        $Article=new ArticleController;

        $Article->postBackEnd();
        
    break;

    case "postnew":

        $Post=new ArticleController;

        $Post->sendPost($_POST['title'],$_POST['post']);

    break;

   
    case "deletepost":

        $Post=new ArticleController;
        $Comment=new CommentController;
        
        $Post->deletePost($_GET['id']);

        $Comment->eraseCommentByPostId($_GET['id']);
       
    break;

    case "modifypost":

        $Post=new ArticleController;

        $Post->modifyPost($_GET['id']);

    break;

    case "changepost":

        $Post=new ArticleController;

        $Post->changePost($_GET['id'],$_POST['title'],$_POST['post']);

    break;

    case "login":

        $Backend=new BackendController;
    
        $Backend->login();

    break;

    case "opensession":

        $Backend=new BackendController;
        
        $Backend->openSession($_POST['pseudo'],$_POST['password']);
    
    break;

    case "opensessionpostlog":

        $Backend=new BackendController;

        $Backend->openSession($_GET['pseudo']);

    break;

    case "loginSuccess":
        
        $Backend=new BackendController;

        $Backend->loginSuccess();

    break;

    case "logout":

        $Backend=new BackendController;
        
        $Backend->logout();

    break;

    case 'createaccount':

        $Backend=new BackendController;

        $Backend->createAccount();

    break;

    case 'addmember':

        $Backend=new BackendController;

        $Backend->addMemberController($_POST['pseudo'],$_POST['password'],$_POST['passwordcheck'],$_POST['mail']);

    break;

    case 'bio':

        $Backend=new BackendController;

        $Backend->bio();

    break;

       
    
    default:

        $Post=new ArticleController;

        $Post->listPosts();
}
