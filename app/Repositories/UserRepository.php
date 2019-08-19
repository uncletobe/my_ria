<?php

namespace App\Repositories;

use App\Models\User as Model;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class UserRepository extends CoreRepository {

    private $commonColumns = [
                'id',
                'email',
                'name',
                'avatar'
            ];


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getUserById($id) {

        $result = $this->startConditions()
            ->select($this->commonColumns)
            ->where('id', $id)
            ->get();

        return $result;
    }

}


















