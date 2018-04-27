<?php 


function showMenu() {
    $comment=listReportedComment();
    require('view/backend/menuBackEnd.php');
}

function addMemberController($pseudo,$password,$passwordCheck,$email){
    // Hachage du mot de passe


    

        addMember($pseudo,$password,$email);
        $isAdded=addMember($pseudo,$password,$email);

        if ($isAdded) {
            
            header('Location:index.php?action=opensessionpostlog&pseudo='.$pseudo);
            
        } 
        
        else {
            header('Location:view/backend/loginFail.php');}
        }
                
   

function login(){

    require('view/backend/login.php');

}

function openSession($pseudo) {

    $registeredMember=isMember($pseudo);
    

    if (isset($registerdMember)) {

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


