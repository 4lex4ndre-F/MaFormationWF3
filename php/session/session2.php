<?php
 
// une session est commune à tout le serveur!
session_start();

echo '<pre>'; print_r($_SESSION); echo '</pre>';