<?php
/**
 * 
 */
class Admin_login extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->model("Alogin_mod");
		$this->load->library("session");
	}

	public function login(){
		$msg=$this->session->flashdata("msg");
		$w=array(
			'msg'=>$msg
		);
		$this->load->view('admin-login',$w);
	}

	public function lc(){
		$e=$this->input->post("email");
		$p=$this->input->post("password");

		$this->Alogin_mod->loginck($e,$p);
	}

	public function logout(){
		$this->session->unset_userdata("admin_id");
		$this->session->unset_userdata("admin_name");
		redirect(base_url().'login');
	}
}
?>