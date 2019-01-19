<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

//Content


echo '<div class="content">';
echo '<h2>Senaste inlägget</h2>';
echo '<p class="author">Författare: '.$post["author"].'</p>';
echo '<p class="date">Datum: '.$post["date"].'</p>';
echo '<p class="message">'.$post["text"].'</p>';
echo '</div>';

//Inlcude Footer
require ('resources/views/footer.php');
?>
