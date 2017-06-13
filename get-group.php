<?php

// Simple API for accessing news posts and returning as a json string

require_once('../include/phpScripts/database.inc.php');

/* construct the SQL statement */
$sql = "SELECT `group_members`.`id`, `firstName`, `lastName`, `affiliations`, `education`, `email`, `research`, `image`, `title`, `groups` FROM `group_members`";

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
		'firstName' => $row['firstName'],
		'lastName' => $row['lastName'],
		'affiliations' => $row['affiliations'],
		'education' => $row['education'],
		'email' => $row['email'],
		'research' => $row['research'],
		'image' => $row['image'],
		'title' => $row['title'],
		'groups' => $row['groups']
	);
	array_push($output, $post);
}

$json = json_encode($output);
echo($json);