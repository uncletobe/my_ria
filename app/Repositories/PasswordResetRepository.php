<?php

namespace App\Repositories;

use App\Models\Auth\PasswordResetModel as Model;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class PasswordResetRepository extends CoreRepository {
    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getRecordByEmail($email) {

        $result = $this->startConditions()
                ->select('id', 'email')
                ->where('email', $email)
                ->get();

        return $result;
    }

    public function getRecordByToken($token) {

        $result = $this->startConditions()
            ->select('id', 'user_id', 'email', 'updated_at')
            ->where('token', $token)
            ->get();

        return $result;
    }

}


















