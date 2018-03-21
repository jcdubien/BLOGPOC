<?php $title = 'Choix backend'; ?>


<?php ob_start(); ?>

 <form action="\BLOG\index.php" method="post">

    <div class="row">
                
                <div class="col-lg-12">  
                  
                     <p>Que souhaitez vous faire ?<br /></p>
                     <br />
       <input type="radio" name="choix" value="post" id="post" /> <label for="post">Poster un billet</label><br />
       
       <input type="radio" name="choix" value="moderate" id="moderate" /> <label for="moderate">Modérer les commentaires signalés</label><br />
       
       <input type="submit" value="Envoyer" />
   



                </div>
        </div>

 </form>

<?php
        
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('D:\wamp\www\BLOG\view\frontend\template.php') ?>

