<?php

// detalhes database

include_once('config.php');

// Connect Database

mysql_connect('localhost', 'root', ''); 
mysql_select_db('blog');

include_once('func/blog.php');



?>