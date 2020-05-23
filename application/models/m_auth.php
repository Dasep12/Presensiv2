<?php

 /**
 * 
 */
 class M_auth extends CI_Model
 {
 	public function getdata()
 	{
 		$username = set_value('nama');
 		$password = set_value('pass');

 		$query = $this->db->where('nama',$username)->where('pass',$password)->get('admin');
 			if ($query->num_rows() > 0 ) {
 				return $query->row();
 			}else{
 				return array();
 			}
 	}
 }