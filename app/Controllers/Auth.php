<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);
        echo view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username' => $data['username'],
                    'email'    => $data['email'],
                    'role'     => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                if ($data['role'] == 'admin') {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/dashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Yanlış şifre.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Bu e-posta ile kayıtlı kullanıcı bulunamadı.');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        helper(['form']);
        echo view('auth/register');
    }

    public function registerProcess()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[255]',
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();

            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'role'     => 'user' // Varsayılan olarak kullanıcı rolü
            ];

            $model->save($data);
            $session = session();
            $session->setFlashdata('msg', 'Kayıt başarılı. Giriş yapabilirsiniz.');
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
