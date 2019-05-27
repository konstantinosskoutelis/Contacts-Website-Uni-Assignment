<?php
session_start();

session_start();
unset($_SESSION["current_username"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: http://dalab.ee.duth.gr/~57385/");



?>