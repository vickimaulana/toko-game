<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_admin();
		$this->load->model('product_model', 'product');
	}

	public function index()
	{
		$data['title']		= 'Produk';
		$data['product']	= $this->product->getAllProduct();
		$data['page']		= 'pages/product/index';

		$this->load->view('layouts/app', $data);
	}

	public function cetak_product()
	{
		$data['product']  = $this->product->getAllProduct();
		$this->load->view('pages/product/print_product', $data);
	}

	public function pdf_product()
	{
		$data['product']  = $this->product->getAllProduct();

		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/toko-game/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf();

		$this->load->view('pages/product/pdf_product', $data);
		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("Data Product.pdf", array('Attachment' => 0));
		// nama file pdf yang di hasilkan
	}

	public function excel_product()
	{
		$data = array(
			'title' => 'Laporan Data Produk',
			'product' => $data['product']  = $this->product->getAllProduct()
		);
		$this->load->view('pages/product/excel_product', $data);
	}
}

/* End of file Product.php */
