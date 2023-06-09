<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Data_product extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_admin();
    $this->load->model('product_model', 'product');
  }

  public function index()
  {
    $data['title']    = 'Produk';
    $data['product']  = $this->product->getAllProduct();
    $data['page']    = 'pages/Data_product/index';

    $this->load->view('layouts/app', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('name', 'Game name', 'required', [
      'required' => 'Nama game diperlukan.',
    ]);
    $this->form_validation->set_rules('price', 'Price', 'required|numeric', [
      'required' => 'Harga diperlukan.',
      'numeric'  => 'Harga harus berisi angka.'
    ]);
    $this->form_validation->set_rules('description', 'Description', 'required', [
      'required' => 'Deskripsi diperlukan.',
    ]);
    $this->form_validation->set_rules('requirements', 'System requriements', 'required', [
      'required' => 'Persyaratan sistem diperlukan.',
    ]);

    if ($this->form_validation->run() == false) {
      $data['title']  = 'Tambahkan Game';
      $data['page']  = 'pages/data_product/add';
      $this->load->view('layouts/app', $data);
    } else {
      $data = [
        'name'      => $this->input->post('name'),
        'price'      => $this->input->post('price'),
        'edition'    => $this->input->post('edition'),
        'description'  => $this->input->post('description'),
        'requirements'  => $this->input->post('requirements'),
      ];

      if (!empty($_FILES['image']['name'])) {
        $upload = $this->product->uploadImage();
        $data['image'] = $upload;
      }

      $this->product->insertProduct($data);
      $this->session->set_flashdata('success', 'Game berhasil ditambahkan.');

      redirect(base_url('data_product'));
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('name', 'Game name', 'required', [
      'required' => 'Nama game diperlukan.',
    ]);
    $this->form_validation->set_rules('price', 'Price', 'required|numeric', [
      'required' => 'Harga diperlukan.',
      'numeric'  => 'Harga harus berisi angka.'
    ]);
    $this->form_validation->set_rules('description', 'Description', 'required', [
      'required' => 'Deskripsi diperlukan.',
    ]);
    $this->form_validation->set_rules('requirements', 'System requriements', 'required', [
      'required' => 'Persyaratan sistem diperlukan.',
    ]);

    if ($this->form_validation->run() == false) {
      $data['title']    = 'Update Game';
      $data['page']    = 'pages/data_product/edit';
      $data['product']  = $this->product->getProduct($id);
      $this->load->view('layouts/app', $data);
    } else {
      $id = $this->input->post('id');
      $data = [
        'name'      => $this->input->post('name'),
        'price'      => $this->input->post('price'),
        'edition'    => $this->input->post('edition'),
        'description'  => $this->input->post('description'),
        'requirements'  => $this->input->post('requirements'),
      ];

      if (!empty($_FILES['image']['name'])) {
        $upload    = $this->product->uploadImage();
        if ($upload) {
          $productImage = $this->product->getProduct($id);
          if (file_exists('images/game/' . $productImage['image']) && $productImage['image']) {
            unlink('images/game/' . $productImage['image']);
          }

          $data['image'] = $upload;
        } else {
          redirect(base_url('data_product/edit'));
        }
      }

      $this->product->updateProduct($id, $data);
      $this->session->set_flashdata('success', 'Game berhasil diubah.');

      redirect(base_url('data_product'));
    }
  }

  public function delete($id)
  {
    $produk = $this->product->getProduct(($id));
    unlink('images/game/' . $produk['image']);
    $this->product->deleteProduct($id);
    $this->session->set_flashdata('success', 'Game berhasil dihapus.');

    redirect(base_url('data_product'));
  }
}
