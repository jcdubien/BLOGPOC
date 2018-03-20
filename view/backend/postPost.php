<?php $title = 'Mettre en ligne un post'; ?>


<?php ob_start(); ?>

 <form action="\BLOG\index.php?action=postPost&amp;id=<?= $post['id'] ?>" method="post">

    <div class="row">
                
                <div class="col-lg-12">  
                    <label for="title">Titre</label><br />
                    <input type="text" id="title" name="title"></text></br>
                    <label for="post">Votre billet</label><br />
                    <textarea id="post" name="post"></textarea>
                    <input type='submit' value='Envoyer'>
                </div>
        </div>

 </form>

<?php
        
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>