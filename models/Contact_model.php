<?php
class Contact_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		public function ajack($str){
				//why does changing db create an error.
			$query = $this->db->get('contacts2');
			$queryResultArray['contact']=$query->result_array();
			//echo ".......".var_dump($queryResultArray);
			//count how many contacts. 
			$count=count($queryResultArray['contact']);
			$cut_to_name[]="";$v[]="";
			$cut_id="";
			for ($i=0;$i<$count;$i++){
				//cut to first name so its the beginning of string for searching.
				$cut_to_name[$i] = array_slice($queryResultArray['contact'][$i],2 , -1);
				$cut_id = array_slice($queryResultArray['contact'][$i],0 , -10);
				//echo ".......".var_dump($cut_id);
				//make string from contact array with firstname at front.
				$a[$i]=implode("</br>",$cut_to_name[$i])."<form action='http://[::1]/CodeIgniter-3.1.7/index.php/Contact_controller/viewit/editcontact' method='post' accept-charset='utf-8'></br><input 
				type='hidden' name='x' value='".$cut_id['contact_id']."'/><input class='secondary button' type='submit' name='submit' value='edit contact' /></form></br>";
			}
		//names below left for testing.
			$a[] = "Anna blue";
			$a[] = "Brittany";
			$a[] = "Cinderella";
			// get the str parameter from URL
			$q = $str;//$_REQUEST["q"];

			$hint = "";

			// lookup all hints from array if $q is different from ""
			// this code is used from https://www.w3schools.com/xml/ajax_php.asp.
			if ($q !== "") {
				$q = strtolower($q);
				$len=strlen($q);
				$len2=substr_count($q,' ');
				//echo ".......".var_dump($len2);
				foreach($a as $name) {
					if (stristr($q, substr($name, 0, $len))) {
						if ($hint === "") {
							$hint = $name;
						} else {
							$hint .= " $name";
						}
					}
				}
			}

			// Output "no suggestion" if no hint was found or output correct values 
			echo $hint === "" ? "no suggestion" : $hint;
	
		}
		public function update_contact($contacts)
		{
			$data = array(
				'salutation' => $contacts['salutation'],
				'contact_id' => $contacts['contact_id'],
                'first_name' => $contacts['first_name'],
				'middle_name' => $contacts['middle_name'],
				'last_name' => $contacts['last_name'],
				'city' => $contacts['city'],
				'address' => $contacts['address'],
				'postcode' => $contacts['postcode'],
				'tel' => $contacts['tel'],
				'email' => $contacts['email']
				
            );
			// echo ">>>update-model>>>>".var_dump($contacts);
			// echo ">>>update-model.id..>>>>".var_dump($contacts['contact_id']);
			// exit;
			$this->db->where('contact_id', $contacts['contact_id']);
			// $data is used here as using $contacts array includes the submit value!!
			$this->db->update('contactsu5', $data); 

			return $this->db->affected_rows();
		}
		

		
		public function get_contact($slug = FALSE)
		{		//returns all contacts if no arguments/the selected contact by id and last name
				if ($slug != NULL)
				{	
					// echo '>>>>>>if>>>>'.var_dump($slug);
					// exit;
					if (array_key_exists('x',$slug)){
						$query = $this->db->get_where('contactsu5', array('contact_id' => $slug['x']));
						//echo '>>>>>>if>>>>'.var_dump($query->result_array());
					}
					elseif (array_key_exists('searchby',$slug)){
						//
						$query = $this->db->get_where('contactsu5', array($slug['searchby'] => $slug['field']));
						//echo '>>>>>>get modelmmmmmm>>>>'.var_dump($slug['searchby']);
					//exit;
					}
					
					
					else{
						$query = $this->db->get_where('contactsu5', array('last_name' => $slug['last_name']));
						//echo '>>>>>>else>>>>'.var_dump($query->result_array());
					}
					//echo '>>>>>>get model>>>>'.var_dump($query->result_array());
					//exit;
					
					return $query->result_array();
					
				}
				if ($slug === FALSE)
				{		
						$query = $this->db->get('contactsu5');
						//echo '>>>>>>false>>>>'.var_dump($query->result_array());
						return $query->result_array();
				}

				
		}
		
		public function select_contact($slug = FALSE)
		{		//echo '>>>>>>>>>>'.var_dump($slug);
				//exit;
				if ($slug != NULL)
				{
					$query = $this->db->where('first_name',$slug);
					//$query = $this->db->get('contactsu5');
					echo '>>>>>>>>>>'.var_dump($query);
				//exit;
					//'contact_id' => $slug))
					return $query->row_array();
				}
				if ($slug === FALSE)
				{
						$query = $this->db->get('contactsu5');
						return $query->result_array();
				}

				
		}
		
		
		public function set_contact($contacts = FALSE)
		{
			$data = array(
				
                'first_name' => $contacts['first_name'],
				'middle_name' => $contacts['middle_name'],
				'last_name' => $contacts['last_name'],
				'city' => $contacts['city'],
				'address' => $contacts['address'],
				'postcode' => $contacts['postcode'],
				'tel' => $contacts['tel'],
				'email' => $contacts['email']
			);
			//	echo '>>>>>>>>>>'.var_dump($data);
			//exit;
				//contantsu5 altered from news
			return $this->db->insert('contactsu5', $data);
		}
		
		public function hint()
		{
			

			$hint = "";

			// lookup all hints from array if $q is different from "" 
			if ($q !== "") {
				$q = strtolower($q);
				$len=strlen($q);
				foreach($a as $name) {
					if (stristr($q, substr($name, 0, $len))) {
						if ($hint === "") {
							$hint = $name;
						} else {
							$hint .= ", $name";
						}
					}
				}
			}
		
			// Output "no suggestion" if no hint was found or output correct values 
			echo $hint === "" ? "no suggestion" : $hint;
		}
}
