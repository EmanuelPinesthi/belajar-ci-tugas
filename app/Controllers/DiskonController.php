<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    function __construct()
    {
        helper('form');
        helper('number');
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        // Check if user is admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url())->with('error', 'Akses ditolak');
        }

        $diskons = $this->diskon->findAll();
        $data['diskons'] = $diskons;

        return view('v_diskon', $data);
    }

    public function create()
    {
        // Check if user is admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url())->with('error', 'Akses ditolak');
        }

        $rules = [
            'tanggal' => 'required|valid_date',
            'nominal' => 'required|numeric|greater_than[0]'
        ];

        if ($this->validate($rules)) {
            $tanggal = $this->request->getPost('tanggal');
            $nominal = $this->request->getPost('nominal');

            // Check if tanggal already exists
            if ($this->diskon->isTanggalExists($tanggal)) {
                return redirect()->back()->with('failed', 'Tanggal sudah memiliki diskon!');
            }

            $dataForm = [
                'tanggal' => $tanggal,
                'nominal' => $nominal,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $this->diskon->insert($dataForm);

            return redirect()->to('diskon')->with('success', 'Data Diskon Berhasil Ditambah');
        } else {
            return redirect()->back()->with('failed', implode('<br>', $this->validator->getErrors()));
        }
    }

    public function edit($id)
    {
        // Check if user is admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url())->with('error', 'Akses ditolak');
        }

        $rules = [
            'nominal' => 'required|numeric|greater_than[0]'
        ];

        if ($this->validate($rules)) {
            $nominal = $this->request->getPost('nominal');

            $dataForm = [
                'nominal' => $nominal,
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $this->diskon->update($id, $dataForm);

            return redirect()->to('diskon')->with('success', 'Data Diskon Berhasil Diubah');
        } else {
            return redirect()->back()->with('failed', implode('<br>', $this->validator->getErrors()));
        }
    }

    public function delete($id)
    {
        // Check if user is admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url())->with('error', 'Akses ditolak');
        }

        $this->diskon->delete($id);

        return redirect()->to('diskon')->with('success', 'Data Diskon Berhasil Dihapus');
    }
}