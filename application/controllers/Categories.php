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

class Categories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($this->session->admin)) {
            redirect('/login/');
        }
        $content = $this->load->view('dashboard/categories', array(), true);
        $data['languages'] = $this->autoloadModel->getLanguages();
        $this->load->model(array('categoriesModel'));
        $this->load->model(array('KeywordsModel'));
       
    }

    public function index()
    {
        $data['title'] = $this->lang->line('categories');
        // Removing a Category
        $idCategory = $this->input->get('del', true);
        if(isset($idCategory) && !$this->config->item('demo')) {
            $data['msg'] = $this->categoriesModel->delCategorie($idCategory);
        }
        // View categories
        $data['getCategories'] = $this->categoriesModel->getCategories();
        // var_dump($data['getCategories']);
        // exit();
         $data['tags'] = $this->KeywordsModel->keywords_tags();
        $content = $this->load->view('dashboard/categories', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function add()
    {
        $data['title'] = $this->lang->line('categories');
        if($this->input->get('cat', true)) {
            $data['msg'] = alert('Please, you must add a category ! Then create your first game.');
        }
        // Processing the Add Form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('url', true);
        $postParentCat = $this->input->post('parent_cat', true);
        $display_front =0;
        if($this->input->post('fornt_display', true)){
            $display_front =1;
        }
        if(isset($postTitle) && ($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->categoriesModel->addCategorie($postTitle, $postURL, $postParentCat,$display_front);
        }
        $data['getListCats'] = $this->categoriesModel->getListCats();
        $content = $this->load->view('dashboard/categorie_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function edit($idCategory = '')
    {
        $data['title'] = $this->lang->line('categories');
        // Processing the Change Form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('url', true);
        $postParentCat = $this->input->post('parent_cat', true);
        $display_front =0;
        if($this->input->post('fornt_display', true)){
            $display_front =1;
        }
        if(isset($postTitle) && ($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->categoriesModel->editCategorie($idCategory, $postTitle, $postURL, $postParentCat,$display_front);
            redirect('dashboard/categories','refresh'); // redirecting back to main categoris page
        }
        $data = $this->categoriesModel->getCategorie($idCategory);
        $data['getListCats'] = $this->categoriesModel->getListCats($data['id_relation'], $idCategory);
        $content = $this->load->view('dashboard/categorie_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));

    }
}
