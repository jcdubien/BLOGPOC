<?php $title = 'Champ manquant'; ?>

<?php ob_start(); ?>


    <h1>Erreur : Tous les champs ne sont pas remplis ....</h1>

    <div > 
            
    <a href="javascript:history.back()" class="btn btn-danger">Retour</a>

    </div>
        


<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>