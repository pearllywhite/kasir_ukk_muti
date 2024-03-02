<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Msatuan;

class SatuanProduk extends BaseController
{
    protected $mSatuan;
    public function __construct()
    {
        $this->mSatuan = new Msatuan();
    }
    
    public function satuan()
    {

        $tbl_satuan =  $this->mSatuan->findAll();
        $data = [
            'akses' => session()->get('level'),
            'listSatuan' => $this->satuan_produk->findAll(),
            'tbl_satuan' => $tbl_satuan,
        ];
        return view('satuan/list-satuan', $data);
    }

    public function tambahSatuan()
    {
        $data = [
            'akses' => session()->get('level'),
            'validation' => \Config\Services::validation()
        ];
        return view('satuan/tambah-satuan', $data);
    }

    public function simpanSatuan()
    {

        //ini buat validasi agar saat disimpan wajib mengisi kolom dan
        //jika nama satuan sudah ada di database
        //atau tabel yang di index maka gabakal bisa ke simpan soalnya udah ada 
        $validation = \Config\Services::validation();

         if ($this->request->getmethod() === 'post') {
            $rules = [
                'nama_satuan' => [
                    'rules' => 'required|is_unique[tbl_satuan.nama_satuan]',
                    'errors' => [
                        'required' => 'Nama satuan harus diisi.',
                        'is_unique' => 'Satuan sudah terdaftar.'
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to('/tambah-satuan')->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'nama_satuan' =>$this->request->getVar('nama_satuan')
        ];
        $this->satuan_produk->save($data);
        return redirect()->to('/satuan-produk');
    }

    public function editSatuan($idSatuan)
    {
        // $tbl_satuan = $this->mSatuan->getSatuan($idSatuan);
        $syarat = [
            'id_satuan' => $idSatuan
        ];
        $data = [
            'akses' => session()->get('level'),
            'detailSatuan' => $this->satuan_produk->where($syarat)->findAll(),
            'validation' => \Config\Services::validation(),
            'satuan' => $this->mSatuan->getSatuan($idSatuan),

        ];
        return view('satuan/edit-satuan', $data);
    }

    public function simpanEditSatuan()
    {
        $validation = \Config\Services::validation();
        

        $namaSatuan = $this->request->getVar('nama_satuan');

        // $ruleNama = ['nama_satuan'] == $namaSatuan ? 'required' : "required|is_unique[tbl_satuan.nama_satuan,nama_satuan,['nama_satuan']},id_satuan,{$id_satuan}]";

        $data = [
            'akses' => session()->get('level'),
            'id_kategori' => $this->request->getVar('id_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];
        $this->satuan_produk->update($this->request->getVar('id_satuan'), $data);
        return redirect()->to('satuan-produk');
    }

    public function hapusSatuan($idSatuan)
    {
        $syarat = [
            
            'id_satuan' => $idSatuan
        ];
        $this->satuan_produk->where($syarat)->delete();
        return redirect()->to('/satuan-produk');
    }

}