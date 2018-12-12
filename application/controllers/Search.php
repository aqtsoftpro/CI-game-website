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

class Search extends CI_Controller
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
        $data['title'] = 'Search';
        $this->load->model('KeywordsModel');
        $data['tags'] = $this->KeywordsModel->keywords_tags();
        $data['languages'] = $this->autoloadModel->getLanguages();
        $data['getCategories'] = $this->autoloadModel->getCategories();
        $data['getFooter'] = $this->autoloadModel->getFooter();
        $content = $this->load->view('front/search', $data, true);
        $this->load->model(array('searchModel'));
        $this->lang->load('front','english');
    }

    public function index(){
        $content = $this->load->view('front/search', $data, true);
        $this->load->view('front/template', array('content' => $content));
    }

    public function loadGames() 
    {
        $postSearch = $this->input->post('q', true);
        $postPageGame = $this->input->post('page',true);
        $postPageUser = $this->input->get('pu', true);
        if(!empty($postSearch)) {
            $data= $this->searchModel->search($postSearch, $postPageGame, $postPageUser);
            /*$this->load->library('pagination');
            $data['paginationGames'] = $this->pagination($postSearch, $data['nbGames'], 'pg');
            $data['paginationUsers'] = $this->pagination($postSearch, $data['nbUsers'], 'pu');
            $data['searchResult'] = $postSearch;*/
        } else {
            $data['nbGames'] = 0;
            $data['nbUsers'] = 0;
        } 
        echo $data['getSearchGames'];
        //$content = $this->load->view('front/search', $data, true);
        //$this->load->view('front/template', array('content' => $content));
    }

    // Update search via Ajax
    public function pagination($postSearch, $total_rows, $query_string_segment) 
    {
        $config["base_url"] = site_url('search?q='.$postSearch.'');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 20;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = $query_string_segment;
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
}
