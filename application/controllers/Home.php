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

class Home extends CI_Controller
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
        $this->load->model(array('homeModel','GamesModel'));

        $this->lang->load('front','english');

        $this->load->model(array('KeywordsModel'));
        $data['tags'] = $this->KeywordsModel->keywords_tags();
    }

    public function index()
    {
        $data['tags'] = $this->KeywordsModel->keywords_tags();
        $search = $_REQUEST['q'];
        $getOrder = $this->uri->segment(1);
        $data['getBlocGame'] = $this->homeModel->getBlocsGame($getOrder, 1,$search);
        $content = $this->load->view('front/index',$data,true);
        $this->load->view('front/template', array('content' => $content));

        // var_dump($this->input->cookie());
        // exit();
    }
    public function loadGames($getOrder = '', $getPag = '',$search='')
    {

        // Displaying all the games with pagination
        $getPag = $this->input->post('page');
        $getOrder = $this->input->post('orderby');
        $search= $this->input->post('search');
        // echo $getOrder;
        // echo 'search'.$search;    
        $data = $this->homeModel->getBlocsGame($getOrder, $getPag,$search);
        echo $data['getBlocGame'];
        //echo "<pre>";
        //    print_r($data);
        //echo "</pre>";
        // Displaying pagination
        //$this->load->library('pagination');
        //$segment2 = $this->uri->segment(1, 0);
        //if($segment2 === 'news' || $segment2 === 'popular' || $segment2 === 'rated') {
        //    $segment2 = $segment2;
        //} else {
            //$segment2 = '';
        //}
        //$config["base_url"] = site_url($segment2);
        //$config['total_rows'] = $data['nbRows'];
        //$config['per_page'] = $this->config->item('home_pag');
        //$this->pagination->initialize($config);
        //$data['pagination'] = $this->pagination->create_links();
        //$content = $this->load->view('front/home', $data, true);
        //$this->load->view('front/template', array('content' => $content));
    }

    public function loadFavGames(){
        $fav_ids = $this->input->post('fav_ids');
        $fav_games = $this->homeModel->getFavGames($fav_ids);
        echo $fav_games;
        exit;
    }
     public function played_games()
    {
        $data['tags'] = $this->KeywordsModel->keywords_tags();
        $data['getBlocGame'] = $this->homeModel->getBlocsGame($getOrder, 1,$search);
        $content = $this->load->view('front/index',$data,true);
        $search = $_REQUEST['q'];
      
        
        
        $ip=$this->input->ip_address();
        $data['getBlocGame'] = $this->GamesModel->getPlayedGames_main($ip);
        $content = $this->load->view('front/user_game',$data,true); 

        
        
        $getOrder = $this->uri->segment(1);
        
    
        $this->load->view('front/template', array('content' => $content));

        // var_dump($this->input->cookie());
        // exit();
    }
}
