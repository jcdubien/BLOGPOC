
<?php $title = 'Mettre en ligne un post'; ?>


<?php ob_start(); ?>

<section class="col-lg-12">

    <form class="formulaire" action="\BLOG\index.php?action=postnew" method="post">

    <legend>Postez votre message</legend>

    <fieldset>

    <div class="row">

        <div class="form-group">

            <label for="text" class="col-lg-12 control-label">Titre</label>

            <div class="col-lg-12">

                <input type="text" class="form-control" id="text" name="title" >

            </div>

        </div>

    </div>

    <div class="row">

            <div class="form-group">

                <label for="textarea" class="col-lg-12 control-label">Message</label>

                <div class="col-lg-12">

                    <textarea class="form-control" id="textarea" name="post"></textarea> <br/>
                </div>

            </div>

    </div>

    <button class="btn btn-primary" type="submit">Envoyer</button>

    </fieldset>

    </form>

</section>
       
<?php
        
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>