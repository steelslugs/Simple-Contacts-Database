<?php
class Contact_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		public function ajack($str){
			$query = $this->db->get('contacts2');
			$queryResultArray['contact']=$query->result_array();
			//count how many contacts. 
			$count=count($queryResultArray['contact']);
			for ($i=0;$i<$count;$i++){
				//cut out field to show as suggestions.
				$cut_to_name[$i] = array_slice($queryResultArray['contact'][$i],-9 , 1);//firstname
				$cut_to_name[$i] += array_slice($queryResultArray['contact'][$i],-7 , 1);//lastname
				$cut_to_name[$i] += array_slice($queryResultArray['contact'][$i],-6 , 1);//DOB
				$cut_id = array_slice($queryResultArray['contact'][$i],-11 , 1);//contact_id
				//make string from contact array with firstname at front.
				$a[$i]=implode(" ",$cut_to_name[$i])."<form action='http://[::1]/CodeIgniter-3.1.7/index.php/Contact_controller/viewit/editcontact' method='post' accept-charset='utf-8'>
					<input type='hidden' name='x' value='".$cut_id['contact_id']."'/>
					<input class='secondary button' type='submit' name='submit' value='edit contact' />
					</form></br>";
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
				// hack to stop string length and spaces issue. allows for second name to be compared.
				$q = str_replace('%20', " ", $q);
				$len=strlen($q);
// 				echo ".......".var_dump($len);
// 				echo ".......".var_dump($q);
// 				//%20 
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
			$this->db->update('contacts2', $data); 

			return $this->db->affected_rows();
		}
		

		
		public function get_contact($slug = FALSE){		//returns all contacts if no arguments/the selected contact by id and last name
				if ($slug != NULL){	
					if (array_key_exists('x',$slug)){
						$query = $this->db->get_where('contacts2', array('contact_id' => $slug['x']));
					}
					elseif (array_key_exists('searchby',$slug)){
						$query = $this->db->get_where('contacts2', array($slug['searchby'] => $slug['field']));
					}
					else{
						$query = $this->db->get_where('contacts2', array('last_name' => $slug['last_name']));
					}
					return $query->result_array();
				}
				else
				{		
					$query = $this->db->get('contacts2');
					return $query->result_array();
				}
		}
		
		public function set_contact($contacts = FALSE)
		{
			$data = array(
				
                'first_name' => $contacts['first_name'],
				'middle_name' => $contacts['middle_name'],
				'last_name' => $contacts['last_name'],
				'DOB' => $contacts['DOB'],
				'city' => $contacts['city'],
				'address' => $contacts['address'],
				'postcode' => $contacts['postcode'],
				'tel' => $contacts['tel'],
				'email' => $contacts['email']
			);
			//	echo '>>>>>>>>>>'.var_dump($data);
			//exit;
				//contantsu5 altered from news
			return $this->db->insert('contacts2', $data);
		}

}
