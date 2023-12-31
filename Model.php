<?php

class Model
{
    private string $host = "localhost";
    private string $dbname = "mini-projet-php";
    private string $username = "root";
    private string $password = "";
    private PDO $db;


    public function __construct()
    {
        // echo "Construct: connect to db $this->dbname\n";
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    }

    public function getAllMovies()
    {
        // Une requête pour afficher tous les films
        $sql = "SELECT * FROM movies WHERE  1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    }

    public function getOneMovie($id)
    {
        // Une requête pour afficher une films
        $sql = "SELECT * FROM movies WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $movie = $stmt->fetch(PDO::FETCH_ASSOC);
        return $movie;
    }

    public function getMovieByGenre(string $genre)
    {
        //Une requête pour afficher tous les films d'un certain genre
        $sql = "SELECT * FROM movies WHERE  genre = :genre";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":genre", $genre);
        $stmt->execute();
        $movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    }

    public function getMovieByAuthor(int $authorId)
    {
        //Une requête pour afficher tous les films de la réalisatrice
        $sqlM1 = "SELECT * FROM movies WHERE  realisatrice_id = :authorId";
        $stmt = $this->db->prepare($sqlM1);
        $stmt->bindParam("authorId", $authorId);
        $stmt->execute();
        $movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    }
    public function searchMoviesByName(string $name)
    {
        // Requête pour rechercher les films par nom 
        $sql = "SELECT * FROM movies WHERE titre LIKE :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", "%" . $name . "%");
        $stmt->execute();
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    }
}
