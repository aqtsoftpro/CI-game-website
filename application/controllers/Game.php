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

class Game extends CI_Controller
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
        $this->load->library('user_agent');
        $this->load->model(array('KeywordsModel'));
        $data['languages'] = $this->autoloadModel->getLanguages();
        $data['tags'] = $this->KeywordsModel->keywords_tags();
        $data['getCategories'] = $this->autoloadModel->getCategories();
        $data['getFooter'] = $this->autoloadModel->getFooter();
        $content = $this->load->view('front/template', $data, true);
        $this->load->model(array('gameModel'));
        $this->load->model(array('PagesModel'));
        $this->load->model(array('GamesModel'));
        $this->load->model(array('CommentsModel'));
    }

    public function show($getUrl = '', $getPag = '')
    {
        // Get game data
        $data = $this->gameModel->getGame($getUrl);
        $data['title'] = $data['title_game'].' - '.$data['category'].' - '.$this->config->item('description');
        // Get best games of the category (note)
        $data['getBestGamesNote'] = $this->gameModel->getBestGamesNote($data['id_category']);
        // Get best games in the category (click)
        $data['getBestGamesClic'] = $this->gameModel->getBestGamesClic($data['id_category']);
        // Get users who have the game in favorite
        $data['getUsersFav'] = $this->gameModel->getUsersFav($data['id']);
        // Comment form processing
        $postCom = $this->input->post('com_message', true);
        $postRelated = $this->input->post('related', true);
        if(isset($this->session->id) && ($postCom) != '') {
            $this->gameModel->addCom($data['id'], $postCom, $postRelated);
        }
        // Add / remove site to favorites
        $postFav = $this->input->get('fav', true);
        if($postFav != '' && isset($this->session->id)) {
            if($postFav === 'add') {
                $this->gameModel->addFav($data['id']);
            }
            if($postFav === 'del') {
                $this->gameModel->delFav($data['id']);
            }
        }
        // Get average score
        $data = array_merge($data, $this->gameModel->getNote($data['id']));
        // Get keywords
        $data['getKeywords'] = $this->gameModel->getKeywords($data['ids_keywords']);
        // Get user data (game as favorites)
        if(isset($this->session->id)) {
            $data['getFav'] = $this->gameModel->getFav($data['id']);
        } else {
            $data['getFav'] = 0;
        }
        // Get comments with pagination
        $data['getBestComs'] = $this->gameModel->getComs($data['id'], $getPag, true);
        $data = array_merge($data, $this->gameModel->getComs($data['id'], $getPag));
        $data['getPagination'] = $this->createPagination(site_url('game/show/'.$data['url'].'/'), $data['nbRows'], $this->config->item('coms_pag'));
        $content = $this->load->view('front/game', $data, true);
        $this->load->view('front/template', array('content' => $content));
    }

    public function play($getUrl = '', $getPag = '')
    {     

        // Get game data
        $data = $this->gameModel->getGame($getUrl);
        var_dump($data);
        exit();

        $ip = $this->input->ip_address();        
        //adding played games using ip
        $this->GamesModel->addPlayedGames($data['id'],$ip); 
      
        $control_array = array_map('intval', explode(',', $data['control']));       
        if($control_array[0]==0) {
        $data['controls'] = '';         
        }else{        
        $data['controls']=$this->gameModel->getGameControls($control_array);
        }


        //$data['getPlayedGames'] = $this->GamesModel->getPlayedGames($ip);

        $data['ClickLikes'] = $this->gameModel->checkLikesComs_ip($data['id']);     

        $data['title'] = $data['title_game'].' - '.$data['category'].' - '.$this->config->item('description');
        // Added game statistics (nb of * played)
        $this->gameModel->updateGameStat($data['id']);
        // Get games of the category (note)
        $data['getBestGamesNote'] = $this->gameModel->getBestGamesNote($data['id_category']);
        // Get games in the category (click)
        $data['getBestGamesClic'] = $this->gameModel->getBestGamesClic($data['id_category']);
        // Get users who have the game in favorite
        $data['getUsersFav'] = $this->gameModel->getUsersFav($data['id']);
        // $data = array_merge($data, $this->userModel->getFavsGames($data['id']));
        
      
            /*$postCom = $this->input->post('com_message', true);
            $postRelated = $this->input->post('related', true);
            if(isset($postCom) && ($postCom != '')) {
                $this->session->set_userdata('commented',$data['id']);
                $this->gameModel->addCom($data['id'], $postCom, $postRelated);
                redirect($this->agent->referrer(), 'refresh');
            }*/
      
        // Add / remove site to favorites
        $postFav = $this->input->get('fav', true);
        if($postFav != '' && isset($this->session->id)) {
            if($postFav === 'add') {
                $this->gameModel->addFav($data['id']);
            }
            if($postFav === 'del') {
                $this->gameModel->delFav($data['id']);
            }
        }
        // Get average score
        $data = array_merge($data, $this->gameModel->getNote($data['id']));
        // Get keywords
        $data['getKeywords'] = $this->gameModel->getKeywords($data['ids_keywords']);
        // Get user data (game as favorites)
        if(isset($this->session->id)) {
            $data['getFav'] = $this->gameModel->getFav($data['id']);
        } else {
            $data['getFav'] = 0;
        }
        $data['getPages'] = $this->PagesModel->getAllPages();
        $data['getRelatedGames'] = $this->GamesModel->getRelatedGamesByCategory($data['id_category']);
       
       $data['getRecGame']=$this->GamesModel->getRecomendedgames();
       // var_dump($this->session->userdata());

       // Get comments with pagination
        /*$data['getBestComs'] = $this->gameModel->getComs($data['id'], $getPag, true);
        $data = array_merge($data, $this->gameModel->getComs($data['id'], $getPag));
        $data['getPagination'] = $this->createPagination(site_url('game/play/'.$data['url'].'/'), $data['nbRows'], $this->config->item('coms_pag'));*/

       //////////////////////////
     
        $content = $this->load->view('front/game_play', $data, true);

        $this->load->view('front/template', array('content' => $content));
    }
    public function getPlayedGames(){

        $ip=$this->input->ip_address();
        $getPlayedGames = $this->GamesModel->getPlayedGames($ip);
        echo $getPlayedGames['getBlockGame'];
        if($getPlayedGames['nbPlayed']>9){
            echo '<div class="col-sm-12 play_show_more-right text-center">
                <a href="'.base_url('home/played_games').'" class="btn btn-primary show_more" >Show More</a>
                </div>';
        }
    }

    public function createPagination($baseUrl, $totalRows, $perPage)
    {

        $this->load->library('pagination');
        $config["base_url"] = $baseUrl;
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config['use_page_numbers'] = FALSE;
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    // Update of the note via Jquery
    public function updateNote($idGame, $score)
    {
        
        $this->gameModel->updateNote($idGame, $score);
      

        
    }

    // Update likes in comments via Jquery
    public function likesComs($idCom, $likeType)
    {   
        $idCom = $this->uri->segment(3,0);
        $likeType=$this->uri->segment(4,0);

        // if(isset($this->input->ip_address())) {
        $this->gameModel->likesComs_ip($idCom, $likeType);

        $data  = $this->gameModel->checkLikesComs_ip($idCom);
        echo json_encode($data);
        exit();
        // }
        //echo $idCom.$likeType;
        //echo 'segment 3:'.$idCom.'likeType'.$likeType;
      
        //echo $this->input->ip_address();
    }
    public function makeFavorite(){
        $game_id = $this->input->post('game_id');
        $ip = $this->input->ip_address();
        $this->GamesModel->makeFavorite($game_id,$ip);
    }
    public function checkfavorite(){
        $game_id = $this->input->post('game_id');
        $ip = $this->input->ip_address();
        echo $this->GamesModel->checkFavorite($game_id,$ip);
        exit;
    }
    public function getComments(){
        $game_id = $this->input->post('game_id');
        $page = $this->input->post('page');
        $data = $this->gameModel->getComs($game_id, $page, true);
        //$pagination =  $this->createPagination(site_url('game/show/'.$data['url'].'/'), $data['nbRows'], $this->config->item('coms_pag'));
        echo $data['getComs'];
        //echo "<div class='col-md-12 text-center'>".$pagination."</div>";
    }
    public function postComment(){
        $postCom = $this->input->post('com_message', true);
        $postRelated = $this->input->post('related', true);
        $game_id = $this->input->post('game_id', true);
        if(isset($postCom) && $postCom != '') {
            $this->session->set_userdata('commented',$game_id);
            $this->gameModel->addCom($game_id, $postCom, $postRelated);
        }
    }
}
