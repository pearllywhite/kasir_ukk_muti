<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function halamanAdmin()
    {
        $data = [
            'akses' => session()->get('level'),
            'pendapatan_harian' => $this->penjualan->getPendapatanHarian(),
            'total_stok' => $this->produk->getJumlahStok(),
            'stok' => $this->produk->getJumlahStokKosong(),
        ];
        return view('Admin/halaman-admin', $data);
    }
}
