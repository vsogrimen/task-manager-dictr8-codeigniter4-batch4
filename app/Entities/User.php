<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * $user->password = 'secret' keeps only a hash of the password.
     */
    public function setPassword(string $password): static
    {
        $this->attributes['password_hash'] =
            password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->attributes['password_hash']);
    }
}
