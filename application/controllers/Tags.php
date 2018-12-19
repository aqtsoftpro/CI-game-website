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

class Tags extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if($this->config->item('cache_activation') === 1) {
            $this->output->cache($this->config->item('cache_expire'));
        }
        if($this->config->item('cache_activation') === 2) {
            $this->output->delete_cache();
        }       
        $data['title'] = $this->config->item('sitename').' - '.$this->config->item('description');
        $data['getCategories'] = $this->autoloadModel->getCategories();
        $data['languages'] = $this->autoloadModel->getLanguages();
        $data['getFooter'] = $this->autoloadModel->getFooter();
        $content = $this->load->view('front/template', $data, true);
        $this->load->model(array('homeModel'));

        $this->lang->load('front','english');

        $this->load->model(array('KeywordsModel'));
        $data['tags'] = $this->KeywordsModel->keywords_tags();
    }

    public function index()
    {
        $data['tags'] = $this->KeywordsModel->keywords_tags();
        $data['tags_data'] = $this->KeywordsModel->getAllTags();
        $content = $this->load->view('front/tags',$data,true);
        $this->load->view('front/template', array('content' => $content));
        // var_dump($this->input->cookie());
        // exit();
    }
}
