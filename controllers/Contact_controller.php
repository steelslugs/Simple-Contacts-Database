<?php
class Contact_controller extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('contact_model');
		$this->load->helper('url_helper');
	}
	public function viewit($page='home'){
		if ( ! file_exists(APPPATH.'views/contactsdb/'.$page.'.php'))
        {
			echo "Whoops, we don't have a page for that!";
			
			show_404();
		}
		//$data['title'] = ucfirst($page); // Capitalize the first letter
		
		//display heading based on page loaded.
		switch ($page) {
			case "getallcontact":
				$data['title'] = "All Contacts :";
				break;
			case "searchcontact":
				$data['title'] = "Search :";
				break;
			case "showcontact":
				$data['title'] = "Available contacts:";
				break;
			case "createcontact":
				$data['title'] = "Enter contact details:";
				break;
			default:
				$data['title'] = "default header:";
		}
		if ($page==='getallcontact'){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['contact'] = $this->contact_model->get_contact();
		}
		if ($page==='showcontact'||$page==='editcontact'||$page==='getcontactbyfield'){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$slug=$this->input->post();
			$data['contact'] = $this->contact_model->get_contact($slug);
		}
		
		
		if ($page==='updatecontact'){
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('salutation', 'salutation', 'required');
			$this->form_validation->set_rules('first_name', 'first_name', 'required');
			$this->form_validation->set_rules('last_name', 'last_name', 'required');
			$this->form_validation->set_rules('DOB', 'Date Of Birth', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation->set_rules('postcode', 'postcode', 'required');
			$this->form_validation->set_rules('tel', 'Telephone', 'required');
			if ($this->form_validation->run() === FALSE){
				 
				$slug=$this->input->post();
				//echo '>>>>>>>>>>'.var_dump($slug);
				//exit;
				$data['contact'] = $this->contact_model->get_contact($slug);
				// look. edit page is reloaded with the details again.
				// and a message is displayed to show what is needed by the php validation.
				$page='editcontact';
				
			}
			else{
				$slug=$this->input->post();
				$data['contact'] = $this->contact_model->update_contact($slug);
				//echo var_dump($page);exit;
				if($data['contact']>0){
					$page='success';
				}
				else{
					$page='fail';
				}
			}	
		}
	
		
       
        $this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
        $this->load->view('contactsdb/'.$page, $data);
        $this->load->view('templates/footer', $data);

	}

		public function createcontact(){
		
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('salutation', 'salutation', 'required');
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
		$this->form_validation->set_rules('last_name', 'last_name', 'required');
		$this->form_validation->set_rules('DOB', 'Date Of Birth', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('postcode', 'postcode', 'required');
		$this->form_validation->set_rules('tel', 'Telephone', 'required');
		
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
			if($data['contact']>0){
				
				//using success with updated message 
				$this->load->view('contactsdb/index');
				$this->load->view('contactsdb/success');
				$this->load->view('templates/footer');
			}
			else{
		
				//using fail from updated .
				$this->load->view('contactsdb/index');
				$this->load->view('contactsdb/fail');
				$this->load->view('templates/footer');
			}
		
		}

	}
	
	public function index(){
		
		$data['title'] = 'Contacts Database:';
		$this->load->view('templates/header', $data);
		$this->load->view('contactsdb/index');
		$this->load->view('templates/footer');
	}

 
	

		
}
