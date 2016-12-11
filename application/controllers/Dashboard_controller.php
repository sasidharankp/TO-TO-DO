<?php
class dashboard_controller extends CI_Controller
{
function index()
{
$this->load->view('addtask.php');// loading form view
}

function add_task()
{
$this->load->model('dashboard_model');
$this->dashboard_model->addtask_into_db();
redirect('dashboard_controller/view_task');
}
    function status_change()
{
$this->load->model('dashboard_model');
$this->dashboard_model->status_change();
redirect('dashboard_controller/view_task');
}
     function delete_task()
{
$this->load->model('dashboard_model');
$this->dashboard_model->delete_task();
redirect('dashboard_controller/view_task');
}
    
    function view_task()
{
$this->load->model('dashboard_model');
$data['usertasks']= $this->dashboard_model->getusertasks();
$this->load->view('dashboard',$data); 
}

}
?>