<?php
class Dashboard_model extends CI_Model
{
    function __construct() { 
         parent::__construct(); 
      } 
    
function addtask_into_db()
{
$f1 = $_POST['username'];
$f2 = $_POST['title'];
$f3 = $_POST['description'];
$f5 = $_POST['end_date'];
$f6 = $_POST['status'];
$this->db->query("INSERT INTO todoitems(username,title,description,upd_timestamp,end_date,status) VALUES('$f1','$f2','$f3',now(),'$f5','$f6')");
}
    
function status_change()
{
$f1 = $_POST['uid'];
$f2 = $_POST['status'];
$this->db->query("UPDATE todoitems set status='$f2', upd_timestamp=now() where uid='$f1'");
}
function delete_task()
{
$f1 = $_POST['uid'];
$this->db->query("delete from todoitems where uid='$f1'");
}
    
function getusertasks()
	{
           $f1= $this->session->userdata('username');
		 $query = $this->db->query("select * from todoitems where username='$f1' ");
          
          if ($query->num_rows()>0) { 
            return $query->result(); 
         } 
          else{
              return NULL;
          }
		
	}
}
?>