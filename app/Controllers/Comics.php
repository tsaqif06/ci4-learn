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

        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Comic with title $slug not found");
        }

        return view('comics/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Add | CI4LEARN",
            'validation' => \Config\Services::validation(),
        ];

        return view('comics/create', $data);
    }

    public function store()
    {
        $rules = [
            // 'title' => 'required|is_unique[comics.title]',

            //custom
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => '{field} comic is required',
                    'is_unique' => '{field} comic is registered',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }


        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'New comic stored succesfully');

        return redirect()->to('/comics');
    }

    public function edit($slug)
    {
        $data = [
            'title' => "Edit | CI4LEARN",
            'validation' => \Config\Services::validation(),
            'comic' => $this->comicModel->getComic($slug),
        ];

        return view('comics/edit', $data);
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);
        return redirect()->to('/comics');
    }

    public function update($id)
    {
        $oldComic = $this->comicModel->getComic($this->request->getVar('slug'));
        if ($oldComic['title'] == $this->request->getVar('title')) {
            $titleRule = 'required';
        } else {
            $titleRule = 'required|is_unique[comics.title]';
        }
        $rules = [
            'title' => [
                'rules' => $titleRule,
                'errors' => [
                    'required' => '{field} comic is required',
                    'is_unique' => '{field} comic is registered',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->comicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'New comic stored succesfully');

        return redirect()->to('/comics');
    }
}
