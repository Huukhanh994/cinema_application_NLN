<?php
namespace App\Repositories;

use App\Contracts\FilmContract;
use App\Models\Film;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class FilmRepository extends BaseRepository implements FilmContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Film $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listFilms(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findFilmById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createFilm(array $params)
    {
        try {
            $collection = collect($params);

            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status'));

            $film = new Film($merge->all());

            $film->save();

            if ($collection->has('categories')) {
                $film->categories()->sync($params['categories']);
            }
            if($collection->has('rates')) {
                $film->rates()->sync($params['rates']);
            }
            return $film;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFilm(array $params)
    {
        $film = $this->findFilmById($params['film_id']);

        $collection = collect($params)->except('_token');

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status'));

        $film->update($merge->all());

        if ($collection->has('categories')) {
            $film->categories()->sync($params['categories']);
        }

        if($collection->has('rates'))
        {
            $film->rates()->sync($params['rates']);
        }
        return $film;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteFilm($id)
    {
        $film = $this->findFilmById($id);

        $film->delete();

        return $film;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findFilmBySlug($slug)
    {
        $film = Film::where('slug',$slug)->first();

        return $film;
    }
}