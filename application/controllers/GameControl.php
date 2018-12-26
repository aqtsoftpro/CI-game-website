<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Coffee Theme
*
* PHP version >= 5.4
*
* @category  PHP
* @package   Flashgames - PHP Script
* @author    Nicolas Grimonpont <support@coffeetheme.com>
* @copyright 2010-2017 Nicolas Grimonpont
* @license   Standard License
* @link      http://coffeetheme.com/
*/

class GameControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!isset($this->session->admin)) {
            redirect('/login/');
        }
        
        $data['languages'] = $this->autoloadModel->getLanguages();
        // $content = $this->load->view('dashboard/games', array(), true);
        $this->load->model(array('controlModel'));
        $this->load->helper('form','url');
      
    }

    public function index()
    {
     
        $data['controls'] = $this->controlModel->getControls();        
        // $this->createPagination($baseUrl, $totalRows, $perPage);
        $data['title'] = $this->lang->line('gameControl');
        $content = $this->load->view('dashboard/game_control', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function add()
    {        
        // Processing the Add Form
        $control_title = $this->input->post('control_title', true);
        $config['upload_path']          = './uploads/controls';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
        if(isset($control_title)) {
            if (!$this->upload->do_upload('control_image'))
            {
            $data['errors'] = array('error' => $this->upload->display_errors());
            }
            else
            {
                $control_image = $this->upload->data('file_name');
                if($this->controlModel->addControl($control_title,$control_image)) {
                $this->session->set_userdata('msg','Inserted Successfully');
                redirect(base_url('dashboard/gamecontrol/'));
                }                       
            }
        }  

        
        $data['title'] = $this->lang->line('gameControl');
        $content = $this->load->view('dashboard/control_add', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }
     public function createPagination($baseUrl, $totalRows, $perPage)
    {
        $this->load->library('pagination');
        $config["base_url"] = $baseUrl;
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    public function edit($id=''){
        $data['title'] ='Edit Control'; //$this->lang->line(''); 
        //getting the control with  given id     
        $data['control'] = $this->controlModel->getControl($id);
        //passing control to view so it can populate the veiw form
        $content = $this->load->view('dashboard/control_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function update_control()
    {           
        echo 'here';
        exit();
          // Processing the Add Form
        $control_title = $this->input->post('control_title', true);
        $config['upload_path']          = './uploads/controls';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
        if (!$this->upload->do_upload('control_image'))
        {
        $data['errors'] = array('error' => $this->upload->display_errors());
        redirect(base_url('gamecontrol/edit/'.$this->uri->segment(3,0).''));
        }
        else
        {
            $control_image = $this->upload->data('file_name');
            if($this->controlModel->updateControl($control_title,$control_image,$id)) {             
            $this->session->set_userdata('msg','Updated Successfully');
            redirect(base_url('dashboard/gamecontrol/'));
            }                       
        }
   }
   public function del_control($id){
    if(isset($id)){
        if($this->controlModel->delControl($id)){
            $this->session->set_userdata('msg','Deleted Successfully');
            redirect(base_url('dashboard/gamecontrol/'));
            }
        }
    }  
}
