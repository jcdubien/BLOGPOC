<?php $title = 'Utilisateur non enregistrable'; ?>

<?php ob_start(); ?>

<section class="col-lg-12">

    <h2>Quelque chose s'est mal passé , l'utilisateur n'a pas été ajouté ! <h2>

</section>
       
<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>