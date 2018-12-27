<?php

class HomeModel extends CI_Model
{

    public function getBlocsGame($getOrder, $getPag,$search)
    {
        $getPag = $getPag*(int)$this->config->item('home_pag')-(int)$this->config->item('home_pag');
        if($getOrder === 'rated') {
            $sql = "SELECT id, title, url, id_category, played, note, image, date_upload,video_url, is_feature FROM 2d_games WHERE";
            if($search){
                $sql.=" title like '%$search%' and ";
            }
            $sql.=" status = 1 and display_home=1 GROUP BY id ORDER BY note DESC";
        }
        elseif($getOrder === 'news') {
            $sql = "SELECT id, title, url, id_category, played, note, image, date_upload,video_url,is_feature FROM 2d_games WHERE";
            if($search){
                $sql.=" title like '%$search%' and ";
            }
            $sql.=" status = 1 GROUP BY id DESC";
        }
        elseif($getOrder === 'popular') {
            $sql = "SELECT id, title, url, id_category, played, note, image, date_upload,video_url,is_feature FROM 2d_games WHERE";
            if($search){
                $sql.=" title like '%$search%' and ";
            }
            $sql.=" status = 1 and display_home=1 GROUP BY id ORDER BY played DESC";

        }
        elseif($getOrder === 'featured') {
            $sql = "SELECT id, title, url, id_category, played, note, image, date_upload,video_url,feature_order FROM 2d_games WHERE";

            if($search){
                $sql.=" title like '%$search%' and ";
            }
            $sql.=" status = 1 and is_feature=1 ORDER BY feature_order ASC";
        } 
        else{
            $sql = "SELECT id, title, url, id_category, played, note, image, date_upload,video_url FROM 2d_games WHERE ";
            if($search){
                $sql.=" title like '%$search%' and ";
            }
            $sql.=" status = 1 and display_home=1 GROUP BY id ORDER BY home_order ASC, title ASC, date_publish ASC ";
        }
        $limit = ' limit '.(int)$getPag.','.(int)$this->config->item('home_pag');
        $sql.=$limit;
        $query = $this->db->query($sql);
        /*echo $this->db->last_query($query);*/

        $nbRows = $this->db->count_all('2d_games');
        $getBlocGame = '';
        foreach ($query->result() as $row) {
            // Comparison of dates for displaying the new tab on the game
            $date_upload = date_parse($row->date_upload);
            $datetime1 = date_create($date_upload['year'].'-'.$date_upload['month'].'-'.$date_upload['day']);
            $datetime2 = date_create(date("Y-m-d"));
            $interval = date_diff($datetime1, $datetime2);
            $time = $interval->format('%a');
            $classShow = ($time<=90)?'show':'';
            $getBlocGame .= '<li class="game-div col-lg-game-'.$this->config->item('home_nb').'">
                                <!--<div class="inner-div">-->
                                <div class="game-list-box">
                                    <a href="'.site_url('game/'.$row->url).'/" class="image-popup" title="'.$row->title.'">
                                        <video autoplay loop muted playsinline>
                                            <source src="'.$row->video_url.'" type="video/mp4">
                                        </video>
                                        <img src="'.(empty($row->image) ? site_url('assets/images/default_swf.jpg') : $row->image).'" class="thumb-img" alt="work-thumbnail">
                                    </a>

                                    <!--<div class="game-action '.$classShow.'">
                                        <a href="'.site_url('news/').'" class="btn btn-warning btn-sm">New</a>
                                    </div>--> 
                                </div>
                                    

                               <!-- </div>-->
                                <div class="game-title">
                                        <h2 class="h5"><a href="'.site_url('game/'.$row->url).'" title="'.$row->title.'">'.mb_strimwidth($row->title, 0,22, '...').'</a></h2>
                                 </div>
                                     '.rating($this->getNote($row->id), 'game-rating').'<span class="p-num">'.$row->played.'&nbsp;plays</span>
                                                                         
                                    
                                   
                            </li>';
        }
        return array(
         'getBlocGame' => $getBlocGame,
         'nbRows'      => $nbRows
         );
        exit;
    }

    public function getNote($idGame)
    {
        $sql = "SELECT note FROM 2d_notes WHERE id_game = ?";
        $query = $this->db->query($sql, array($idGame));
        if($query->num_rows() > 0) {
            $note = 0;
            $i = 0;
            foreach ($query->result() as $row) {
                $note = $note + $row->note;
                $i++;
            }
            $note = $note / $i;
        } else {
            $note = 0;
        }
        return $note;
    }

    public function getFavGames($fav_ids){
        $fav_ids = implode(',',$fav_ids);
        $sql = "select * from 2d_games where id in($fav_ids)";
        $query = $this->db->query($sql);
        $getBlocGame ="";
        foreach($query->result() as $row){
            $getBlocGame .= '<li class="game-div col-lg-game-'.$this->config->item('home_nb').'">
                                <!--<div class="inner-div">-->
                                <div class="game-list-box">
                                    <a href="'.site_url('game/'.$row->url).'/" class="image-popup" title="'.$row->title.'">
                                        <video autoplay loop muted playsinline>
                                            <source src="'.$row->video_url.'" type="video/mp4">
                                        </video>
                                        <img src="'.(empty($row->image) ? site_url('assets/images/default_swf.jpg') : $row->image).'" class="thumb-img" alt="work-thumbnail">
                                    </a>

                                    <!--<div class="game-action '.$classShow.'">
                                        <a href="'.site_url('news/').'" class="btn btn-warning btn-sm">New</a>
                                    </div>--> 
                                </div>
                                    

                               <!-- </div>-->
                                <div class="game-title">
                                        <h2 class="h5"><a href="'.site_url('game/'.$row->url).'" title="'.$row->title.'">'.mb_strimwidth($row->title, 0,22, '...').'</a></h2>
                                 </div>
                                     '.rating($this->getNote($row->id), 'game-rating').'<span class="p-num">'.$row->played.'&nbsp;plays</span>
                                                                         
                                    
                                   
                            </li>';
        }
        return $getBlocGame;
    }

}
