<?php

// bienvenue.php
session_start();
if(!empty($_SESSION['pseudo'])) {
    echo 'Bienvenue dans l\'administration du blog';
}
else {
    header('Location: login.php');
}