<?php
class Result_model extends CI_Model
{
	/* initialize tablename */
	protected $table = "result";

	/**
	 * Read data Result
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


	public function advance_read($data = [])
	{
		if (count($data) == 0) {
			return $this->db->select("res.result_id,sem.semester,sub.subject,res.year,b.branch,st.student_id,st.email,st.contact_no,CONCAT_WS(' ',st.first_name,st.last_name) AS student,res.score")
				->from("$this->table as res")
				->join("semester as sem", "sem.semester_id=res.semester")
				->join("branch as b", "b.branch_id=res.branch")
				->join("subject as sub", "sub.subject_id=res.subject")
				->join("student as st", "st.student_id=res.student_id")
				->get()
				->result_array();
		} else {
			$result = $this->db->select("res.result_id,sem.semester,sub.subject,res.year,b.branch,st.student_id,st.email,st.contact_no,CONCAT_WS(' ',st.first_name,st.last_name) AS student,res.score")
				->from("$this->table as res")
				->join("semester as sem", "sem.semester_id=res.semester")
				->join("branch as b", "b.branch_id=res.branch")
				->join("subject as sub", "sub.subject_id=res.subject")
				->join("student as st", "st.student_id=res.student_id")
				->join("branch as br", "br.branch_id=st.branch", "left");
			foreach ($data as $d) {
				$result->where($d['field'], $d['value']);
			}
			return $result->get()->result_array();
		}
	}



	/**
	 * Tambah data Result
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
	 * Edit data Result
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
	 * Hapus data Result
	 *
	 * 
	 *
	 * @param Array $cond kondisi data yang akan dihapus
	 * @return boolean
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
}
