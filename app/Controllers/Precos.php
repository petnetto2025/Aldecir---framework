<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PrecosModel;

class Precos extends BaseController
{
    public function __construct()
    {
        $this->model = new PrecosModel();
        helper("precos"); // Se houver um helper customizado para planos, adicione aqui
    }

    public function formPrecos()
    {
        $this->dados["data"] = $this->model->findAll();

        return view("admin/formPrecos", $this->dados); 
    }

    /**
     * form
     *
     * @param string $action 
     * @param integer $id 
     * @return void
     */
    public function form($action, $id = 0)
    {
        $this->dados["action"] = $action;

        if ($action != "new") {
            $this->dados["data"] = $this->model->find($id);
            if ($this->dados["data"]) {
                $this->dados["data"]["benefits"] = json_decode($this->dados["data"]["benefits"], true); // Decodificar benefícios para array
            }
        }

        return view("admin/formPrecos", $this->dados);
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        $dados = [
            "id" => $post['id'] ?? null,
            "name" => $post['name'],
            "price" => $post['price'],
            "benefits" => json_encode($post['benefits']), 
            "highlight" => isset($post['highlight']) ? 1 : 0
        ];

        $imageFile = $this->request->getFile('image_file');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/uploads/precos', $newName);
            $dados['image'] = 'uploads/precos/' . $newName;
        }

        if ($this->model->save($dados)) {
            return redirect()->to('/Precos')->with('msgSucess', 'Plano Atualizado com Sucesso!');

        } else {
            return view('admin/formPrecos', [
                'action' => $post['action'],
                'data' => $post,
                'errors' => $this->model->errors()
            ]);
        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        if ($this->model->delete($this->request->getPost('id'))) {
            return redirect()->to('/Precos')->with('msgSucess', 'Plano Excluído com Sucesso.');

        } else {
            return redirect()->to('/Precos')->with('msgError', 'Erro ao Tentar Excluir Plano.');
        }
    }

    /**
     * exibePrecos - Exibe a página pública com todos os planos
     *
     * @return void
     */
    public function exibePrecos()
    {
        $data = $this->model->findAll(); 
        return view("precos", ['precos' => $data]); 
    }
}
