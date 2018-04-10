<?php 





function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function checkReportedComment(){

    $comment=listReportedComment();
    return $comment;
    require('/view/backend/checkReported.php');
}

function eraseComment($id,$postId){
    $affectedLine=deleteComment($id);
    if ($affectedLine==false) {
        echo('Erreur : aucun commentaire n\'a été supprimé');
    }
    
    else {
        header('Location:index.php?action=menubackend&id='. $postId);
    }
    }


function confirmComment($id,$postID) {
    $affectedLine=validateComment($id);
    if ($affectedLine==false) {
        echo('Erreur : aucun commentaire n\'a été validé');
    }
    
    else {
        header('Location:index.php?action=menubackend&id='. $postId);
    }
    }



function markBadComment($id,$postID) {
    reportBadComment($id);
    header('Location:index.php?action=post&id=' . $postID);
}
