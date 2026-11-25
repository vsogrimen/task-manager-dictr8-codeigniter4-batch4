<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $returnType    = User::class;
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'email', 'password_hash', 'role'];

    public function findByEmail(string $email): ?User
    {
        return $this->where('email', $email)->first();
    }
}
