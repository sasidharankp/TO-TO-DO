<?php

class taskController extends CI_Controller 
{
	    
     function __construct() { 
         parent::__construct(); 
         $this->is_logged_in();
      }
    
	function fetch_task()
	{
       $this->load->model('TaskModel'); 
    $data['tasks'] = $this->TaskModel->fetch_task();    
    $data['title']='Dashboard';
    $data['page_header']='To-To-Dooo';
    
    $this->load->view('logged_in_area',$data); 
	}
	
	function another_page() // just for sample
	{
		echo 'Task Added';
	}
		
	

}
