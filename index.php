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

try {

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

            if (isset($_POST['title'])) {
                    
        $Post=new ArticleController;

        $Post->sendPost($_POST['title'],$POST['']);
        
            }

            else { throw new exception ('Pas d\'identifiant de billet'); }
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

            if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['postID']) && $_GET['postID']>0) {

            $Comment=new CommentController;

            $Comment->eraseComment($_GET['id'],$_GET['postID']);}

            else {throw new exception('identifiants incorrects');}

        break;

        case "confirmcomment":

        if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['postID']) && $_GET['postID']>0) {

            $Comment=new CommentController;

            $Comment->confirmComment($_GET['id'],$_GET['postID']);}

            else {throw new exception('identifiants incorrects');}
            

        break;
        
        case "report":

            if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['postID']) && $_GET['postID']>0) {

            $Comment=new CommentController;

            $Comment->markBadComment($_GET['id'],$_GET['postID']);}

            else {throw new exception('identifiants incorrects');}
            
        break;

        case "postbackend":

            $Article=new ArticleController;

            $Article->postBackEnd();
            
        break;

        case "postnew":

        if (!empty($_POST['title']) && !empty($_POST['post'])) { 

            $Post=new ArticleController;

            $Post->sendPost($_POST['title'],$_POST['post']);}

        else { throw new exception ('Tous les champs ne sont pas remplis ! ');}

            

        break;

    
        case "deletepost":

            $Post=new ArticleController;
            $Comment=new CommentController;

            if (isset($_GET['id']) && $_GET['id'] > 0) {
            
            $Post->deletePost($_GET['id']);

            $Comment->eraseCommentByPostId($_GET['id']);}

            else { throw new exception ('Identifiants inccorects'); }
        
        break;

        case "modifypost":

            if (isset($_GET['id']) && $_GET['id'] > 0) {

            $Post=new ArticleController;

            $Post->modifyPost($_GET['id']);}

            else {throw new exception ('Identifiants incoorects');}

        break;

        case "changepost":

            if (isset($_GET['id']) && $_GET['id'] > 0) {

                if (!empty($_POST['title']) && !empty($_POST['post'])) {

            

            $Post=new ArticleController;

            $Post->changePost($_GET['id'],$_POST['title'],$_POST['post']);}
        
            else {throw new exception ('Problème d\'identifiants');}
            }

        break;

        case "login":

            $Backend=new BackendController;
        
            $Backend->login();

        break;

        case "opensession":

            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {


            $Backend=new BackendController;
            
            $Backend->openSession($_POST['pseudo'],$_POST['password']);}

            else {throw new exception ('Les champs sont vides');}
        
        break;

        case "opensessionpostlog":

        if (!empty($_GET['pseudo']) && !empty($_POST['password'])) {

            $Backend=new BackendController;

            $Backend->openSession($_GET['pseudo']);}

            else { throw new exception ('Les champs ne sont pas remplis'); }

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

            if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['passwordcheck']) && !empty($_POST['mail'])) {

            $Backend=new BackendController;

            $Backend->addMemberController($_POST['pseudo'],$_POST['password'],$_POST['passwordcheck'],$_POST['mail']);}

            else { throw new exception ('Tous les champs ne sont pas remplis ! ');}

        break;

        case 'bio':

            $Backend=new BackendController;

            $Backend->bio();

        break;

        
        
        default:

            $Post=new ArticleController;

            $Post->listPosts();
    }
}

catch(Exception $e) {
     // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();

}