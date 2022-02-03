<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;
    public array $movies = [];
    public array $moviesPG = [];

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getPG(Movie $movie)
    {
        $this->movies[] = $movie;
        if ($movie->rating == "PG") {
            $this->moviesPG[] = $movie;
        }
    }
}

$movie1 = new Movie("Casino Royale", "Eon Productions",  "PG13");
$movie2 = new Movie("Glass", "Buena Vista International",  "PG13");
$movie3 = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures",  "PG");

$movies->getPG($movie1);
$movies->getPG($movie2);
$movies->getPG($movie3);

//todo saprast kā definēt $movies[];
