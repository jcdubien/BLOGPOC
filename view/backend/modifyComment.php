
<?php $title = $post; ?>

<?php ob_start(); ?>


<div class="news">

    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>


    <h3>Commentaires</h3>

    <?php

    while ($comment = $comments->fetch()) {?>

        <p><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?><a class=mark href="index.php?action=deletecomment&amp;id=<?= $post['id']?>">Supprimer</a></p>
    
    <?php } ?>

</div>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

    
    <div class="row">
        
            <div class="col-lg-12">  
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
    </div>

    <div class="row">
            <div class="col-lg-12">
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
    <div>

    <div class="row">
        <div class="col-lg-12">
            <input type="submit" />
        </div>
    </div>

</form>


<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

