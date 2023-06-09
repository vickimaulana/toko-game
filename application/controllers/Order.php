<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('order_model', 'order');
	}

	public function index()
	{
		$data['title']	= 'Pesanan';
		$data['page']	= 'pages/order/index';
		$data['orders'] = $this->order->getOrders();
		$this->load->view('layouts/app', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Detail Pesanan';
		$data['page'] = 'pages/order/detail';
		$data['order'] = $this->order->getOrderDetailById($id);
		$data['order_detail'] = $this->order->getOrderDetail($id);

		if ($data['order']['status'] != 'waiting') {
			$data['order_confirm'] = $this->order->getOrderConfirm($data['order']['id']);
		}
		$this->load->view('layouts/app', $data);
	}

	public function update($id)
	{
		$data['status'] = $this->input->post('status');
		$this->order->updateStatus($id, $data);
		$this->session->set_flashdata('success', 'Data updated successfully.');

		redirect(base_url("order/detail/$id"));
	}

	public function cetak_order()
	{
		$data['orders'] = $this->order->getOrders();

		$this->load->view('pages/order/print_order', $data);
	}

	public function pdf_order()
	{
		$data['orders'] = $this->order->getOrders();

		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/toko-game/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf();

		$this->load->view('pages/order/pdf_order', $data);
		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("Data Pesanan.pdf", array('Attachment' => 0));
		// nama file pdf yang di hasilkan
	}

	public function excel_order()
	{
		$data = array(
			'title' => 'Laporan Data Pesanan',
			'orders' => $data['orders'] = $this->order->getOrders()
		);
		$this->load->view('pages/order/excel_order', $data);
	}
}
