
<?php


//Access to database

require 'model/frontend.php';


$articles=getPosts();

// Data display
require 'view/frontend/listPostsView.php';