
<?php $title = $post['title']; ?>

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



   

    <div class="commentlist">

        <?php

        while ($comment = $comments->fetch()) { ?>

            <div class="postcommenttitle">
                <h3><?= htmlspecialchars($comment['author']) ?></h3> 
                le <?= $comment['comment_date_fr'] ?></h3>
            

            <p><?= nl2br($comment['comment']) ?><a class="btn btn-danger" href="index.php?action=report&amp;postID=<?= $comment['post_id'];?>&amp;id=<?= $comment['id']?>">Signaler</a></p>
            </div>
        <?php }?>

    </div>

<?php if ((isset($_SESSION['pseudo']) )) { ?>

    <form  action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

        <fieldset>

            <div class="form-group">

                <div class="row">
                    
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">  
                            <label for="author">Auteur</label><br />
                            <?php if (isset($_SESSION['pseudo'])) {$pseudo=$_SESSION['pseudo'];} else {$pseudo=' ';}?> 
                            <input class="form-control" type="text" id="author" name="author" value="<?=$pseudo?>" >
                        </div>
                </div>


                <div class="row tinymce">

                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

                            <label for="comment">Commentaire</label><br />
                            <textarea class="form-control tinymce" id="comment" name="comment" placeholder="Votre commentaire" ></textarea>
                            <br/>
                        </div>
                <div>

            </div>
        
        
            <div class="row" style="marginTop:30px">    
            
                <button class="btn btn-primary" type="submit">Envoyer</button>
                <a href="index.php" class="btn btn-danger">Retour</a>


            <div>
        
                

        </fieldset>

</form>

<?php } ?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

