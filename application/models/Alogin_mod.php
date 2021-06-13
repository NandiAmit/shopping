<?php
/**
 * 
 */
class Alogin_mod extends CI_Model
{
	
	public function loginck($e,$p)
	{
		$this->db->where("email='$e' AND password='$p'");
		$q=$this->db->get("admin");
		$rs=$q->result();
		if(count($rs)>0){
			foreach($rs as $r){
				$this->session->set_userdata("admin_id",$r->id);
				$this->session->set_userdata("admin_name",$r->name);
				redirect(base_url().'add-category');
			}
		}
		else{
			$this->session->set_flashdata("msg",'Invalid Login');
			redirect(base_url().'login');
		}
	}
}
?>