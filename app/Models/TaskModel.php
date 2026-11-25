<?php

namespace App\Models;

use App\Entities\Task;
use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'tasks';
    protected $primaryKey    = 'id';
    protected $returnType    = Task::class;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
    ];
}
