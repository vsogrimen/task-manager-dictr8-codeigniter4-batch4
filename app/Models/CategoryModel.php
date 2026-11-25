<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table         = 'categories';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['name'];

    /**
     * [id => name] for a dropdown, in alphabetical order.
     */
    public function options(): array
    {
        return array_column($this->orderBy('name')->findAll(), 'name', 'id');
    }
}
