<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $users = db_connect()->table('users u')
            ->select('u.id, u.name, u.email, u.role')
            ->selectCount('t.id', 'total')
            ->select(
                "SUM(CASE WHEN t.status = 'completed' THEN 1 ELSE 0 END) AS done",
                false,
            )
            ->join('tasks t', 't.user_id = u.id', 'left')
            ->groupBy('u.id')
            ->orderBy('total', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/dashboard', ['title' => 'Admin', 'users' => $users]);
    }
}
