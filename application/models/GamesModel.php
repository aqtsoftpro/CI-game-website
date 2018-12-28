<?php

class GamesModel extends CI_Model
{

    public function getGames()
    {
        $getGames = '';
        $sql = "SELECT ga.id AS id, ga.title AS g_title, ga.url AS url, ga.played AS played, ga.status AS status, ga.date_upload AS date_upload,ga.video_url,ca.title, ga.display_home,ga.is_feature, ga.home_order, ga.feature_order, ca.title AS title_category FROM 2d_games ga, 2d_categories ca WHERE ga.id_category = ca.id ORDER BY id DESC, ga.home_order ASC, ga.feature_order ASC";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $status = ($row->status === '1') ? '<span class="label label-table label-success">Active</span>' : '<span class="label label-table label-inverse">Inactive</span>';
            $date_upload = date_parse($row->date_upload);
            $date_upload = $date_upload['day'].'/'.$date_upload['month'].'/'.$date_upload['year'];
            $getGames .=
                '<tr class="text-center">
					<td>'.$row->id.'</td>
					<td>'.$row->g_title.'</td>
					<td>'.$row->title_category.'</td>';
            if($row->display_home > 0){ $d_h = 'Yes'; }else{ $d_h = 'No'; }
            $getGames .= '<td>'.$d_h.' | '.$row->home_order.'</td>';
            if($row->is_feature > 0){ $i_f = 'Yes'; }else{ $i_f = 'No'; }
            $getGames .= '<td>'.$i_f.' | '.$row->feature_order.'</td>
					<td>'.$row->played.'</td>
					<td>'.$status.'</td>
					<td>'.$date_upload.'</td>
					<td>
						<a class="btn btn-icon waves-effect btn-primary waves-light btn-xs" href="'.site_url('game/show/'.$row->url.'/').'"> <i class="fa fa-search"></i> </a>
						<a class="btn btn-icon waves-effect btn-default waves-light btn-xs" href="'.site_url('dashboard/games/edit/'.$row->id.'/').'"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-icon waves-effect btn-danger waves-light btn-xs" href="'.site_url('dashboard/games/?del='.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>';
        }
        return $getGames;
    }

    public function getRelatedGamesByCategory($category_id)
    {
        $sql = "SELECT * FROM 2d_games WHERE id_category=? ORDER BY RAND() LIMIT 8";
        $query = $this->db->query($sql,array($category_id));
        foreach ($query->result() as $row) {
            // Comparison of dates for displaying the new tab on the game      

            $getBlocGame .= '<div class="game-div col-lg-game-'.$this->config->item('home_nb').'">
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
                                                                         
                                    
                                   
                            </div>';
        }
        return $getBlocGame;

    }
    public function getRecomendedgames()
    {   
        $sql ="SELECT * FROM 2d_games WHERE status = 1";
        $query = $this->db->query($sql);
        $nbRec = $query->num_rows();

        $sql = "SELECT * FROM 2d_games WHERE status = 1 ORDER BY RAND() DESC LIMIT 8";        
        $query = $this->db->query($sql);       ;
        foreach ($query->result() as $row) {
            // Comparison of dates for displaying the new tab on the game      

            $getRecGame .= '<div class="game-div col-lg-game-'.$this->config->item('home_nb').'">
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
                                                                         
                                    
                                   
                            </div>';
        }
        return array(
        'getRecGame'=> $getRecGame,
        'nbRec'=>$nbRec
        );
    }

    public function getCategories($idCategory = '')
    {
        $getCategories = '';
        $sql = "SELECT id, title FROM 2d_categories";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $select = ($idCategory === $row->id) ? 'selected' : '';
                $getCategories .= '<option value="'.$row->id.'" '.$select.'>'.$row->title.'</option>';
            }
        } else {
            redirect('/dashboard/categories/add/?cat=FALSE');
        }
        return $getCategories;
    }

    public function getKeywords($idGame)
    {
        $sql = "SELECT ids_keywords FROM 2d_games WHERE id = ?";
        $query = $this->db->query($sql, array($idGame));
        if($result = $query->row()) {
            $ids_keywords = explode(',', $result->ids_keywords);
        } else {
            $ids_keywords = array();
        }
        $sql = "SELECT id, title FROM 2d_keywords";
        $query = $this->db->query($sql);
        $getKeywords = '';
        foreach ($query->result() as $row) {
            $select = (in_array($row->id, $ids_keywords)) ? 'selected' : '';
            $getKeywords .= '<option value="'.$row->id.'" '.$select.'>'.$row->title.'</option>';
        }
        return $getKeywords;
    }

    public function getGame($idGame)
    {
        $sql = "SELECT ga.title AS title, ga.url AS url, id_category, ga.description AS description, ga.type AS type, ga.console AS console, ga.embed AS embed, ga.status AS status, ga.image AS image, ga.file AS file,ga.video_url,ga.display_home,ga.is_feature,ga.feature_order, ga.home_order, ca.title AS category, ca.id AS id_category FROM 2d_games ga, 2d_categories ca WHERE ((ga.id = ?) AND (ga.id_category = ca.id))";
        $query = $this->db->query($sql, array($idGame));
        if($result = $query->row()) {
            return array(
                'title_game'       => $result->title,
                'url_game'         => $result->url,
                'description_game' => $result->description,
                'id_category'      => $result->id_category,
                'category_game'    => $result->category,
                'type_game'        => $result->type,
                'console'          => $result->console,
                'embed_url'        => $result->embed,
                'status_game'      => $result->status,
                'image'            => $result->image,
                'file'             => $result->file,
                'video_url'        => $result->video_url,
                'display_home'     => $result->display_home,
                'is_feature'       => $result->is_feature,
                'home_order'    =>$result->home_order,
                'feature_order'    =>$result->feature_order
            );
        } else {
            return null;
        }
    }

    public function addGame($postTitle, $postURL, $postDescription,$control, $postIdCategory, $postStatus,$videoURL,$displayHome,$isFeature,$home_order,$feature_order)
    {
        $sql = "SELECT title, url FROM 2d_games WHERE title = ? OR url = ?";
        $query = $this->db->query($sql, array($postTitle, $postURL));
        if($query->num_rows() > 0) {
            $msg = alert('The game already exists', 'danger');
        } else {
            if($home_order == '') { $home_order = '99999'; }
            if($feature_order == '') { $feature_order = '99999'; }
            $sql = "INSERT INTO 2d_games SET title = ?, url = ?, description = ?,control=?, id_category = ?, status = ?, date_upload=?, video_url=?,display_home=?,is_feature=?, home_order=?,feature_order=?";
            $this->db->query($sql, array($postTitle, $postURL, $postDescription,$control, $postIdCategory, $postStatus, date("Y-m-d H:i:s"),$videoURL,$displayHome,$isFeature,$home_order,$feature_order));
            $msg = alert('The game was created. <a href="/dashboard/games/edit/'.$this->db->insert_id().'">Edit it</a> now !');
        }
        //echo $this->db->last_query();  exit;
        return $msg;
    }

    public function editGame($idGame, $postTitle, $postURL, $postDescription,$controls, $postIdCategory, $postKeywords, $postType, $postEmbed, $postConsole, $postStatus,$videoURL,$displayHome,$isFeature,$home_order, $feature_order)
    {
        $sql = "SELECT title, url FROM 2d_games WHERE title = ? OR url = ?";
        $query = $this->db->query($sql, array($postTitle, $postURL));
        if($home_order == '') { $home_order = '99999'; }
        if($feature_order == '') { $feature_order = '99999'; }
        if($result = $query->row()) {
            if($result->title === $postTitle) {
                $sql = "UPDATE 2d_games SET url = ?, description = ?,control=?, id_category = ?, ids_keywords = ?, type = ?, embed = ?, console = ?, status = ?,video_url= ?,display_home=?,is_feature=?,home_order=?, feature_order=? WHERE id = ?";
                $this->db->query($sql, array($postURL, $postDescription,$controls, $postIdCategory, $postKeywords, $postType, $postEmbed, $postConsole, $postStatus, $videoURL,$displayHome,$isFeature, $home_order, $feature_order,$idGame));
                $msg = alert('Saved changes');
            } elseif($result->url === $postURL) {
                $sql = "UPDATE 2d_games SET title = ?, description = ?,control=?, id_category = ?, ids_keywords = ?, type = ?, embed = ?, console = ?, status = ?,video_url=?,display_home=?,is_feature=?, home_order=?,feature_order=? WHERE id = ?";
                $this->db->query($sql, array($postTitle, $postDescription, $controls, $postIdCategory, $postKeywords, $postType, $postEmbed, $postConsole, $postStatus, $videoURL,$displayHome,$isFeature,$home_order,$feature_order,$idGame));
                $msg = alert('Saved changes');
            }
        } else {
            $sql = "UPDATE 2d_games SET title = ?, url = ?, description = ?,control=?, id_category = ?, ids_keywords = ?, type = ?, embed = ?, console = ?, status = ?,video_url,display_home=?,is_feature=?, home_order=?,feature_order=? WHERE id = ?";
            $this->db->query($sql, array($postTitle, $postURL, $postDescription,$controls, $postIdCategory, $postKeywords, $postType, $postEmbed, $postConsole, $postStatus,$videoURL,$displayHome,$isFeature,$home_order,$feature_order, $idGame));
            $msg = alert('Saved changes');
        }
        //echo $this->db->last_query();  exit;
        return $msg;
    }

    public function updateImage($idGame, $imgGame)
    {
        $sql = "UPDATE 2d_games SET image = ? WHERE id = ?";
        $this->db->query($sql, array($imgGame, $idGame));
    }

    public function updateFile($idGame, $fileGame)
    {
        $sql = "UPDATE 2d_games SET file = ? WHERE id = ?";
        $this->db->query($sql, array($fileGame, $idGame));
    }

    public function delGame($idGame)
    {
        // Removing image and swf related to the game
        $sql = "SELECT image, file FROM 2d_games WHERE id = ?";
        $query = $this->db->query($sql, array($idGame));
        if($result = $query->row()) {
            if(!empty($result->image)) {
                $file = 'uploads/images/games/'.$result->image;
                if(is_readable($file)) {
                    unlink($file);
                }
            }
            if(!empty($result->file)) {
                $file = 'uploads/files/games/'.$result->file;
                if(is_readable($file)) {
                    unlink($file);
                }
            }
        }
        // Removing comments related to the game
        $sql = 'DELETE FROM 2d_comments WHERE id_game = ?';
        $this->db->query($sql, array($idGame));
        // Removing favorites related to the game
        $sql = 'DELETE FROM 2d_favorites WHERE id_game = ?';
        $this->db->query($sql, array($idGame));
        // Removing notes related to the game
        $sql = 'DELETE FROM 2d_notes WHERE id_game = ?';
        $this->db->query($sql, array($idGame));
        // Removing the game
        $sql = 'DELETE FROM 2d_games WHERE id = ?';
        $this->db->query($sql, array($idGame));
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
    public function addPlayedGames($game_id,$ip){
        date_default_timezone_set("Asia/Karachi");
        $data=array(
            'game_id'=>$game_id,
            'ip_add'=>$ip,
            'created_at'=>date("Y-m-d H:i:s")
        );
        $sql ="SELECT * FROM `2d_played` WHERE `game_id`=? AND `ip_add`= ?";
        $query = $this->db->query($sql,array($game_id,$ip));
        $palyed_game =  $query->row();
        // return (int)$palyed_game->id;    
        if($query->num_rows()==NULL){
            $this->db->insert('2d_played',$data);
            //return $this->db->last_query();
        }else{
            $id = (int)$palyed_game->id;
            $this->db->where('id',$id);
            $this->db->update('2d_played',$data);
            //return $this->db->last_query();      
        }

    }
    public function getPlayedGames($ip){
        $sql ="SELECT 2d_played.game_id,2d_played.created_at,2d_games.title, 2d_games.url, 2d_games.id_category, 2d_games.played, 2d_games.note, 2d_games.image, 2d_games.date_upload,2d_games.video_url,2d_games.is_feature FROM `2d_played` INNER JOIN `2d_games` ON 2d_played.game_id=2d_games.id WHERE `ip_add`= ? ORDER BY 2d_played.created_at DESC LIMIT 8";

        $query = $this->db->query($sql,array($ip));
        $getBlocGame='<div class="played_games text-center"><div class="card-box-sm"><h4>Your Played<br>Games</h4></div></div>';
        foreach($query->result() as $row){
            $getBlocGame .= '<div class="game-div col-lg-game-'.$this->config->item('home_nb').'">
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
                                                                       
                            </div>';
        }
        return $getBlocGame;

    }
    public function getPlayedGames_main($ip){
        $sql ="SELECT 2d_played.game_id,2d_games.title, 2d_games.url, 2d_games.id_category, 2d_games.played, 2d_games.note, 2d_games.image, 2d_games.date_upload,2d_games.video_url,2d_games.is_feature FROM `2d_played` INNER JOIN `2d_games` ON 2d_played.game_id=2d_games.id WHERE `ip_add`= ? ORDER BY created_at DESC";

        $query = $this->db->query($sql,array($ip));
        $getBlocGame='';
        foreach($query->result() as $row){
            $getBlocGame .= '<div class="game-div col-lg-game-'.$this->config->item('home_nb').'">
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
                                                                       
                            </div>';
        }
        return $getBlocGame;

    }

}
