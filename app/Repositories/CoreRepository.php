<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Клон модели, чтобы ничего не записать/ не затереть
 */
abstract class CoreRepository {

    /**
     * @var
     */
    protected $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model | Illuminate\Foundation\Application\mixed
     */
    protected function startConditions() { //Создаем клон, чтоб не перезаписывать модель и не хванить состояние, на всякий случай

        return clone $this->model;
    }






}



















