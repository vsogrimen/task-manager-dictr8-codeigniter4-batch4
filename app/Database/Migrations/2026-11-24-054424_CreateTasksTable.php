<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTasksTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'          => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 150],
            'description' => ['type' => 'TEXT', 'null' => true],
            'status'      => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'pending'
            ],
            'due_date'    => ['type' => 'DATE', 'null' => true],

            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('status');
        $this->forge->createTable('tasks');
    }

    public function down(): void
    {
        $this->forge->dropTable('tasks');
    }
}
