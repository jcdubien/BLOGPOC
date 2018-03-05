
<?php


//Access to database

require 'model/model.php';


$articles=getPosts();

// Data display
require 'view/view.php';