<?php 

namespace App\Models;

use Exception;
use CodeIgniter\Model;

class ClientModel extends Model{
    protected $table = 'client';

    protected $allowedFields = [
        'nome',
        'email',
        'documento',
        'cep',
        'telefone',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'ativo'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $updatedField = 'updated_at';

    public function findClientById($id)
    {
        $client = $this
            ->asArray()
            ->where(['id' => $id])
            ->first();

        if (!$client) throw new Exception('Could not find client for specified ID');

        return $client;
    }
}