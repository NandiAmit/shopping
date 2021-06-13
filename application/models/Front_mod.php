<?php

/**
 * 
 */
class Front_mod extends CI_Model
{
	
	public function inscustomer($data)
	{
		$this->db->insert("customer",$data);
	}
	public function loginck($e,$p)
	{
		$this->db->where("email='$e' AND password='$p'");
		$q=$this->db->get("customer");
		$rs=$q->result();
		if(count($rs)>0){
			foreach($rs as $r){
				$this->session->set_userdata("c_id",$r->id);
				$this->session->set_userdata("c_name",$r->name);
				$this->session->set_userdata("c_pic",$r->pic);

				redirect(base_url().'shop');
			}
		}
		else{
			?>
			<script>
				alert("invalid login");
				window.location="<?php echo base_url();?>shop";
			</script>

			<?php
		}
	}

	public function selproduct(){
		$q=$this->db->get('product');
		$rs=$q->result();
		return $rs;
	}

	public function selcategorys(){
		$q=$this->db->get('c_amit');
		$rs=$q->result();
		return $rs;
	}
	public function selproductcat($cid){
		$this->db->where("category",$cid);
		$q=$this->db->get('product');
		$rs=$q->result();
		return $rs;
	}
	public function mcart($data){
		$this->db->insert('cart',$data);
	}
public function ucart($data,$id){
	$this->db->where("cart_id",$id);
		$this->db->update('cart',$data);
	}
}

?>