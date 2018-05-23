<?php 

require_once('model/BackendManager.php');
require_once('model/CommentManager.php');

class BackendController {

    function showMenu() {

        $commentManager=new CommentManager;

        $comment=$commentManager->listReportedComment();

        require('view/backend/menuBackEnd.php');
    }

    function addMemberController($pseudo,$password,$passwordcheck,$email){
    
        $addaction=false;

        $backendManager=new BackendManager;

        if ($password==$passwordcheck) {
            
            
            $isAdded=$backendManager->addMember($pseudo,$password,$email);
        

            if ($isAdded) {

                $addAction=true;

                $this->openSession($pseudo,$password);
                
            } 
            
            else {

                $error="Impossible d'enregistrer l'utilisateur";

                require('view/backend/createAccount.php');
            }
        }

        else {

            $error='Mots de passe différents';

            require('view/backend/createAccount.php');
        }        
    }

    function login(){

        require('view/backend/login.php');

    }

    function openSession($pseudo,$password) {

        $backendManager=new BackendManager;

        $registeredMember=$backendManager->isMember($pseudo);

        $checkPass=$backendManager->checkPassword($pseudo,$password);
    
        if ($registeredMember!=0 && $checkPass) {

            $_SESSION['pseudo']= $pseudo;
            
            header('Location:index.php');}

        else  {
        
            $error="Utilisateur ou mot de passe incorrect";

            if (isset($addAction)) {

                if ($addAction) {

                    require('view/backend/createAccount.php');
                }   
            }
            
            else 
            
                {require('view/backend/login.php');}

        }

    }


    function logout(){

        session_destroy();

        header('Location:index.php');
    }


    function createAccount(){

        require('view/backend/createAccount.php');
    }


    function bio() {

        require('view/frontend/bio.php');
    }

}
