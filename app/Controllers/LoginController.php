<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use MongoDB\Client;

class LoginController extends BaseController
{
    protected $client;
    protected $collection;
    protected $database;

    public function __construct()
    {
        // MongoDB bağlantısını kur
        try {
            $uri = getenv('MONGODB_URI');
            if (!$uri) {
                throw new \Exception('MongoDB URI not set in environment variables.');
            }
            $this->client = new Client($uri);
            $this->database = $this->client->selectDatabase('Site');
            $this->collection = $this->database->selectCollection('Kullanicilar');
        } catch (\Exception $e) {
            log_message('error', 'MongoDB bağlantı hatası: ' . $e->getMessage());
            // Uygulamanın çalışmaya devam etmesi için gerekli aksiyonları alın
            // Örneğin, hata sayfasına yönlendirme yapabilirsiniz
        }
    }

    public function login()
    {
        helper(['form', 'url']);
        return view('login');
    }

    public function register()
    {
        helper(['form', 'url']);
        return view('register');
    }

    public function handleRegister()
    {
        // Eğer bağlantı kurulmadıysa hata ver
        if (!$this->collection) {
            return redirect()->back()->with('error', 'Veritabanı bağlantısı kurulamadı.');
        }

        $name = htmlspecialchars($this->request->getPost('name'));
        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $password = $this->request->getPost('password');

        // Doğrulama
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        try {
            $existingUser = $this->collection->findOne(['email' => $email]);
            if ($existingUser) {
                return redirect()->back()->with('error', 'Bu e-posta zaten kayıtlı.');
            }

            $this->collection->insertOne([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => 'user' // Varsayılan olarak 'user' rolü
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Kullanıcı eklenemedi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Kullanıcı eklenemedi: ' . $e->getMessage());
        }

        // Kayıt başarılı olduğunda yönlendirme
        return redirect()->to(site_url('login'))->with('message', 'Kayıt başarılı! Giriş yapabilirsiniz.');
    }

    public function handleLogin()
    {
        // Eğer bağlantı kurulmadıysa hata ver
        if (!$this->collection) {
            return redirect()->back()->with('error', 'Veritabanı bağlantısı kurulamadı.');
        }

        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $password = $this->request->getPost('password');

        try {
            $user = $this->collection->findOne(['email' => $email]);
            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'email' => $email,
                    'name' => $user['name'],
                    'logged_in' => true,
                    'role' => $user['role'] ?? 'user' // Eğer rol yoksa varsayılan olarak 'user' atanır
                ]);
                return redirect()->to(site_url('home'))->with('message', 'Başarıyla giriş yaptınız!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Yanlış Email veya Şifre.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Giriş işlemi sırasında bir hata oluştu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Giriş işlemi sırasında bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'))->with('message', 'Başarıyla çıkış yaptınız.');
    }
}
