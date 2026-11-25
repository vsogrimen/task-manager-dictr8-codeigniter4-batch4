<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function registerView(): string
    {
        return view('auth/register', ['title' => 'Create an account']);
    }

    public function registerAction(): RedirectResponse
    {
        $rules = [
            'name'             => 'required|max_length[100]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[8]',
            'password_confirm' => [
                'label' => 'Repeat password',
                'rules' => 'required|matches[password]',
            ],
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput();
        }

        model(UserModel::class)->insert(new User([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
        ]));

        return redirect()->route('login')
            ->with('message', 'Account created. You can now log in.');
    }

    public function loginView(): string
    {
        return view('auth/login', ['title' => 'Log in']);
    }

    public function loginAction(): RedirectResponse
    {
        $key = 'login-' . md5($this->request->getIPAddress());

        if (! service('throttler')->check($key, 5, MINUTE)) {
            return redirect()->back()
                ->with('error', 'Too many attempts. Try again in a minute.');
        }

        $email    = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');
        $user     = model(UserModel::class)->findByEmail($email);

        if ($user === null || ! $user->verifyPassword($password)) {
            return redirect()->back()->with('error', 'Wrong email or password.');
        }

        session()->regenerate(true);
        session()->set([
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
        ]);

        return redirect()->route('tasks.index')
            ->with('message', 'Welcome, ' . $user->name . '.');
    }

    public function logoutAction(): RedirectResponse
    {
        // user_role arrives in Module 6; removing it now does no harm.
        session()->remove(['user_id', 'user_name', 'user_role']);
        session()->regenerate(true);

        return redirect()->route('login')->with('message', 'You have logged out.');
    }
}
