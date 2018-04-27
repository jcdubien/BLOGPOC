<?php 

function addMember($pseudo,$pass,$email){

$passHash=password_hash($pass,PASSWORD_DEFAULT);

$db=dbConnect();
$req = $db->prepare('INSERT INTO users(pseudo, pass,email ) VALUES(:pseudo, :pass , :email)');
$affectedLine=$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $passHash,
    'email'=>$email,
    ));
return $affectedLine;
}

function checkPassword(){
    

}

function isMember($pseudo) {
$db=dbConnect();
$req = $db->prepare('SELECT id,pseudo,pass,email FROM users WHERE pseudo=:pseudo');
$affectedLine=$req->execute(array(
    'pseudo'=>$pseudo,
));
return $affectedLine;

}


function listMember($pseudo){
    $db=dbConnect();
    $req=$db->query('SELECT users(id,pseudo,pass,email) ORDER BY id');
    return $req;
    
    
    }

