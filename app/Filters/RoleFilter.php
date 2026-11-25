<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * In a route: ['filter' => 'role:admin'], or 'role:admin,editor'.
 */
class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! in_array(session('user_role'), $arguments ?? [], true)) {
            return redirect()->route('tasks.index')
                ->with('error', 'You do not have access to that page.');
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null,
    ) {}
}
