<?php

	// Include some files
	//  to keep things nice and clean.
	include "includes/headers.php";
	include "includes/functions.php";


	// This is our API Home page - let's not return anything here.

	$response = new Response();

	$response->code = 401;
	$response->status = "error";
	$response->body = htmlspecialchars("No direct access. Please use an endpoint.");

	die (json_encode($response));