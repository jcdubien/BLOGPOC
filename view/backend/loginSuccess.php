<?php $title = 'Utilisateur enregistré avec succès'; ?>


<?php ob_start(); ?>

<section class="col-lg-12">

    <h2>Vous avez été enregistré avec succès<h2>
    <br/>
    <p>Bienvenue <?=$_SESSION['pseudo'] ?> !</p>
    
</section>
       
<?php
        
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>