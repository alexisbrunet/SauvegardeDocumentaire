<?php
session_start();

unset($_SESSION['utilisateur']);

session_unset();

session_destroy();

header ('Location: index.php');