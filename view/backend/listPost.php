
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
                    <?= nl2br(htmlspecialchars($data['content'])) ?><a class=mark href="index.php?action=deletepost&amp;id=<?= $data['id']?>"> Supprimer </a><a class=mark href="index.php?action=modifypost&amp;id=<?= $data['id']?>"> Modifier </a>
                    <a class=mark href="/BLOG/index.php?action=postbackend&amp;id=<?= $data['id'] ?>">Commentaires</a>
                    
                   
                </p>
            </div>
        <?php
        }
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>