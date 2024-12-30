<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') != 'admin') {
            // Kullanıcı admin değilse veya giriş yapmamışsa login sayfasına yönlendir
            return redirect()->to('/login')->with('error', 'Bu sayfaya erişmek için yetkiniz yok.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Gerekirse işlem sonrası yapılacaklar
    }
}
