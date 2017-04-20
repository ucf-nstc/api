<?php

$request = $_SERVER['REQUEST_METHOD'];

if ($request === 'POST') {
	echo 'POST news route';
}

if ($request === 'GET') {
	echo 'GET news route';
}