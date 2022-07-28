<?php

namespace App\Models;

use Exception;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'nome',
        'email',
        'senha',
        'ativo',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
        if (isset($data['data']['senha'])) {
            $plaintextPassword = $data['data']['senha'];
            $data['data']['senha'] = $this->hashPassword($plaintextPassword);
        }
        return $data;
    }
    private function hashPassword(string $plaintextPassword): string
    {
        return password_hash($plaintextPassword, PASSWORD_BCRYPT);
    }

    public function findUserByEmailAddress(string $emailAddress)
    {
        $user = $this
            ->asArray()
            ->where(['email' => $emailAddress])
            ->first();

        if (!$user)
            throw new Exception('User does not exist for specified email address');

        return $user;
    }
}
