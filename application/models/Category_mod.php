<?php
/**
 * 
 */
class Category_mod extends CI_Model
{
	
	public function inscategory($data)
	{
		$this->db->insert("c_amit",$data);
	}

	public function selcategory(){
		$q=$this->db->get("c_amit");
		$rs=$q->result();
		return $rs;
	}

	public function delcategory($did){
		$this->db->where("id='$did'");
		$q=$this->db->get("c_amit");
		$rs=$q->result();
		$this->db->where("id='$did'");
		$this->db->delete("c_amit");
	}

	public function getcategory($id){
		$this->db->where("id='$id'");
		$q=$this->db->get("c_amit");
		$rs=$q->result();
		return $rs;
	}

	public function updatecategory($data,$id){
		$this->db->where("id='$id'");
		$this->db->update("c_amit",$data);
	}

	public function incproduct($data){
		$this->db->insert("product",$data);
	}

	public function selproduct(){
		$q=$this->db->select("c_amit.name,product.*")->from("product")->join("c_amit","c_amit.id=product.category")->get();
		$rs=$q->result();
		return $rs;
	}
}
?>