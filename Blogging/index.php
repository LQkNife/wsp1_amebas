<?php
/*
This is my solution for the laboration that Niklas Mårdby share on his wiki Porkforge.
I've used this laboration to show my pupils how you can work with PHP in developement.
http://porkforge.mardby.se/index.php?title=PHP_Laboration_2_-_Projektstart,_require_och_GET
*/

// We tell the page to require a file called functions
require ('resources/includes/view.php');
require ('resources/includes/model.php');

// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

if(empty($page)) {
	$header = 'Start';
    $content = 'Välkommen till Labb 2! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är andra labben men första labben i en serie labbar som tillsammans bygger vidare på detta projekt som vi påbörjar här. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.';
		include ('resources/templates/page-template.php');
}
elseif($page == "blogg") {
	$header = 'Blogg';
	$template = "all-blog-posts";
	$post_slug = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_URL);
	$found_any = false;
	if ($post_slug) {
		foreach ($model as $post_data) {
			if ($post_data["slug"] == $post_slug) {
				$found_any = true;
				$post = $post_data;
				$template = "single-blog-post";
			}
		}
		if (!$found_any) {
			$template = "page";
			$content = "Den sökta sidan finns inte.";
		}
	}
	include ('resources/templates/'.$template.'-template.php');
}
elseif($page == "kontakt") {
	$header = 'Kontakt';
    $content = '<div class="content">Du når oss på epost@labb2.se</div>';
    include ('resources/templates/page-template.php');
}
else {
	echo "Den sökta sidan finns inte";
}
/* 1. Det fungerade inte på grund av att jag döpte om functions filen till views.php.
För att fixa problemet ändrade jag include functionen

2.

array_push sätter ett värde på slutet av en array
Exempel:

$a = array();
array_push($a, 123);

count säger hur många element som finns i en array
Exempel:

$a = array(1, 2, 3);
print(count($a));

3. Vi skulle se "12345678910", utan mellanslag

4. Alla element skivs ut

5. Nu skrivs ut alla element i mitten också

6. samma som på bilden

7. jag ersatte for loopen med en foreach loop

8. ja

9. som exemplet ovan

Övning 3:
Jag använde en for-loop, så jag ändrade bara ordningen:
for ($i = 0; $i < count($model); $i++) {
till
for ($i = count($model) - 1; $i >= 0; $i--) { */
?>
