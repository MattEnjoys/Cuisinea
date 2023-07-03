<?php
// Appel de la page session.php
require('lib/session.php');
// Destruction de la session actuelle
session_destroy();
// Suppression de toutes les variables de session
unset($_SESSION);
// Redirection vers login.php
header('location: login.php');