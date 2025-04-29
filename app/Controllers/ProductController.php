<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('products/list', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $model = new ProductModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description')
        ]);

        session()->setFlashdata('success', 'Product saved successfully!');
        return redirect()->to(base_url('/'));
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view('products/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description')
        ]);
        session()->setFlashdata('success', 'Product updated successfully!');
        return redirect()->to(base_url('/'));
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Product deleted successfully!');
        return redirect()->to(base_url('/'));
    }

    public function apiProducts()
    {
        $model = new ProductModel();
        return $this->response->setJSON($model->findAll());
    }
}
