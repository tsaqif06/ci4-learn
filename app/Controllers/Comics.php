<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comics extends BaseController
{
    protected $comicModel;
    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        $data = [
            'title' => "Comics List | CI4LEARN",
            'comics' => $this->comicModel->getComic(),
        ];

        return view('comics/index', $data);
    }

    public function detail($slug)
    {
        $comic = $this->comicModel->getComic($slug);
        $data = [
            'title' => "{$comic['title']} | CI4LEARN",
            'comic' => $comic,
        ];

        return view('comics/detail', $data);
    }
}
