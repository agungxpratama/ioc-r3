<?php

class pegawai_model extends CI_Model
{
	public function view($table)
	{
		return $this->db->get($table);
	}
	public function view_where($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	public function insert($data,$table)
	{
		$this->db->insert($table,$data);
	}
	public function update($data,$where,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function delete($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>