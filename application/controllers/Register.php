<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model', 'register');
	}

	public function index()
	{
		$data['title']	= 'Daftar';
		$data['page']	= 'pages/auth/register';

		$this->load->view('layouts/app', $data);
	}

	public function register()
	{

		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required'		=> 'Nama diperlukan',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required'		=> 'Email diperlukan',
			'valid_email'	=> 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'		=> 'Kata sandi diperlukan'
		]);
		$this->form_validation->set_rules('password2', 'Password confirmation', 'required|trim|matches[password]', [
			'required'		=> 'Konfirmasi kata sandi diperlukan',
			'matches'		=> 'Konfirmasi kata sandi tidak sama dengan kata sandi'
		]);

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data = [
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'password'	=> hashEncrypt($this->input->post('password')),
				'role'		=> 2,
			];

			$this->register->register($data);
			$this->session->set_flashdata('success', 'Berhasil daftar, silakan masuk.');

			redirect(base_url('login'));
		}
	}
}
