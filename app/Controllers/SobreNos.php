<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SobreNosModel;

class SobreNos extends BaseController
{
    public function __construct()
    {
        $this->model = new SobreNosModel();
    }

    public function index()
    {
        // Busca o único registro ativo
        $data = $this->model->where('status', 1)->first();
        if (!$data) {
            $data = [
                'title' => 'Sobre nós',
                'short_description' => '',
                'long_description' => '',
                'image_slogan' => '',
                'image_page' => '',
            ];
        }
        return view("sobrenos", ['data' => $data]);
    }
}