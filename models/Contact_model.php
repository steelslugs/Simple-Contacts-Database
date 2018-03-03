<?php
class Contact_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
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