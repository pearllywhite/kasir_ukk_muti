<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function Pengguna()
    {
        $data = [
            'akses' => session()->get('level'),
            'listPengguna' => $this->pengguna->findAll(),
        ];
        return view('pengguna/list-pengguna', $data);
    }
    public function tambahPengguna()
    {
        $data = [
            'akses' => session()->get('level'),
            'validation' => \Config\Services::validation()
        ];
        return view('pengguna/tambah-pengguna', $data);
    }
    public function simpanPengguna()
    {

        $validation = \Config\Services::validation();

        if ($this->request->getmethod() === 'post') {
           $rules = [
            
               'username' => [
                   'rules' => 'required|is_unique[tbl_user.username]',
                   'errors' => [
                       'required' => 'Username harus diisi.',
                       'is_unique' => 'Username sudah terdaftar.'
                   ]
               ],
               'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pengguna harus diisi.',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password harus lebih dari 2 angka atau huruf'
                ]
            ],
           ];
           if (!$this->validate($rules)) {
               session()->setFlashdata('errors', $validation->getErrors());
               return redirect()->to('/tambah-pengguna')->withInput()->with('errors', $validation->getErrors());
           }
       }

        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password' => md5($this->request->getVar('password')),
            'level' => $this->request->getVar('level'),
        ];
        $this->pengguna->save($data);
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan');
        return redirect()->to('/data-pengguna');
    }

    public function editPengguna($idUser)
    {
        $syarat = [
            'username' => $idUser
        ];

        $data = [
            'akses' => session()->get('level'),
            'detailUser' => $this->pengguna->where($syarat)->findAll()
        ];
        return view('Pengguna/edit-pengguna', $data);
    }

    public function simpanEditPengguna($idUser)
    {

        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'level' => $this->request->getVar('level')
        ];
        // var_dump($data);
        $this->pengguna->update($idUser, $data);
        session()->setFlashdata('edit', 'Data berhasil diupdate');
        return redirect()->to('/data-pengguna');
    }

    public function hapusPengguna($idUser)
    {
        $syarat = [
            'username' => $idUser
        ];
        $this->pengguna->where($syarat)->delete();
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('/data-pengguna');
    }
}
