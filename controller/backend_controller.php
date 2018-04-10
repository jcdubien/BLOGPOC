<?php 


function showMenu() {
    $comment=listReportedComment();
    require('view/backend/menuBackEnd.php');
}

function addMemberController($pseudo,$pass){
    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    addMember($pseudo,$pass_hache);
    header('Location:index.php?action=success');

}

function loginSuccess(){
    require('view/backend/loginSuccess.php');
}
