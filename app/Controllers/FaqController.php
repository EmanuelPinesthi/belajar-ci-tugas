<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FaqController extends BaseController
{
    function __construct()
    {
        helper(['form', 'number']); // Explicit load helpers
    }

    public function index()
    {
        return view('v_faq');
    }
}
