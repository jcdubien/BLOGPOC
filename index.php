<?php



require('model/frontend.php');
require('controller/article_controller.php');
require('controller/comment_controller.php');
require('controller/backend_controller.php');



if (isset($_GET['action'])){
    $menu=$_GET['action'];
    
}
else {
    $menu='listPosts';
}

switch($menu) {

    case "post":
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    break;

    case "addComment":
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
        listPosts();
    break;
    
    case "post":

            echo $_GET['id'];
            
                if ((isset($GET['id'])) && $GET['id'] >0) {
                    post();
                }
                else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
    break;

    case "makenewpost":
        makeNewPost();
    break;

    case "listpostbackend":
        listPostsBackEnd();
    break;

    case "postpost":
       sendPost($_POST['title'],$POST['']);
    break;

    case "menubackend":
        listReportedComment();       
        showMenu();
    break;

    case "addComment":

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                // Autre exception
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

    break;

    case "checkcomment":
        checkReportedComment();
    break;
    
    case "deletecomment":
        eraseComment($_GET['id']);
    break;

    case "report":
        markBadComment($_GET['id']);
        
    break;

    case "postbackend":
        postBackEnd();
        
    break;

    case "postnew":
        sendPost($_POST['title'],$_POST['post']);
    break;

    default:
        listPosts();
}
