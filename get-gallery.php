<?php

// Simple API for accessing group gallery and image info and returning as a json string

require_once('../include/phpScripts/database.inc.php');

/* construct the SQL statement */
$sql = "SELECT `group_gallery`.`id`, `image_name`, `alt_tag`, `album_name`, `album_path`, `groups` FROM `group_gallery`";

/* execute SQL statement and store the result */
$result = mysql_query($sql);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}


$output = array();
while ($row = mysql_fetch_assoc($result)) {
	$post = array(
		'id' => $row['id'],
		'image_name' => $row['image_name'],
		'alt_tag' => $row['alt_tag'],
		'album_name' => $row['album_name'],
		'album_path' => $row['album_path'],
		'groups' => $row['groups']
	);
	array_push($output, $post);
}

$json = json_encode($output);
echo($json);