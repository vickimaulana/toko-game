<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends CI_Model
{

	public function getCart($id)
	{
		$this->db->select('cart.id, cart.subtotal, products.name, products.image, products.price');
		$this->db->from('cart');
		$this->db->join('products', 'cart.product_id = products.id');
		$this->db->where('cart.user_id', $id);
		return $this->db->get()->result_array();
	}

	public function total($id)
	{
		$this->db->select_sum('subtotal');
		$this->db->from('cart');
		$this->db->where('user_id', $id);
		return $this->db->get()->row()->subtotal;;
	}

	public function insertOrder($data)
	{
		$this->db->insert('orders', $data);
		return $this->db->insert_id();
	}

	public function getCartByIdUser($id)
	{
		return $this->db->get_where('cart', ['user_id' => $id])->result_array();
	}

	public function insertOrdersDetail($data)
	{
		$this->db->insert('orders_detail', $data);
	}

	public function deleteCart($id)
	{
		$this->db->delete('cart', ['user_id' => $id]);
	}

	public function kodeOtomatis($tabel, $key)
	{
		$this->db->select('right(' . $key . ',3) as kode', false);
		$this->db->order_by($key, 'desc');
		$this->db->limit(1);
		$query = $this->db->get($tabel);
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = date('dmY') . $kodemax;
		return $kodejadi;
	}
}
