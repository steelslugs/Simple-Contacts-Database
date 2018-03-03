<?php
class Contact_controller extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('contact_model');
		$this->load->helper('url_helper');
	}
	
	public function index(){
		
		$data['title'] = 'Contacts Database:';
		$this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
		$this->load->view('templates/footer');
	}
	
	public function getcontact($slug = NULL){
		
		//echo '>>>>>>edit>>>>>'.var_dump($slug);
		//exit;
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Get contact';
		//$this->form_validation->set_rules('contact_id', 'contact_id', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('contactsdb/index');
			$this->load->view('contactsdb/getcontact', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			$this->load->view('contactdb/xxxcontact', $data);
		}
	}
	
	public function getallcontact(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['contact'] = $this->contact_model->get_contact();
		$data['title'] = 'Contacts:';

		$this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
		$this->load->view('contactsdb/getallcontact', $data);
		$this->load->view('templates/footer');
	}
	
	
	public function createcontact(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('salutation', 'salutation', 'required');
		// $this->form_validation->set_rules('first_name', 'first_name', 'required');
		// $this->form_validation->set_rules('last_name', 'last_name', 'required');
		// $this->form_validation->set_rules('DOB', 'Title', 'DOB');
		// $this->form_validation->set_rules('address', 'address', 'required');
		// $this->form_validation->set_rules('city', 'city', 'required');
		// $this->form_validation->set_rules('postcode', 'postcode', 'required');
		// $this->form_validation->set_rules('tel', 'Telephone', 'required');
		
		$data['title'] = 'Create contact:';

		if ($this->form_validation->run() === FALSE){
			
			$this->load->view('templates/header', $data);
			$this->load->view('contactsdb/index');
			$this->load->view('contactsdb/createcontact', $data);
			$this->load->view('templates/footer');
		}
		else
		{					
			$slug=$this->input->post();
			$data['contact'] = $this->contact_model->set_contact($slug);
			$data['title'] = 'Contact created successfully!';
			$this->load->view('templates/header', $data);
			//On success go back to main index.
			$this->load->view('contactsdb/index');
			$this->load->view('templates/footer');
		
		}

	}

		
	public function showcontact($slug = NULL){

		$data['title'] = "Show Contact";
		$this->load->helper('form');
		$this->load->library('form_validation');
		//x is the selected choice from index.php
		
		$slug=$this->input->post();
		// echo '>>>>>>posted>>>>>'.var_dump($slug);
		// exit;
		$data['contact'] = $this->contact_model->get_contact($slug);
		
		
		
		if (empty($data['contact'])){
				show_404();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
		$this->load->view('contactsdb/showcontact', $data);
		$this->load->view('templates/footer');
	}
	
	public function editcontact($slug = NULL){	
		$slug=$this->input->post();
		// echo '>>>>>>show>>>>>'.var_dump($slug);
		// exit;
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['contact'] = $this->contact_model->get_contact($slug);
		$data['title'] = 'Edit:';

		$this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
		$this->load->view('contactsdb/editcontact', $data);
		$this->load->view('templates/footer');
	}
	public function updatecontact($slug = NULL){
		
		$data['title'] = 'Update a contact';
		$slug=$this->input->post();
		$data['contact'] = $this->contact_model-> update_contact($slug);

		//echo ">>>update-model.id..>>>>".var_dump($data['contact']);
		//exit;
		if($data['contact']>0){
			
			$data['title'] = 'Update Successfully';
			$this->load->view('templates/header', $data);
			$this->load->view('contactsdb/index');
			$this->load->view('contactsdb/success', $data);
			$this->load->view('templates/footer');
	
		}
		else{
			
			//show_404();
			$data['title'] = 'Update Unsuccessfully';
			$this->load->view('templates/header', $data);
			$this->load->view('contactsdb/index');
			$this->load->view('contactsdb/fail', $data);
			$this->load->view('templates/footer');
		}
	}
 
		public function searchcontact(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$data['contact'] = $this->contact_model->get_contact($slug);
		$data['title'] = 'Search:';

		$this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
		$this->load->view('contactsdb/searchcontact', $data);
		$this->load->view('templates/footer');
	}

		
}
