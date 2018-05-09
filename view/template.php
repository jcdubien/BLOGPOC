

<!doctype html>

<html>

    <head>

        <meta charset="utf-8" />
            <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="public/css/style.css">

        <script src="\BLOG\vendor\tinymce\tinymce\tinymce.min.js"></script>

        <script type="text/javascript">

        tinymce.init({

            selector: 'textarea'
        });

        </script>

        <title><?= $title ?></title>

    </head>

    <body>   
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>

                </div>

                <div id="navbar" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">

                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li><a href="view/frontend/bio.php">A propos de l'auteur</a></li>
                        <li><a href="tel:0690212201">Contact</a></li>
                        
                        <?php if (isset($_SESSION['pseudo'])) {

                            ?><li><a class=disconnect href="index.php?action=logout"><?=$_SESSION['pseudo']?>
                            <em> Deconnexion</em></a></li>
                            <?php

                        } else {
                                ?> <li><a href="index.php?action=login">S'identifier</a></li>
                                <li><a href="index.php?action=createaccount">S'enregistrer</a></li><?php
                        }?>

                    </ul>
                </div>
            </div>
        </nav>
    

        <?= $content ?>


        <footer class="footer">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">Conçu avec application et le soutien éclairé de <a href="https://openclassrooms.com/">OpenClassrooms</a></div>
                
                <br/>

                <?=$_SESSION['pseudo'] ?>
            
                <?php if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo']='admin') ) { ?>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12"><a href ="/BLOG/index.php?action=menubackend">Administration</a></div><?php
                }?>

            </div>

        </footer>

    </body>
    
</html>
