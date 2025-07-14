<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UmkmModel;

class Umkm extends BaseController
{
    protected $umkmModel;

    public function __construct()
    {
        $this->umkmModel = new UmkmModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $query = $this->umkmModel;
        if ($keyword) {
            $query = $query->like('nama', $keyword)
                           ->orLike('jenis_usaha', $keyword);
        }
        $data['umkms'] = $query->paginate(10);
        $data['pager'] = $this->umkmModel->pager;
        $data['keyword'] = $keyword;
        return view('umkm/index', $data);
    }

    public function create()
    {
        return view('umkm/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_usaha' => 'required',
            'produk' => 'required',
            'foto' => 'permit_empty|uploaded[foto]|is_image[foto]|max_size[foto,2048]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $fotoName = null;
        if ($file = $this->request->getFile('foto')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $fotoName = $file->getRandomName();
                $file->move('uploads/umkm', $fotoName);
            }
        }

        $this->umkmModel->insert([
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir_pemilik' => $this->request->getPost('tanggal_lahir_pemilik'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'produk' => $this->request->getPost('produk'),
            'foto' => $fotoName
        ]);

        return redirect()->to('/umkm')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $data['umkm'] = $this->umkmModel->find($id);
        return view('umkm/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_usaha' => 'required',
            'produk' => 'required',
            'foto' => 'permit_empty|uploaded[foto]|is_image[foto]|max_size[foto,2048]'
        ];
        $validation = \Config\Services::validation();
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $umkm = $this->umkmModel->find($id);
        $fotoName = $umkm->foto;
        if ($file = $this->request->getFile('foto')) {
            if ($file->isValid() && !$file->hasMoved()) {
                if ($umkm->foto && is_file('uploads/umkm/'.$umkm->foto)) {
                    unlink('uploads/umkm/'.$umkm->foto);
                }
                $fotoName = $file->getRandomName();
                $file->move('uploads/umkm', $fotoName);
            }
        }

        $this->umkmModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir_pemilik' => $this->request->getPost('tanggal_lahir_pemilik'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'produk' => $this->request->getPost('produk'),
            'foto' => $fotoName
        ]);

        return redirect()->to('/umkm')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $umkm = $this->umkmModel->find($id);
        if ($umkm->foto && is_file('uploads/umkm/'.$umkm->foto)) {
            unlink('uploads/umkm/'.$umkm->foto);
        }
        $this->umkmModel->delete($id);
        return redirect()->to('/umkm')->with('success', 'Data berhasil dihapus');
    }
}
