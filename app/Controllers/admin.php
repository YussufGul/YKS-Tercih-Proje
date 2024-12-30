<?php

namespace App\Controllers;

use App\Models\TeacherModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $teacherModel;
    protected $session;

    public function __construct()
    {
        $this->teacherModel = new TeacherModel();
        $this->session = session();
    }

    public function index()
    {
        $data['teachers'] = $this->teacherModel->findAll();
        echo view('admin/dashboard', $data);
    }

    public function create()
    {
        echo view('admin/create');
    }

    public function store()
    {
        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->teacherModel->save($data)) {
            $this->session->setFlashdata('success', 'Öğretmen başarıyla eklendi.');
            return redirect()->to('/admin');
        } else {
            $this->session->setFlashdata('error', 'Öğretmen eklenirken bir hata oluştu.');
            return redirect()->to('/admin/create');
        }
    }

    public function edit($id = null)
    {
        $data['teacher'] = $this->teacherModel->find($id);
        if (!$data['teacher']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Öğretmen bulunamadı.');
        }
        echo view('admin/edit', $data);
    }

    public function update($id = null)
    {
        $data = [
            'id'    => $id,
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->teacherModel->save($data)) {
            $this->session->setFlashdata('success', 'Öğretmen başarıyla güncellendi.');
            return redirect()->to('/admin');
        } else {
            $this->session->setFlashdata('error', 'Öğretmen güncellenirken bir hata oluştu.');
            return redirect()->to("/admin/edit/$id");
        }
    }

    public function delete($id = null)
    {
        if ($this->teacherModel->delete($id)) {
            $this->session->setFlashdata('success', 'Öğretmen başarıyla silindi.');
        } else {
            $this->session->setFlashdata('error', 'Öğretmen silinirken bir hata oluştu.');
        }
        return redirect()->to('/admin');
    }
}
