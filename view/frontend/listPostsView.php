

<?php $title = 'Liste des actualités'; ?>


<?php ob_start(); ?>

<?php
        while ($data = $articles->fetch())
        {
        ?>
            <div class="news">
                <div >
                    <h3 class="title">

                        <a href="/BLOG/index.php?action=post&amp;id=<?= $data['id'] ?>">
                            <?= htmlspecialchars($data['title']) ?>
                        </a>
                    </h3>

                    <em class="title">le <?= $data['creation_date_fr'] ?></em>
                </div>
                
                <div>
                
                    <?= strip_tags($data['content']).'....' ?>

                    <br/>
                                      
                    <em><a class="btn btn-warning" href="/BLOG/index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite ...</a></em>
                    
                </div>
            </div>
        <?php
        }
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>





       




