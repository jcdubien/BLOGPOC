<?php $title = 'Erreur 404'; ?>

<?php ob_start(); ?>


    <h1>Erreur 404 : La page demandée est indisponible</h1>

    <div > 
            
    <a href="index.php?action=listPosts" class="btn btn-danger">Retour</a>

    </div>
        


<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>