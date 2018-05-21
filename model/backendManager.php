<?php 

require_once("manager.php");

class BackendManager extends Manager {

    public function addMember($pseudo,$pass,$email){

        $passHash=password_hash($pass,PASSWORD_DEFAULT);

        $db=$this->dbConnect();

        $req = $db->prepare('INSERT INTO users(pseudo, pass,email,is_admin) VALUES(:pseudo, :pass , :email, 0)');
        
        $affectedLine=$req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $passHash,
            'email'=>$email,
            ));

        return $affectedLine;

    }


    public function checkPassword($pseudo ,$password){

        $db=$this->dbConnect();

        $req=$db->prepare('SELECT pass FROM users WHERE pseudo=? ' );
        $affectedLine=$req->execute(array($pseudo
        ));
        $user=$req->fetch();
        
        

        if ($affectedLine){

            $passcheck=password_verify($password,$user['pass']); 
        } 
        else {

            $passcheck=false;
        }

        return $passcheck;
    }

    public function getPassword($pseudo) {

        $db=$this->dbConnect();

        $req=$db->prepare('SELECT pass FROM users WHERE pseudo=?');

        $affectedLine=$req->execute(array($pseudo));

        $user=$req->fetch();

        return $user['pass'];

    }

    public function isMember($pseudo) {
        
        $db=$this->dbConnect();

        $req = $db->prepare('SELECT id,pseudo,pass,email FROM users WHERE pseudo=:pseudo');
        
        $affectedLine=$req->execute(array(
            'pseudo'=>$pseudo,
        ));

        return $affectedLine;

    } 

    public function isAdmin($pseudo){

        $db=$this->dbConnect();

        $req=$db->prepare('SELECT is_admin FROM users WHERE pseudo=?');

        $affectedLine=$req->execute(array($pseudo));

        $user=$req->fetch();

        return $user['is_admin'];
    }


    public function listMember($pseudo){

        $db=$this->dbConnect();

        $req=$db->query('SELECT users(id,pseudo,pass,email) ORDER BY id');

        return $req;
        
        
    }

}