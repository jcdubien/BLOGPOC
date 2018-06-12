

<?php $title = 'Liste de commentaires du post : '. $post['title']; ?>

<?php ob_start(); ?>


<div class="news">

    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br($post['content']) ?>
    </p>

</div>

<h3>Commentaires</h3>

<?php

while ($comment = $comments->fetch())
{
?>

<div class="commentlist">

    <h4 ><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></h4>

    <p class='title'>
    
        <div  ><?= nl2br(htmlspecialchars($comment['comment'])) ?></div>
        <em><a class="btn btn-danger btn-sm" href="/BLOG/index.php?action=deletecomment&amp;id=<?= $comment['id'] ;?>&amp;postID=<?= $comment['post_id']; ?>" onClick="return confirm('Etes vous sûr ?')">Supprimer</a></em>
    
    </p><?php

}

?>
</div>
    

<div class="row" style="marginTop:30px,textAlign:center">    
    
    
    <a href="index.php?action=listpostbackend" class="btn btn-danger">Retour</a>


</div>  

 
<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

