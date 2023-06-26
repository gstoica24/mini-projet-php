<?php

require_once("Model.php");


class Controlleur
{

    public function index()
    {
        $model = new Model();
        $movies = $model->getAllMovies();
        include("./views/list.php");
    }

    public function genre()
    {
        $model = new Model();
        $genre = $_GET['q'];
        $movies = $model->getMovieByGenre($genre);
        echo "je trouve un filme " . $genre;
        include("./views/list.php");
    }
}
