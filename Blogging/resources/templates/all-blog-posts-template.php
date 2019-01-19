
<?php
// Include Meta
require ('resources/includes/head.php');

// Include Header
require ('resources/views/header.php');

navigation($header);

// Old way from Beginning
//echo $content;

// Content - New way for Blogging
echo '<div class="content">';
echo "<h2>Alla blogginlägg</h2>";

// foreach ($model as $value) {
// 	echo '<div class="post"><h3>'.$value.'</h3></div>';
// }

for ($i = count($model) - 1; $i >= 0; $i--) {
	$value = $model[$i];
	echo '<div class="post">';
	echo '<h3>'.$value["title"].'</h3>';
	echo '​​<p class="author">Författare: '.$value["author"].'</p>';
	echo '<p class="date">Datum: '.$value["date"].'</p>';
	echo '​​<p class="message">'.substr($value["text"], 0, 25).'...<a href="index.php?page=blogg&post='.$value["slug"].'">Läs mer</a></p>';
	echo '</div>';
}
echo '</div>';

// Inlcude Footer
require ('resources/views/footer.php');
?>
