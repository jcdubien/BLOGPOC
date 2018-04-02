
<?php $title = 'Liste des posts et supprimer / modifier '; ?>

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
                    <?= nl2br(htmlspecialchars($data['content'])) ?><a href="#"> Supprimer </a><a href="#"> Modifier </a>
                    <br />
                    <em><a href="/BLOG/index.php?action=post&amp;id=<?= $data['id'] ?>=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>