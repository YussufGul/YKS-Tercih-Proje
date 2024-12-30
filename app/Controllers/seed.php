<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Seed extends Controller
{
    public function index()
    {
        $userModel = new UserModel();

        // Admin kullanıcı ekleme
        if (!$userModel->where('email', 'admin@example.com')->first()) {
            $userModel->save([
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'role'     => 'admin'
            ]);
            echo "Admin kullanıcı eklendi.<br>";
        } else {
            echo "Admin kullanıcı zaten mevcut.<br>";
        }

        // Örnek kullanıcı ekleme
        if (!$userModel->where('email', 'user1@example.com')->first()) {
            $userModel->save([
                'username' => 'user1',
                'email'    => 'user1@example.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role'     => 'user'
            ]);
            echo "Örnek kullanıcı eklendi.<br>";
        } else {
            echo "Örnek kullanıcı zaten mevcut.<br>";
        }
    }
}
