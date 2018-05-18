

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
                    <?= nl2br($data['content']) ?>
                    <br />
                    <?php if ((isset($_SESSION['pseudo']) )) { ?>
                    <em><a class="btn btn-warning" href="/BLOG/index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                    <?php } ?>
                </p>
            </div>
        <?php
        }
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>





       




