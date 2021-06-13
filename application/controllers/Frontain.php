<?php

/**
 * 
 */
class Frontain extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->model("Front_mod");
		$this->load->library("session");
	}

	public function shop(){
		$res=$this->Front_mod->selproduct();
		$resc=$this->Front_mod->selcategorys();
		$w=array(
			'product'=>$res,
			'category'=>$resc
		);
		$this->load->view('shop-view',$w);
	}
		public function category($cid){
			$cid=base64_decode($cid);
		$res=$this->Front_mod->selproductcat($cid);
		$resc=$this->Front_mod->selcategorys();
		$w=array(
			'product'=>$res,
			'category'=>$resc
		);
		$this->load->view('shop-view',$w);
	}


	public function customer(){
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$address=$this->input->post("address");
		$password=$this->input->post("password");
		$cpassword=$this->input->post("cpassword");


		$w=array(

			'name'=>$name,
			'email'=>$email,
			'address'=>$address,
			'password'=>$password,
			
		);
		$this->Front_mod->inscustomer($w);
	}

	public function clc(){
		$e=$this->input->post("email");
		$p=$this->input->post("password");

		$this->Front_mod->loginck($e,$p);

	}

	public function log(){
		$this->session->unset_userdata("c_id");
		$this->session->unset_userdata("c_name");
		$this->session->unset_userdata("c_pic");
		redirect(base_url()."shop");
	}

	public function cart(){
		$pid=$this->input->post("pid");
		$price=$this->input->post("price");
		$quantity=$this->input->post("quantity");
		$cid=$this->session->userdata("c_id");
		$dop=time();

        $this->db->where("p_id",$pid);
        $this->db->where("c_id",$cid);
        $q=$this->db->get("cart");
        $rs=$q->result();
        if(count($rs)>0){
            foreach($rs as $r){
            	$fqty=$r->quantity+$quantity;
            	$id=$r->cart_id;

            	$w=array(
			
			        'quantity'=>$fqty,
			
		            );
		$this->Front_mod->ucart($w,$id);

            }


        }
          else{
          

		$w=array(
			'p_id'=>$pid,
			'pprice'=>$price,
			'c_id'=>$cid,
			'quantity'=>$quantity,
			'dop'=>$dop
		);
		$this->Front_mod->mcart($w);
	    }
	}
}

?>