<?php

require('model/frontend.php');
require_once('controller/article_controller.php');
require_once('controller/comment_controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif ($_GET['action'] == 'postNew') {
        sendPost($_POST['title'],$_POST['post']);
    }

    elseif ($_GET['action'] == 'report') {
        reportBadComment($_GET['']);
    }

    
    elseif ($_GET['action'] == 'addComment') {
        
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }}}
      
}   
    
else {
    listPosts();
}