<?php

// Simple API for accessing news posts and returning as a json string

require_once('../include/phpScripts/database.inc.php');

/* construct the SQL statement */
$sql = "SELECT `news`.`id`, DATE_FORMAT(`datestamp`,\"%M %Y\") as dateinfo, `moreinfo`,`title`, `photo_path`,`photo_path2`,`description`,`department`, `postdate`, `groups` FROM `news`";

$sql .= " ORDER BY datestamp desc";

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
		'groups' => $row['groups'],
		'postdate' => $row['postdate'],
		'title' => strip_tags($row['title']),
		'department' => $row['department'],
		'content' => strip_tags($row['description'])
	);
	array_push($output, $post);
}

$json = json_encode($output);
echo($json);