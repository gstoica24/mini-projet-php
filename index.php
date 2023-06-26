<?php
require_once("Controlleur.php");




$uri = strtok($_SERVER['REQUEST_URI'], '?');
if ($uri == "/") {
    $ctrl = new Controlleur;
    $ctrl->index();
} elseif ($uri == "/genre") {
    $ctrl = new Controlleur;
    $ctrl->genre();
} else {
    echo "Film pas trouve";
}