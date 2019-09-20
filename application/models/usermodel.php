<?php
class usermodel extends CI_Model
{
	public function createuser()
	{
		$data = array(
			'cname' => $this->input->post('cname'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'mobno' => $this->input->post('mobno'),
			'password' => $this->input->post('password')
		);
		return $this->db->insert('customer', $data);
	}
}
