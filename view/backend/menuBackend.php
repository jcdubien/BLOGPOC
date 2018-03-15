<?php $title = 'Choix backend'; ?>


<?php ob_start(); ?>

 <form action="index.php?action=selectbackend&amp;id=<?= $post['id'] ?>" method="post">

    <div class="row">
                
                <div class="col-lg-12">  
                  
                     <p>Que souhaitez vous faire ?<br />
       <input type="radio" name="choix" value="post" id="post" /> <label for="post">Poster un billet</label><br />
       <input type="radio" name="choix" value="listposts" id="listposts" /> <label for="listposts">Lister les billets</label><br />
       <input type="radio" name="choix" value="moderate" id="moderate" /> <label for="moderate">Lister les commentaires à modérer</label><br />
       <input type="radio" name="choix" value="delete" id="delete" /> <label for="delete">Supprimer un billet</label>
       <input type="radio" name="choix" value="edit" id="edit" /> <label for="edit">Editer un billet</label>
   </p>



                </div>
        </div>

 </form>

<?php
        
        
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

