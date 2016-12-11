<?php
class Dashboard_controller extends CI_Controller
{
function index()
{
$this->load->view('addtask.php');// loading form view
}

function add_task()
{
$this->load->model('Dashboard_model');
$this->Dashboard_model->addtask_into_db();
redirect('Dashboard_controller/View_task');
}
    function status_change()
{
$this->load->model('Dashboard_model');
$this->Dashboard_model->status_change();
redirect('Dashboard_controller/View_task');
}
     function delete_task()
{
$this->load->model('Dashboard_model');
$this->Dashboard_model->delete_task();
redirect('Dashboard_controller/View_task');
}
    
    function view_task()
{
$this->load->model('Dashboard_model');
$data['usertasks']= $this->Dashboard_model->getusertasks();
$this->load->view('dashboard',$data); 
}

}
?>