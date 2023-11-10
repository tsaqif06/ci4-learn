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
        echo view('layout/header', $data);
        echo view('pages/home');
        echo view('layout/footer');
    }
    public function about()
    {
        $data = [
            'title' => "About | CI4LEARN"
        ];
        echo view('layout/header', $data);
        echo view('pages/about');
        echo view('layout/footer');
    }
}
