<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToTasks extends Migration
{
    public function up(): void
    {
        $this->forge->addColumn('tasks', [
            'user_id' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,
                'after'    => 'id',
            ],
        ]);
        $this->forge->addForeignKey(
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->forge->processIndexes('tasks');
    }

    public function down(): void
    {
        $this->forge->dropForeignKey('tasks', 'tasks_user_id_foreign');
        $this->forge->dropColumn('tasks', 'user_id');
    }
}
