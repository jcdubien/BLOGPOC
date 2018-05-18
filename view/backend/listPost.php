
<?php $title = 'Liste des posts et supprimer / modifier '; ?>

<?php ob_start(); ?>

<?php
        
    while ($data = $articles->fetch()){
    ?>
        <div class="news">
            
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br($data['content']) ?>
                <a class="btn btn-info" href="index.php?action=deletepost&amp;id=<?= $data['id']?>" onClick="return confirm('Etes vous sûr ?')">Supprimer </a>
                <a class="btn btn-info" href="index.php?action=modifypost&amp;id=<?= $data['id']?>"> Modifier </a>
                <a class="btn btn-info" href="/BLOG/index.php?action=postbackend&amp;id=<?= $data['id'] ?>">Commentaires</a>
                    
            </p>

           

        </div>
    <?php
    
    }?>

    <div > 
            
    <a href="index.php?action=menubackend" class="btn btn-danger">Retour</a>

    </div>
        


<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>