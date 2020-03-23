<?php

if(session_destroy()) // Destroying All Sessions
{
return header("Location: /Flipr/index.php"); // Redirecting To Home Page
}
?>