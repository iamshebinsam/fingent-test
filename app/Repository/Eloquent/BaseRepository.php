<?php

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

   
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
 
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(Model $model, array $attributes): bool
    {
        foreach ($attributes as $attribute=>$value) {
            $model->{$attribute} = $value;
        }

        return $model->save();
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function paginate(int $count = 10): LengthAwarePaginator
    {
        return $this
            ->model
            ->paginate($count)
        ;
    }
}
