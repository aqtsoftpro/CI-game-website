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

class Games extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!isset($this->session->admin)) {
            redirect('/login/');
        }
        
        $data['languages'] = $this->autoloadModel->getLanguages();
        $content = $this->load->view('dashboard/games', array(), true);
        $this->load->model(array('gamesModel','controlModel','keywordsModel'));
    }

    public function index()
    {
        $data['title'] = $this->lang->line('games');
        // Deleting a Game
        $idGame = $this->input->get('del', true);
        if(isset($idGame) && !$this->config->item('demo')) {
            $this->gamesModel->delGame($idGame);
        }
        // Viewing Games
        $data['getGames'] = $this->gamesModel->getGames();
        $content = $this->load->view('dashboard/games', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function add()
    {
        $data['title'] = $this->lang->line('games');
        // Processing the Add Form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('embed', true);
        $postDescription = $this->input->post('description', true);
        $postIdCategory = $this->input->post('category', true);
        $postStatus = $this->input->post('status', true);        
        $postVideo = $this->input->post('video_url', true);
        $home_order=$this->input->post('home_order',true);
        $feature_order=$this->input->post('feature_order',true);
        $controls = $this->input->post('controls', true);
        $controls = (!empty($controls)) ? implode(",", array_map('intval', $controls)) : $controls; 
          
        $displayHome = 0;
        $isFeature = 0;
   

        // Processing the form for sending the image
        if(null !== $this->input->post('embedImage', true) && !$this->config->item('demo')) {
            $config['upload_path']   = './uploads/images/games/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size']      = 1000;
            $config['max_width']     = 2048;
            $config['max_height']    = 1536;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userImage')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $data['msg'] = alert('The file was successfully sent');
                $gameCover =base_url('uploads/images/games/'.$this->upload->data('file_name'));
            }
        }

       
        if($this->input->post('display_home',true)){
            $displayHome = 1;
        }
        if($this->input->post('is_feature',true)){
            $isFeature = 1;
        }

        if(($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->gamesModel->addGame($postTitle, $postURL, $postDescription,$controls, $postIdCategory,$postStatus,$gameCover,$postVideo,$displayHome,$isFeature,$home_order,$feature_order);
           
        }
        $data['status_game'] = '1';
        // Retrieving categories
        $data['getCategories'] = $this->gamesModel->getCategories();
        //Retrieving the controls
        $data['controls'] = $this->controlModel->getAllControls();
        //getting the keywords
        $data['getKeywords'] = $this->gamesModel->getKeywords();

        $content = $this->load->view('dashboard/game_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }

    public function edit($idGame = '')
    {
        $data['title'] = $this->lang->line('games');
        // Processing the Change Form
        $postTitle = $this->input->post('title', true);
        $postURL = $this->input->post('url', true);
        $postDescription = $this->input->post('description', true);
        $postIdCategory = $this->input->post('category', true);
        $postKeywords = $this->input->post('keywords', true);
        $postKeywords = (!empty($postKeywords)) ? implode(",", $postKeywords) : $postKeywords;
        $postType = $this->input->post('type', true);
        $postEmbed = $this->input->post('embed', true);
        $postConsole = $this->input->post('console', true);
        $postStatus = $this->input->post('status', true);
        $postVideo = $this->input->post('video_url', true);
        $home_order=$this->input->post('home_order', true);
        $feature_order=$this->input->post('feature_order', true);
        $controls = $this->input->post('controls', true);
        $controls = (!empty($controls)) ? implode(",", array_map('intval', $controls)) : $controls;



        $displayHome = 0;
        $isFeature = 0;

        if($this->input->post('display_home',true)){
            $displayHome = 1;
        }
        if($this->input->post('is_feature',true)){
            $isFeature = 1;
        }
        
        if(isset($_FILES['game_video'])){
            $upload_path = './uploads/videos/';
            $temp_name = $_FILES['game_video']['tmp_name'];
            $file_name = $upload_path.$_FILES['game_video']['name'];
            if(move_uploaded_file($temp_name,$file_name)){
                $postVideo = site_url('uploads/videos/'.$_FILES['game_video']['name']);
            }
        }

        if(isset($postTitle) && ($postTitle) != '' && !$this->config->item('demo')) {
            if($postURL == '') {
                $postURL = url_title(convert_accented_characters($postTitle), $separator = '-', $lowercase = true);
            } else {
                $postURL = url_title(convert_accented_characters($postURL), $separator = '-', $lowercase = true);
            }
            $data['msg'] = $this->gamesModel->editGame($idGame, $postTitle, $postURL, $postDescription, $controls, $postIdCategory, $postKeywords, $postType, $postEmbed, $postConsole, $postStatus,$postVideo,$displayHome, $isFeature,$home_order,$feature_order);
        
        }
        // Processing the form for sending the image
        if(null !== $this->input->post('hiddenImage', true) && !$this->config->item('demo')) {
            $config['upload_path']   = './uploads/images/games/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size']      = 1000;
            $config['max_width']     = 2048;
            $config['max_height']    = 1536;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userImage')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $data['msg'] = alert('The file was successfully sent');
                $this->gamesModel->updateImage($idGame, site_url('uploads/images/games/'.$this->upload->data('file_name')));
            }
        }
        // Processing the form for sending the swf file
        if(null !== $this->input->post('hiddenFile', true) && !$this->config->item('demo')) {
            $config['upload_path']   = './uploads/files/games/';
            $config['allowed_types'] = (($this->config->item('roms')) ? '*' : 'swf');
            $config['max_size']      = 30000;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userFile')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $data['msg'] = alert('The file was successfully sent');
                $this->gamesModel->updateFile($idGame, $this->upload->data('file_name'));
            }
        }
        // Recovering game data
        $data = array_merge($data, $this->gamesModel->getGame($idGame));   

        // Retrieving categories
        $data['getCategories'] = $this->gamesModel->getCategories($data['id_category']);
        //getting all controls
        $data['controls'] = $this->controlModel->getAllControls();
        //getting game controls
        $data['gControls'] =$this->controlModel->getGameControl($idGame);       
      
        // Retrieving keywords
        $data['getKeywords'] = $this->gamesModel->getKeywords($idGame);
        $content = $this->load->view('dashboard/game_edit', $data, true);
        $this->load->view('dashboard/template', array('content' => $content));
    }
}
