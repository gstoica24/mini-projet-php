<?php
require_once("Controlleur.php");



$uri = strtok($_SERVER['REQUEST_URI'], '?');
$ctrl = new Controlleur();
if ($uri == "/") {
    $ctrl->index();
} elseif ($uri == "/genre") {
    $ctrl->genre();
} elseif ($uri == "/search") {
    $ctrl->search();
} elseif ($uri == "/movie" && isset($_GET['id'])) {
    $ctrl->getMovie();
} else {
    echo "Film non trouvé";
}
