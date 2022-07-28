<?php

namespace App\Validation;

use Exception;
use App\Models\UserModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($data['email']);
            return password_verify($data['senha'], $user['senha']);
        } catch (Exception $e) {
            return false;
        }
    }
}
