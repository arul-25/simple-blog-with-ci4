<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController
{
    public function post($slug)
    {
        $model = new BlogModel();
        $data['blog'] = $model->getPosts($slug);
        echo view('templates/header');
        echo view('blog/post', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        echo view('templates/header');
        echo view('blog/create', $data);
        echo view('templates/footer');
    }

    public function save()
    {
        helper('form');
        $model = new BlogModel();

        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]'
            ],
            'body' => [
                'rules' => 'required'
            ]
        ])) {
            return redirect()->to(base_url('create'))->withInput();
        } else {
            $post = $this->request->getVar();
            $model->save([
                'title' => $post['title'],
                'body' => $post['body'],
                'slug' => url_title($post['title'])
            ]);
            session()->setFlashdata('success', 'New post was created!');
            return redirect()->to(base_url())->withInput();
        }
    }
}
