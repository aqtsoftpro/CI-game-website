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

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!isset($this->session->admin)) {
            redirect('/login/');
        }
        $content = $this->load->view('dashboard/games', array(), true);
        $this->load->model(array('pagesModel'));
    }

    public function index()
    {
        $data['title'] = $this->lang->line('pages');
        // Deleting a page
        $idPage = $this->input->get('del', true);
        if(isset($idPage) && !$this->config->item('demo')) {
            $this->pagesModel->delPage($idPage);
        }
        // Viewing pages
        $data['getPages'] = $this->pagesModel->getPages();
        $content = $this->load->view('dashboard/pages', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function add()
    {
        $data['title'] = $this->lang->line('pages');
        // Processing the creative form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('url', true);
        $postContent = $this->input->post('content', true);
        $postDisplayFooter = $this->input->post('displayFooter', true);
        // Processing the left form
        if(isset($postTitle) && ($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->pagesModel->addPage($postTitle, $postURL, $postContent, $postDisplayFooter);
        }
        $data['display_footer'] = '1';
        $content = $this->load->view('dashboard/page_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function edit($idPage = '')
    {
        $data['title'] = $this->lang->line('pages');
        // Processing the Change Form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('url', true);
        $postContent = $this->input->post('content', true);
        // Processing the left form
        if(isset($postTitle) && ($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->pagesModel->editPage($idPage, $postTitle, $postURL, $postContent);
        }
        // Processing the right form
        if(null!== $this->input->post('displayFooter', true) && !$this->config->item('demo')) {
            $data['msg'] = $this->pagesModel->updateForm2($idPage, $this->input->post('displayFooter', true));
        }
        // Retrieving page data
        $data = array_merge($data, $this->pagesModel->getPage($idPage));
        $content = $this->load->view('dashboard/page_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function header_image()
    {
        $data['title'] = $this->lang->line('title_image');
        // Processing the creative form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('url', true);
        $postContent = $this->input->post('content', true);
        $postDisplayFooter = $this->input->post('displayFooter', true);
        // Processing the left form
        if(isset($postTitle) && ($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->pagesModel->addPage($postTitle, $postURL, $postContent, $postDisplayFooter);
        }
        $data['display_footer'] = '1';
        $content = $this->load->view('dashboard/header_image', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }
    public function add_image(){
      
        $this->load->helper('url');
        // $this->load->model('ImageModel');
        $this->load->helper('form');     
  
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;            
                $this->load->library('upload', $config);                
                $this->upload->initialize($config);
        
    // if the file is uploaded
       if (!$this->upload->do_upload('userImage'))
        {
            $error = $this->upload->display_errors();
            //$this->load->view('dashboard/template', array('content' => $content));
            $response= array('status'=>false,'error_info'=>$error);
        }
        else
        {
            $file_name =$this->upload->data('file_name');            
            $path = $this->upload->data('file_path'); 
            $path = base_url().'uploads/';
         
            $response = array('status'=>true, 'img_tag'=>'<img src="'.$path.$file_name.'" alt="Your site" >');
            
           
        }
        echo json_encode($response);
            exit();

    

    }
    

}
