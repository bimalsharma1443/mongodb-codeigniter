<?php

class Testmdb extends CI_Controller {

	private $m;
	private $db;
	private $collection;

	public function __construct(){
		parent::__construct();
		//$this->load->library('mongo_db', array('activate'=>'my_first'),'mongo_db2');
		$this->m = new MongoClient();
		$this->db = $this->m->my_first;
   		$this->collection = $this->db->master;

   		$this->load->helper('url');
	}

	public function index(){
		$data['results'] = $this->collection->find();
		$this->load->view('testmdb/index',$data);		
	}

	public function add(){
		if($this->input->post()){
			$document = $this->input->post();
			
			$this->collection->insert($document);
			redirect('testmdb');
		}	
		$this->load->view('testmdb/add');		
	}

	public function edit($id = NULL){
		if(isset($id)){
			$data['id'] = $id;
			if($this->input->post()){
				$postData = $this->input->post();
				$this->collection->update(array("_id" => new MongoId($id)), 
				array('$set'=>array("city_name"=>$postData['city_name'])));
				redirect('testmdb');
			}else{
				$data['action_url'] = '../edit/'.$data['id'];
				$data['city_data'] = $this->collection->findOne(array("_id" => new MongoId($id)));
				$this->load->view('testmdb/edit',$data);				
			} 
		}
	}


	public function delete($id = NULL){
		if(isset($id)){
			$this->collection->remove(array("_id" => new MongoId($id)),array("justOne" => true));
		}
		redirect('testmdb');
	}

}