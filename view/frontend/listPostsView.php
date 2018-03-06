<html>

<?php $title = 'Liste des actualités'; ?>

<?php ob_start(); ?>

<?php
        while ($data = $articles->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                    <em><a href="/BLOG/post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

</html>



       




