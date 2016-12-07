<?php

class Master extends CI_Controller {

	private $m;
	private $db;
	private $collection;

	public function __construct(){
		parent::__construct();
		$this->m = new MongoClient();
		$this->db = $this->m->master;
		$this->load->helper('url');
	}

	public function index(){
		//index Action
	}

	public function country(){
		$this->collection = $this->db->country;
		$data['results'] = $this->collection->find();
		$this->load->view('country/index',$data);
	}

	public function addcountry(){
		$this->collection = $this->db->country;
		if($this->input->post()){
			$document = $this->input->post();
			$this->collection->insert($document);
			redirect('master/country');
		}	
		$this->load->view('country/add');
	}

	public function editcountry($id){
		$this->collection = $this->db->country;
		if(isset($id)){
			$data['id'] = $id;
			if($this->input->post()){
				$postData = $this->input->post();
				$this->collection->update(array("_id" => new MongoId($id)), 
				array('$set'=>array("country_name"=>$postData['country_name'])));
				redirect('master/country');
			}else{
				$data['action_url'] = '../editcountry/'.$data['id'];
				$data['country_data'] = $this->collection->findOne(array("_id" => new MongoId($id)));
				$this->load->view('country/edit',$data);				
			} 
		}
	}

	public function deletecountry($id=NULL){
		$this->collection = $this->db->country;
		if(isset($id)){
			$this->collection->remove(array("_id" => new MongoId($id)),array("justOne" => true));
		}
		redirect('master/country');
	}

	public function city(){
		$this->collection = $this->db->city;
		$city_list = $this->collection->find();
		$data['results'] = array();
		foreach($city_list as $row){
			$country_list = $this->collection->getDBRef(array('$ref' =>'country','$id' => new MongoId($row['country_id']),'$db' => 'master'));
			$field['city_name'] = $row['city_name'];
			$field['_id'] = $row['_id'];
			$field['country_name'] = $country_list['country_name'];
			array_push($data['results'], $field);
		}
		$this->load->view('city/index',$data);
	}

	public function addcity(){
		$this->collection = $this->db->city;
		if($this->input->post()){
			$document = $this->input->post();
			$this->collection->insert($document);
			redirect('master/city');
		}
		$data['country_list'] = $this->db->country->find();
		$data['ref'] = 'country'; 
		$this->load->view('city/add',$data);
	}

	public function editcity($id){
		$this->collection = $this->db->city;
		if(isset($id)){
			$data['id'] = $id;
			if($this->input->post()){
				$postData = $this->input->post();
				$this->collection->update(array("_id" => new MongoId($id)), 
				array('$set'=>array("country_id"=>$postData['country_id'],"city_name"=>$postData['city_name'])));
				redirect('master/city');
			}else{
				$data['action_url'] = '../editcity/'.$data['id'];
				$data['city_data'] = $this->collection->findOne(array("_id" => new MongoId($id)));
				$data['country_list'] = $this->db->country->find();
				$this->load->view('city/edit',$data);				
			} 
		}
	}

	public function deletecity($id){
		$this->collection = $this->db->city;
		if(isset($id)){
			$this->collection->remove(array("_id" => new MongoId($id)),array("justOne" => true));
		}
		redirect('master/city');
	}
}




