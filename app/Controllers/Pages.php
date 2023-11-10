<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Home | CI4LEARN",
            'tes' => ["satu", "dua", "tiga"]
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => "About | CI4LEARN"
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => "Contact Us | CI4LEARN",
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Kawi',
                    'daerah' => 'Kab. Malang',
                ],
                [
                    'tipe' => 'Pondok',
                    'alamat' => 'Jl. Kasin',
                    'daerah' => 'Kota Malang',
                ],
            ]
        ];
        return view('pages/contact', $data);
    }
}
