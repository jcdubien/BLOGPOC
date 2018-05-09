
<?php $title = 'Créer un compte '; ?>

<?php ob_start(); ?>

<section class="col-lg-12">

    <form class="formulaire" action="\BLOG\index.php?action=addmember" method="post">

    <legend>Vous identifier</legend>

    <?php
    
        if (isset($error)) {
       
             ?><p style="color:red"><?= $error ?></p> <?php

        }
    ?>

    <fieldset>

    <div class="row">

        <div class="form-group">

            <label for="text" class="col-lg-12 control-label">Pseudo</label>

            <div class="col-lg-12">

                <input type="text" class="form-control" id="text" name="pseudo" >

            </div>

        </div>

    </div>

    <div class="row">

            <div class="form-group">

                <label for="text" class="col-lg-12 control-label">Mot de passe</label>

                <div class="col-lg-12">

                    <input type="password" class="form-control" id="text" name="password" > <br/>
                </div>

            </div>

    </div>

     <div class="row">

    <div class="form-group">

        <label for="text" class="col-lg-12 control-label">Vérifiez votre mot de passe</label>

        <div class="col-lg-12">

            <input type="password" class="form-control" id="text" name="passwordcheck" > <br/>
        </div>

    </div>

    </div>

     <div class="row">

    <div class="form-group">

        <label for="text" class="col-lg-12 control-label">Votre mail</label>

        <div class="col-lg-12">

            <input type="text" class="form-control" id="text" name="mail" > <br/>
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