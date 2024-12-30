<?php

namespace App\Controllers;

use MongoDB\Client;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('name') ?? 'Ziyaretçi';
        return view('welcome_message', $data);
    }

    public function about()
    {
        return view('about2');
    }

    public function seoFriendlyTitle()
    {
        $title = "Bu bir örnek başlık!";
        $seoTitle = url_title($title, '-', TRUE); // SEO dostu hale getiriliyor.
        echo $seoTitle; // Çıktı: bu-bir-ornek-baslik
    }

    public function tips()
    {
        return view('tips');
    }

    public function pascalizeExample()
    {
        $string = "örnek metin";
        $pascalCase = pascalize($string); // ÖrnekMetin
        echo $pascalCase;
    }

    public function contact()
    {
        return view('contact');
    }

    public function limitedText()
    {
        $text = "Bu uzun bir metindir ve kesilecektir.";
        $limitedText = word_limiter($text, 4); // 4 kelimeyle sınırlandırılır.
        echo $limitedText; // Çıktı: Bu uzun bir metindir...
    }

    public function createAnchor()
    {
        echo anchor('home/contact', 'Bize Ulaşın', ['class' => 'btn btn-primary']);
        // Çıktı: <a href="http://localhost/code/public/home/contact" class="btn btn-primary">Bize Ulaşın</a>
    }

    public function getBaseURL()
    {
        $resourceURL = base_url('assets/css/style.css'); // Temel URL ile birlikte bir dosya yolu oluşturuluyor.
        echo $resourceURL; // Çıktı: http://localhost/code/public/assets/css/style.css
    }

    public function ogretmenler()
    {
        $session = session();
        $data['user'] = $session->get('name') ?? 'Ziyaretçi';
        return view('ogretmenler', $data);
    }
}