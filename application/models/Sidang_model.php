<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang_model extends CI_Model
{
	function get_kode()
	{
	    $this->db->select('RIGHT(klien.IdKlien,4) as kode', FALSE);
	    $this->db->order_by('IdKlien','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('klien');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "IdK-".$kodemax;
		return $kodejadi;  
    }

	function get_all()
	{	
    	$this->db->join('klien', 'Sidang.IdKlien = klien.IdKlien');
		return $this->db->get('Sidang')->result_array();
	}

	function get_all_detail_row($id)
	{	
		$this->db->join('sidang', 'detailsidang.IdSidang = sidang.IdSidang');
    	$this->db->join('klien', 'Sidang.IdKlien = klien.IdKlien');
    	$this->db->where('detailsidang.IdSidang', $id);
		return $this->db->get('detailsidang')->row_array();
	}

	function get_detail_by_id($id)
	{	
		$this->db->where('detailsidang.idDSidang', $id);
		return $this->db->get('detailsidang')->row_array();
	}

	function update_detail_sidang($id, $data)
    {
        $this->db->where('idDSidang', $id);
        $this->db->update('detailsidang', $data);
    }

	function get_pengacara()
	{	
		return $this->db->get('pengacara')->result_array();
	}

	function get_all_detail($id)
	{	
		$this->db->join('sidang', 'detailsidang.IdSidang = sidang.IdSidang');
    	$this->db->join('klien', 'Sidang.IdKlien = klien.IdKlien');
    	$this->db->join('pengacara', 'detailsidang.IdPengacara = pengacara.IdPengacara');
    	$this->db->where('detailsidang.IdSidang', $id);
    	$this->db->order_by('detailsidang.tanggal', 'ASC');
		return $this->db->get('detailsidang')->result_array();
	}

	function dashboard()
	{	
		$this->db->select('*');
		$this->db->select('detailsidang.keterangan as detailket ');
		$this->db->from('detailsidang');
		$this->db->join('sidang', 'detailsidang.IdSidang = sidang.IdSidang');
    	$this->db->join('klien', 'Sidang.IdKlien = klien.IdKlien');
    	$this->db->join('pengacara', 'detailsidang.IdPengacara = pengacara.IdPengacara');
    	$this->db->order_by('detailsidang.tanggal', 'ASC');
    	
		return $this->db->get()->result_array();
	}

	function get_klient_by_id($id)
	{	
		$this->db->where('IdKlien', $id);
    	return $this->db->get('klien')->row_array();
	}

	function get_sidang_by_id($id)
	{	
		$this->db->where('IdKlien', $id);
    	return $this->db->get('Sidang')->row_array();
	}

	function get_by_idnonarray($id)
	{	
		$this->db->where('IdKlien', $id);
    	return $this->db->get('klien')->row();
	}

	function get_by_idkliennonarray($id)
	{	
		$this->db->where('IdSidang', $id);
    	return $this->db->get('Sidang')->row();
	}

	function insert_klien($data)
	{	
		$this->db->insert('klien', $data);
	}

	function insert_sidang($data)
	{	
		$this->db->insert('sidang', $data);
	}

	function insert_detailsidang($data)
	{	
		$this->db->insert('detailsidang', $data);
	}

	function insert_excel($data)
	{	
		$this->db->insert_batch('detailsidang', $data);
	}

	function update_klien($id, $data)
    {
        $this->db->where('IdKlien', $id);
        $this->db->update('klien', $data);
    }

    function update_sidang($id, $data)
    {
        $this->db->where('IdSidang', $id);
        $this->db->update('sidang', $data);
    }

    function delete_klien($id)
    {
    	$this->db->where('IdKlien', $id);
        $this->db->delete('klien');
    }

    function delete_sidang($id)
    {
    	$this->db->where('IdSidang', $id);
        $this->db->delete('sidang');
    }

    function delete_detailsidang($id)
    {
    	$this->db->where('idDSidang', $id);
        $this->db->delete('detailsidang');
    }
}