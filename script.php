<?php

require_once('./Model.php');

$model = new Model();

$allMovies = $model->getAllMovies();


foreach ($allMovies as $movie) {
    print_r($movie);
}

$genre = "Horror";
$horrorMovies = $model->getMovieByGenre($genre);
echo "je trouve un filme " . $genre;
print_r($horrorMovies);
