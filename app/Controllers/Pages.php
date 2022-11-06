<?php

namespace App\Controllers;

use App\Models\BlogModel;


class Pages extends BaseController
{

    public function index()
    {
        $model = new BlogModel();
        $data['news'] = $model->getPosts();
        echo view('templates/header');
        echo view('pages/home', $data);
        echo view('templates/footer');
    }

    public function showme($pages = 'home')
    {
        if (!is_file(APPPATH . '/Views/pages/' . $pages . '.php')) {
            $message = "file $pages is not find";
            throw new \CodeIgniter\Exceptions\PageNotFoundException($message);
        }

        echo view('templates/header');
        echo view('pages/' . $pages);
        echo view('templates/footer');
    }
}
