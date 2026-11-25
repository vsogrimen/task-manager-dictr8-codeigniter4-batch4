<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryIdToTasks extends Migration
{
    public function up(): void
    {
        $this->forge->addColumn('tasks', [
            'category_id' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,
                'after'    => 'user_id',
            ],
        ]);
        // RESTRICT: a category that tasks still use cannot be deleted.
        $this->forge->addForeignKey(
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'RESTRICT'
        );
        $this->forge->processIndexes('tasks');
    }

    public function down(): void
    {
        $this->forge->dropForeignKey('tasks', 'tasks_category_id_foreign');
        $this->forge->dropColumn('tasks', 'category_id');
    }
}
