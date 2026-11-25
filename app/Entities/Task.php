<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Task extends Entity
{
    public const STATUSES = [
        'pending'     => 'Pending',
        'in_progress' => 'In progress',
        'completed'   => 'Completed',
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',

    ];

    public function statusLabel(): string
    {
        return self::STATUSES[$this->attributes['status']] ?? 'Unknown';
    }

    public function isOverdue(): bool
    {
        $due = $this->attributes['due_date'] ?? null;

        return $due !== null
            && $this->attributes['status'] !== 'completed'
            && $due < date('Y-m-d');
    }
}
