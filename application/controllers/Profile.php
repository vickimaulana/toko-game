<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('profile_model', 'profile');
	}

	public function index()
	{
		$id 					= $this->session->userdata('id');
		$data['title'] 	= 'Profil';
		$data['page'] 		= 'pages/profile/index';
		$data['profile']	= $this->profile->getProfile($id);
		$this->load->view('layouts/app', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Nama diperlukan.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
			'required' 		=> 'Email diperlukan.',
			'valid_email'	 => 'Email tidak valid.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$id = $this->session->userdata('id');
			$data['title'] 	= 'Profil';
			$data['page'] 		= 'pages/profile/index';
			$data['profile']	= $this->profile->getProfile($id);
			$this->load->view('layouts/app', $data);
		} else {
			$id = $this->session->userdata('id');

			$data = [
				'name'	=> $this->input->post('name'),
				'email' 	=> $this->input->post('email')
			];

			$this->profile->updateProfile($id, $data);
			$this->session->set_flashdata('success', 'Profil berhasil diubah.');

			redirect(base_url('profile'));
		}
	}

	public function password()
	{
		$this->form_validation->set_rules('password', 'New password', 'required', [
			'required' => 'Kata sandi baru diperlukan.',
		]);
		$this->form_validation->set_rules('password2', 'Password confirmation', 'required|trim|matches[password]', [
			'required' => 'Konfirmasi kata sandi diperlukan.',
			'matches'  => 'Konfirmasi Kata Sandi tidak cocok.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title']		= 'Ubah Kata Sandi';
			$data['page'] 		= 'pages/profile/password';

			$this->load->view('layouts/app', $data);
		} else {
			$id = $this->session->userdata('id');
			$data = [
				'password' => hashEncrypt($this->input->post('password')),
			];

			$this->profile->updatePassword($id, $data);
			$this->session->set_flashdata('success', 'Kata sandi berhasil diubah.');

			redirect(base_url('profile/password'));
		}
	}
}
