<?php 


function showMenu() {
    $comment=listReportedComment();
    require('view/backend/menuBackEnd.php');
}

function addMemberController($pseudo,$password,$passwordCheck,$email){
    // Hachage du mot de passe


    if ($password===$passwordcheck) {

        
        $isAdded=addMember($pseudo,$password,$email);

        if ($isAdded) {
            
            require('index.php?action=opensessionpostlog');
            


        } 
        
        else {
            header('Location:view/backend/loginFail.php');}
        }
                
    else {header('Location:view/backend/loginFail.php');}
}

function login(){

    require('view/backend/login.php');

}

function openSession($pseudo,$password) {

    $registeredMember=isMember($pseudo);

    if (isset($registerdMember) && ($registeredMember['password']===$password)) {

        $_SESSION['pseudo']= $pseudo;
        
          
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


