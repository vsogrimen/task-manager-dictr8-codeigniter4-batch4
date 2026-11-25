<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $faker    = Factory::create();
        $statuses = ['pending', 'in_progress', 'completed'];
        $rows     = [];
        $userIds  = array_column(
            $this->db->table('users')->select('id')->get()->getResultArray(),
            'id',
        );

        $categoryIds = array_column(
            $this->db->table('categories')->select('id')->get()->getResultArray(),
            'id',
        );

        for ($i = 0; $i < 30; $i++) {
            $created = $faker->dateTimeBetween('-30 days', 'now');
            $due     = $faker->optional(0.7)
                ->dateTimeBetween('-10 days', '+20 days');

            $rows[] = [
                'user_id'     => $faker->randomElement($userIds),
                'category_id' => $faker->optional(0.8)->randomElement($categoryIds),
                'title'       => ucfirst($faker->words(4, true)),
                'description' => $faker->paragraph(),
                'status'      => $faker->randomElement($statuses),
                'due_date'    => $due?->format('Y-m-d'),
                'created_at'  => $created->format('Y-m-d H:i:s'),
                'updated_at'  => $created->format('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('tasks')->insertBatch($rows);
    }
}
