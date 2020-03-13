<?php
namespace App\Contracts;

interface FilmContract {

    public function listFilms(string $order = 'id',string $sort = 'asc',array $columns = ['*']);

    public function findFilmById(int $id);

    public function createFilm(array $params);

    public function updateFilm(array $params);

    public function deleteFilm(int $id);
}