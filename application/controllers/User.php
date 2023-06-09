<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_admin();
		$this->load->model('user_model', 'user');
	}

	public function index()
	{
		$data['title']	= 'Users Data';
		$data['page']	= 'pages/users/index';
		$data['users']	= $this->user->getUsers();
		$this->load->view('layouts/app', $data);
	}

	public function delete($id)
	{
		$this->user->deleteUser($id);
		$this->session->set_flashdata('success', 'User succesfully deleted.');
		redirect(base_url('user'));
	}

	public function cetak_user()
	{
		$data['users']	= $this->user->getUsers();

		$this->load->view('pages/users/print_users', $data);
	}

	public function pdf_user()
	{
		$data['users']	= $this->user->getUsers();

		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/toko-game/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf();

		$this->load->view('pages/users/pdf_users', $data);
		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("Data User.pdf", array('Attachment' => 0));
		// nama file pdf yang di hasilkan
	}

	public function excel_user()
	{
		$data = array(
			'title' => 'Laporan Data Pengguna',
			'users' => $data['users']	= $this->user->getUsers()
		);
		$this->load->view('pages/users/excel_users', $data);
	}
}

/* End of file User.php */
