

<?php $title = 'Choix backend'; ?>


<?php ob_start(); 

        $backendManager=new BackendManager;
             
        if ((isset($_SESSION['pseudo'])) && ($backendManager->isAdmin($_SESSION['pseudo'])==1))  {?>

        <link rel="stylesheet" href="/BLOG/public/css/style.css">

        <form action="\BLOG\index.php" method="post">

        <div class="row menu">
                
        <div class="col-lg-6 col-sm-6 col-xs-6" >  
                
                <h2>Que souhaitez vous faire ?<br /></h2>
                <br />

                <a href='index.php?action=makenewpost'>Poster un nouveau billet</a><br/>
                <a href='index.php?action=listpostbackend'>Lister les billets pour suppression ou modification</a><br />
        
        </div>

        <div class="col-lg-6 col-sm-6 col-xs-6" > 

        <h2>Derniers commentaires signalés</h2>

        

        <?php




        $comment=checkReportedComment();

        foreach ($comment as $data) { ?>

                <div class="news">

                        <p>
                                <?= htmlspecialchars($data['author']) ?>
                                <em>le <?= $data['comment_date_fr'] ?></em>
                        </p>
                        
                        <p>
                                <?= nl2br($data['comment']) ?>
                                
                                <em><a class=mark href="/BLOG/index.php?action=deletecomment&amp;id=<?= $data['id'] ;?>&amp;postID=<?= $data['post_id']; ?>" onClick="return confirm('Etes vous sûr ?')">Supprimer</a></em>
                                <em><a class=mark href="/BLOG/index.php?action=confirmcomment&amp;id=<?= $data['id'] ;?>&amp;postID=<?= $data['post_id']; ?>">Valider</a></em>
                        </p>

                </div> 

        <?php }?>

        
        </form>

        </div>

<?php } else {?>

        <h1>Quelque chose s'est mal passé ...</h1>

<?php } ?>

 

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

