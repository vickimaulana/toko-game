<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myorder extends CI_Controller
{

	private $id;

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('myorder_model', 'myorder');
	}

	public function index()
	{
		$data['title']	= 'Pesanan Saya';
		$data['page']	= 'pages/myorder/index';
		$data['orders'] = $this->myorder->getMyOrders($this->session->userdata('id'));
		$this->load->view('layouts/app', $data);
	}

	public function detail($invoice)
	{
		$data['title']				= 'Pesanan Saya';
		$data['page']				= 'pages/myorder/detail';
		$data['order']				= $this->myorder->getMyOrderDetail($this->session->userdata('id'), $invoice);
		$this->load->view('layouts/app', $data);
	}

	public function confirm($invoice)
	{
		$this->form_validation->set_rules('account_name', 'Acoount name', 'required', [
			'required' => 'Acoount name diperlukan.',
		]);
		$this->form_validation->set_rules('account_number', 'Account number', 'required|numeric', [
			'required' => 'Account number diperlukan.',
			'numerin'	=> 'Account number harus berisi angka.'
		]);

		// Jika sudah ada data terkirim
		if ($this->input->post(null)) {
			// Jika data salah
			if ($this->form_validation->run() == false) {
				$data['title']	= 'Konfirmasi Pembayaran';
				$data['page']	= 'pages/myorder/confirm';
				$data['order'] = $this->myorder->getMyOrderDetail($this->session->userdata('id'), $invoice);
				$this->load->view('layouts/app', $data);

				// Jika validasi benar
			} else {
				$data = [
					'orders_id'			=> $this->input->post('orders_id'),
					'account_name'		=> $this->input->post('account_name'),
					'account_number'	=> $this->input->post('account_number'),
				];

				if (!empty($_FILES['image']['name'])) {
					$upload = $this->myorder->uploadProofPayment();
					$data['image'] = $upload;
				}

				$this->myorder->insertPaymentConfirm($data);
				$this->myorder->updateStatus($data['orders_id']);
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');

				redirect(base_url('myorder'));
			}
			// Jika belum ada data terkirim / pertama kali halaman di load
		} else {
			$data['title']	= 'Konfirmasi Pembayaran';
			$data['page']	= 'pages/myorder/confirm';
			$data['order'] = $this->myorder->getMyOrderDetail($this->session->userdata('id'), $invoice);
			$this->load->view('layouts/app', $data);
		}
	}
}
