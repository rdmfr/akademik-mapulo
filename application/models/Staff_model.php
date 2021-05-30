<?php
class Staff_model extends CI_Model
{
	/* initialize tablename */
	protected $table = "staff";

	/**
	 * Read data Staff
	 *
	 * 
	 *
	 * @param Array $data specific data
	 * @return Array
	 * @throws conditon
	 **/
	public function read($data = FALSE)
	{
		if ($data == FALSE) {
			return $this->db->get($this->table)->result_array();
		}

		return $this->db->get_where($this->table, $data)->result_array();
	}

	/**
	 * Tambah data Staff
	 *
	 * 
	 *
	 * @param Array $data data yang akan disimpan
	 * @return boolean
	 * @throws conditon
	 **/
	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * Edit data staff
	 *
	 * 
	 *
	 * @param Array $data new changed data
	 * @param Array $cond condition of data
	 * @return boolean
	 * @throws conditon
	 **/
	public function update($data, $cond)
	{
		return $this->db->update($this->table, $data, $cond);
	}

	/**
	 * Hapus data Staff
	 *
	 * 
	 *
	 * @param Array $cond codition of data
	 * @return type
	 * @throws conditon
	 **/
	public function delete($cond)
	{
		return $this->db->delete($this->table, $cond);
	}

	/**
	 * data size Staff
	 *
	 * 
	 *
	 * @return int
	 * @throws conditon
	 **/
	public function size()
	{
		return $this->db->count_all($this->table);
	}
}
