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
                'avatar',
                'email_verified_at'
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


    public function getUserByToken($token) {

        $result = $this->startConditions()
            ->select('id', 'is_verified', 'email_verified_at')
            ->where('confirm_token', $token)
            ->get();

        return $result;
    }

}


















