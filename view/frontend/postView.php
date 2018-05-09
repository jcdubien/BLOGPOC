
<?php $title = $post['title']; ?>

<?php ob_start(); ?>


<div class="news">

    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br($post['content']) ?>
    </p>


    <h3>Commentaires</h3>

    <?php

    while ($comment = $comments->fetch()) { ?>

        <p><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br($comment['comment']) ?><a class=mark href="index.php?action=report&amp;postID=<?= $comment['post_id'];?>&amp;id=<?= $comment['id']?>">Signaler</a></p>
   
   <?php }?>

</div>

<form class="formulaire" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

    <fieldset>

        <div class="form-group">

            <div class="row">
                
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">  
                        <label for="author">Auteur</label><br />
                        <?php if (isset($_SESSION['pseudo'])) {$pseudo=$_SESSION['pseudo'];} else {$pseudo=' ';}?> 
                        <input class="form-control" type="text" id="author" name="author" value=<?=$pseudo?> >
                    </div>
            </div>

            <div class="row">

                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

                        <label for="comment">Commentaire</label><br />
                        <textarea class="form-control" id="comment" name="comment" placeholder="Votre commentaire" ></textarea>

                    </div>
            <div>

        </div>

        <button class="btn btn-primary bouton" type="submit">Envoyer</button>

    </fieldset>

</form>


<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

