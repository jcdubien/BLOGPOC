<?php 



require_once('model/commentManager.php');


function addComment($postId, $author, $comment){

    $commentManager=new CommentManager;


    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {

        die('Impossible d\'ajouter le commentaire !');
    }

    else {

        header('Location: index.php?action=post&id=' . $postId);
    }
}

function checkReportedComment(){

    $commentManager=new CommentManager;

    $comment=$commentManager->listReportedComment();

    return $comment;

    require('/view/backend/checkReported.php');
}

function eraseComment($id,$postId){

    $commentManager=new CommentManager;

    $affectedLine=$commentManager->deleteComment($id);

    if ($affectedLine==false) {

        echo('Erreur : aucun commentaire n\'a été supprimé');
    }
    
    else {

        header('Location:index.php?action=menubackend&id='. $postId);
    }
}


function confirmComment($id,$postID) {

    $commentManager= new CommentManager;

    $affectedLine=$commentManager->validateComment($id);

    if ($affectedLine==false) {

        echo('Erreur : aucun commentaire n\'a été validé');
    }
    
    else {
        
        header('Location:index.php?action=menubackend&id='. $postId);
    }
}



function markBadComment($id,$postID) {

    $commentManager= new CommentManager;

    $commentManager->reportBadComment($id);

    header('Location:index.php?action=post&id=' . $postID);
}
