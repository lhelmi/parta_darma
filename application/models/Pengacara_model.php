<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengacara_model extends CI_Model
{
	function get_kode()
	{
	    $this->db->select('RIGHT(pengacara.IdPengacara,4) as kode', FALSE);
	    $this->db->order_by('IdPengacara','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('pengacara');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KdP-".$kodemax;
		return $kodejadi;
    }

    function get_number()
	{
	    $this->db->select('RIGHT(pengacara.IdPengacara,4) as kode', FALSE);
	    $this->db->order_by('IdPengacara','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('pengacara');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		return $kode;
    }

	function get_all()
	{	
    	return $this->db->get('pengacara')->result_array();
	}

	function get_limit_data() {
		$this->db->where('baca', '0');
		$this->db->limit(5, 0);
		return $this->db->get('hubungi')->result_array();
	}

	function insert($data)
	{	
		$this->db->insert('pengacara', $data);
	}

	function insert_Bk($data)
	{
		$this->db->insert_batch('bidangkeahlian', $data);
	}

	function get_by_id($id)
	{	
		$this->db->where('IdPengacara', $id);
    	return $this->db->get('pengacara')->row_array();
	}

	function get_by_idnonarray($id)
	{	
		$this->db->where('IdPengacara', $id);
    	return $this->db->get('pengacara')->row();
	}

	function Bk_by_id($id)
	{	
		$this->db->join('bidangkeahlian', 'bidangkeahlian.IdPengacara = Pengacara.IdPengacara');
		$this->db->where('Pengacara.IdPengacara', $id);
    	return $this->db->get('pengacara')->result_array();
	}
	
	function update($id, $data)
    {
        $this->db->where('IdPengacara', $id);
        $this->db->update('pengacara', $data);
    }

    function update_bk($data, $idbk)
    {
        $this->db->update_batch('bidangkeahlian', $data, $idbk);
    }

    function delete($id)
    {
    	$this->db->where('IdPengacara', $id);
        $this->db->delete('pengacara');
    }
    function BKdelete($id)
    {
    	$this->db->where('IdBk', $id);
        $this->db->delete('bidangkeahlian');
    }
}

?>