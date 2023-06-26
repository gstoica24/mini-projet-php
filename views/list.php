<?php

echo "<ul>";
foreach ($movies as $movie) {
    echo "<li>";
    echo $movie["titre"] . " " . $movie["annee"] . " genre : " . $movie["genre"];
    echo "</li>";
}
echo "</ul>";


// $horrorMovies = $model->getMovieByGenre($genre);
// echo "je trouve un filme " . $genre;