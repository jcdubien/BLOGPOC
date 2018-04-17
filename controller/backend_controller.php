<?php 


function showMenu() {
    $comment=listReportedComment();
    require('view/backend/menuBackEnd.php');
}

function addMemberController($pseudo,$password,$passwordCheck,$email){
    // Hachage du mot de passe


    if ($password===$passwordcheck) {

        addMember($pseudo,$password,$email);
        $isAdded=addMember($pseudo,$password,$email);

        if ($isAdded) {
            
            $_SESSION['pseudo']= $pseudo;
        
            $_SESSION['password']=password_hash($password,PASSWORD_DEFAULT);
    
            $passwordHash=password_hash($password,PASSWORD_DEFAULT);


        } else {
            ?>Le membre n'a pas pû être ajouté<?php
        }
                
        header('Location:index.php');}

    else {

    require('view/backend/loginfail.php');

    }

    
    header('Location:index.php?action=success');

}

function login(){
    require('view/backend/login.php');

}

function openSession($pseudo,$password,$passwordcheck,$mail) {

    if ($password===$passwordcheck) {

    $_SESSION['pseudo']= $pseudo;
    
    $_SESSION['password']=password_hash($password,PASSWORD_DEFAULT);

    $passwordHash=password_hash($password,PASSWORD_DEFAULT);
    
    header('Location:index.php');}

    else {

    require('view/backend/loginfail.php');
    }

}

function logout(){

    session_destroy();
    header('location:index.php');
}

function createAccount(){
    require('view/backend/createAccount.php');
}


