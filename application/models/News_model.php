<?php
class News_model extends CI_Model
{
	/* initialize tablename */
	protected $table = "news";

	/**
	 * Read data News
	 *
	 * 
	 *
	 * @param Array $data specific data
	 * @return Array
	 * @throws conditon
	 **/
	public function read($data = FALSE, $limit = FALSE)
	{
		if ($data == FALSE) {
			return $this->db
				->order_by('date', 'DESC')
				->get($this->table)
				->result_array();
		}

		return $this->db
			->order_by('date', 'DESC')
			->get_where($this->table, $data)
			->result_array();
	}

	/**
	 * Tambah data News
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
	 * Edit data News
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
	 * Delete data News
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
	 * data size News
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
