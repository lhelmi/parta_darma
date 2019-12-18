<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenunjang_model extends CI_Model
{
	function get_all()
	{	
    	$this->db->join('klien', 'datapenunjang.IdKlien=klien.IdKlien');
    	return $this->db->get('datapenunjang')->result_array();
	}

	function get_hub()
	{	
    	return $this->db->get('klien')->result_array();
	}

	function get_hub_by_id($id)
	{	
		$this->db->where('IdKlien', $id);
    	return $this->db->get('klien')->row_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('IdKlien', $id);
    	return $this->db->get('datapenunjang')->result_array();
	}

	function insert($data)
	{	
		$this->db->insert_batch('datapenunjang', $data);
	}

	function delete($id)
    {
    	$this->db->where('IdDP', $id);
        $this->db->delete('datapenunjang');
    }
}