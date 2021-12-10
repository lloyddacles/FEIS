<?php
require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('414187118496-tg7g0kpq9mc90qgctrt2b76a0vph00cm.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('xqNUzWYlO2aKP7lHroDFxTYA');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/Feis/login.php');

//////////////Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


include 'google_insert.php';
