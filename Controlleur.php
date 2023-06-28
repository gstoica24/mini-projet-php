<?php

require_once("Model.php");
require_once './vendor/autoload.php';

class Controlleur
{
    private $model;
    private $twig;

    public function __construct()
    {
        $this->model = new Model;
        $loader = new \Twig\Loader\FilesystemLoader('views/');
        $this->twig = new \Twig\Environment($loader);
    }

    public function index()
    {
        $movies = $this->model->getAllMovies();
        echo $this->twig->render('list.html.twig', ['movies' => $movies]);
    }

    public function genre()
    {
        if (isset($_POST['submit'])) {
            $genre = $_POST['value'];
            if ($genre == "") {
                $movies = $this->model->getAllMovies();
            } else {
                $movies = $this->model->getMovieByGenre($genre);
            }
            echo $this->twig->render('list.html.twig', ['movies' => $movies]);
        }
    }
    public function search()
    {
        if (isset($_POST['submit'])) {
            $searchTerm = $_POST['search'];
            if (empty($searchTerm)) {
                $movies = $this->model->getAllMovies();
            } else {
                $movies = $this->model->searchMoviesByName($searchTerm);
                echo "Résultats de recherche pour : " . $searchTerm;
            }
            echo $this->twig->render('list.html.twig', ['movies' => $movies]);
        }
    }
}
