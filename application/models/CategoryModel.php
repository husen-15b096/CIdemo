<?php
class CategoryModel extends CI_Model
{
	public function getAllCategory()
	{
		if (!empty($this->input->get("search"))) {
			$this->db->like('cat_name', $this->input->get("search"));
		}
		$query = $this->db->get("gsm_main_category");
		return $query->result();
	}
	public function createCategory()
	{
		$data = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_logo' => $this->input->post('cat_logo')
		);
		return $this->db->insert('gsm_main_category', $data);
	}
	public function DeleteCategory($id)
	{
		$this->db->where('cat_id', $id);
		$this->db->delete('gsm_main_category');
	}
	public function getCategoryById($id)
	{
		$this->db->where('cat_id', $id);
		$result = $this->db->get('gsm_main_category');
		return $result->row_array();
	}
	public function update()
	{
		$this->db->where('cat_id', $this->input->post('cat_id'));
		$data = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_logo' => $this->input->post('cat_logo')
		);
		$this->db->update('gsm_main_category', $data);
	}
	public function updateCategory()
	{
		$this->db->where('cat_id', $this->input->post('cat_id'));

		$data = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_logo' => $this->input->post('cat_logo')
		);
		return $this->db->update('gsm_main_category', $data);
	}
}
