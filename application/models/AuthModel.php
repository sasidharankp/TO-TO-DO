<?php
   class AuthModel extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function getUserNames() { 
        $query = $this->db->query('select * from membership');
          
          if ($query->num_rows()>0) { 
            return $query->result(); 
         } 
          else{
              return NULL;
          }
      } 
   
      
   } 
?>