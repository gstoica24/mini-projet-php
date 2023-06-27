<?php

require_once("Model.php");


class Controlleur
{
    private $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    public function index()
    {

        $movies = $this->model->getAllMovies();
        include("./views/base.html.twig");
    }

    public function genre()
    {

        $genre = $_GET['q'];
        $movies = $this->model->getMovieByGenre($genre);
        echo "je trouve un filme " . $genre;
        include("./views/base.html.twig");
    }
}
