<?php $title = 'Mettre en ligne un post'; ?>


<?php ob_start(); ?>

 <form action="index.php?action=postComment&amp;id=<?= $post['id'] ?>" method="post">

    <div class="row">
                
                <div class="col-lg-12">  
                    <label for="post">Auteur</label><br />
                    <textarea id="post">Votre billet</textarea>
                </div>
        </div>

 </form>

<?php
        
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('/BLOG/view/frontend/template.php') ?>