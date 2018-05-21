

<?php $title = 'Liste des actualités'; ?>

<?php ob_start(); ?>

<div class="top-img">

    <img  src="public/alaska.jpg">

</div>

<?php
        while ($data = $articles->fetch())
        {
        ?>
            <div class="news">
                <div >
                    <h3 class="title" ><?= htmlspecialchars($data['title']) ?></h3>
                    <em class="title">le <?= $data['creation_date_fr'] ?></em>
                </div>
                
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





       




