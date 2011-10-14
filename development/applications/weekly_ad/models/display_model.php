<?php 
/*Model signup_model.php*/

class Display_model extends CI_Model {

	function __construct()    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//make sure an email addy hasn't been used before
	function checkPage($pageid) 
	{
		$query = $this->db->query("SELECT * FROM users WHERE pageid = '$pageid'");
		$count = $query->num_rows();
		$results = $query->row();
		if($count == 0)
		{
			return false;
		} 
		else
		{
			return $results; 
		}

	}
	
}

/*End Model display_model.php*/
