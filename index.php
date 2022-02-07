<?php
define('GOOGLE_CLIENT_ID', '677113828792-taljkutnpla5mfdd64cg8vt1uhktmb2c.apps.googleusercontent.com'); 
define('GOOGLE_CLIENT_SECRET', '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'); 
define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/calendar'); 
define('REDIRECT_URI', 'http://localhost/calendar/google_calendar_event_sync.php'); 
 
// Start session 
if(!session_id()) session_start(); 
 
// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . GOOGLE_OAUTH_SCOPE . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online'; 

header("Location: $googleOauthURL"); 
            exit(); 