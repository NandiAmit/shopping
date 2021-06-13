<?php  

/**
 * 
 */
class Master extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();

		$this->load->database();
		$this->load->helper("url");
		$this->load->model("Category_mod");
		$this->load->library("session");

		$admin_id=$this->session->userdata("admin_id");

		if($admin_id==""){
			redirect(base_url().'login');
		}
	}

	public function add_category(){
		$this->load->view('Add_category');
		
	}
	public function list_category(){
		$res=$this->Category_mod->selcategory();
		$w=array(
			'row'=>$res
		);
		$this->load->view('List_category',$w);
		
	}

	public function add_product(){
		$res=$this->Category_mod->selcategory();
		$w=array(
			'rowc'=>$res
		);
		$this->load->view('Add_product',$w);

	}

	public function list_product(){
		$res=$this->Category_mod->selproduct();
		$w=array(
			'rowp'=>$res
		);
		$this->load->view('List_product',$w);
	}

	public function create_product(){
		$category=$this->input->post("category");
		$pname=$this->input->post("pname");
		$pprice=$this->input->post("pprice");

		$conf=array(
			'upload_path'=>'./upload_pic',
			'allowed_types'=>'jpg|jpeg|png',
			'max_size'=>10240
		);
		$this->load->library("upload",$conf);
		if(!$this->upload->do_upload("pimage")){
			echo $this->upload->display_errors();
		}
		else{
			$fd=$this->upload->data();
			$flname=$fd['file_name'];

			$w=array(
				'category'=>$category,
				'pname'=>$pname,
				'pprice'=>$pprice,
				'pimg'=>$flname
			);
			$this->Category_mod->incproduct($w);
			redirect(base_url().'list-product');
		}
	}


	public function create_category(){
		$name=$this->input->post("name");

		$w=array(
			'name'=>$name
		);
		$this->Category_mod->inscategory($w);
		redirect(base_url().'list-category');
	}

	public function delete_category($id){
		$this->Category_mod->delcategory($id);
		redirect(base_url().'list-category');
	}
	public function update_category($id){
		$res=$this->Category_mod->getcategory($id);
		$w=array(
			'row'=>$res
		);
		$this->load->view('update_view',$w);
	}

	public function upd_category(){
		$name=$this->input->post("name");
		$id=$this->input->post("id");

		$w=array(
			'name'=>$name
		);
		$this->Category_mod->updatecategory($w,$id);
		redirect(base_url().'list-category');
	}
}

?>