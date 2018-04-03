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
    require('/view/backend/checkReported.php');
}

function eraseComment($id){
    $affectedLine=deleteComment($id);
    if ($affectedLine==false) {
        echo('Erreur : aucun commentaire n\'a été supprimé');
    }
    
    else {
        header('Location:index.php?action=postbackend');
    }
    }

function markBadComment($id) {
    reportBadComment($id);
    header('Location:index.php?action=post&id=' . $id);
}
