

<?php $title = 'Choix backend'; ?>


<?php ob_start(); 

        $backendManager=new BackendManager;
             
        if ((isset($_SESSION['pseudo'])) && ($backendManager->isAdmin($_SESSION['pseudo'])==1))  {?>

        <link rel="stylesheet" href="/BLOG/public/css/style.css">

        <form action="\BLOG\index.php" method="post">

        <div class="row menu">
                
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >  
                
                <h2>Que souhaitez vous faire ?<br /></h2>
                <br />

                <a class="btn btn-info" href='index.php?action=makenewpost'>Poster un nouveau texte</a><br/>
                <a class="btn btn-info" href='index.php?action=listpostbackend'>Editer les textes</a><br />

        
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" > 

        <h2>Derniers commentaires signalés</h2>

        

        <?php


        $controller=new CommentController;

        $comment=$controller->checkReportedComment();

        foreach ($comment as $data) { ?>

                <div >

                        <p>
                                <?= htmlspecialchars($data['author']) ?>
                                <em>le <?= $data['comment_date_fr'] ?></em>
                        </p>
                        
                        <p>
                                <?= nl2br($data['comment']) ?>
                                
                                <em><a class="btn btn-info btn-sm" href="/BLOG/index.php?action=deletecomment&amp;id=<?= $data['id'] ;?>&amp;postID=<?= $data['post_id']; ?>" onClick="return confirm('Etes vous sûr ?')">Supprimer</a></em>
                                <em><a class="btn btn-info btn-sm" href="/BLOG/index.php?action=confirmcomment&amp;id=<?= $data['id'] ;?>&amp;postID=<?= $data['post_id']; ?>">Valider</a></em>
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

