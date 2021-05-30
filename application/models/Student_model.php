<?php
class Student_model extends CI_Model
{
	/* initialize tablename */
	protected $table = "student";

	/**
	 * Read data student
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
	 * Add data student
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
	 * Edit data student
	 *
	 * 
	 *
	 * @param Array $data data terbaru
	 * @param Array $cond kondisi data yang akan dirubah
	 * @return boolean
	 * @throws conditon
	 **/
	public function update($data, $cond)
	{
		return $this->db->update($this->table, $data, $cond);
	}

	/**
	 * Hapus data student
	 *
	 * 
	 *
	 * @param Array $cond kondisi data yang akan dihapus
	 * @return type
	 * @throws conditon
	 **/
	public function delete($cond)
	{
		return $this->db->delete($this->table, $cond);
	}

	/**
	 * data size Petugas
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

	public function student()
	{
	}
}
