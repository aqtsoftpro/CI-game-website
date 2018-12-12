<?php

class SearchModel extends CI_Model
{

    public function search($postSearch, $postPageGame, $postPageUser)
    {
        // Number of games results
        //echo $postSearch;
        $nbGames = $this->db->select('id, title, url, id_category, played, note, image, date_upload,video_url,description');
        $nbGames = $this->db->from('2d_games');
        $nbGames = $this->db->like('title', $postSearch);
        $nbGames = $this->db->or_like('url', $postSearch);
        $nbGames = $this->db->or_like('description', $postSearch);
        $nbGames = $this->db->get();
        $nbGames = $nbGames->num_rows();
        // Result for pagination
        $query = $this->db->select('id, title, url, id_category, played, note, image, date_upload,video_url,description');
        $query = $this->db->from('2d_games');
        $query = $this->db->like('title', $postSearch);
        $query = $this->db->or_like('url', $postSearch);
        $query = $this->db->or_like('description', $postSearch);
        //$query = $this->db->limit(100, $postPageGame);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $getSearchGames = '';
        foreach ($query->result() as $row) {
    //         $getSearchGames .= 
    //          '<div class="search-item">
				// 	<h3 class="h5 font-600 m-b-5"><a href="'.site_url('game/show/'.$row->url.'').'">'.$row->title.'</a></h3>
				// 	<div class="font-13 text-success m-b-10">
				// 		'.site_url('game/show/'.$row->url.'/').'
				// 	</div>
				// 	<p>'.$row->description.'</p>
				// </div>';
             $getSearchGames .= '<div class="col-sm-12  col-md-2 col-lg-game-'.$this->config->item('home_nb').' p-b-20">
                                <div class="game-list-box">
                                    <a href="'.site_url('game/show/'.$row->url).'/" class="image-popup" title="'.$row->title.'">
                                        <video autoplay loop muted playsinline>
                                            <source src="'.$row->video_url.'" type="video/mp4">
                                        </video>
                                        <img src="'.(empty($row->image) ? site_url('assets/images/default_swf.jpg') : $row->image).'" class="thumb-img" alt="work-thumbnail">
                                    </a>                          

                                    <div class="game-title">
                                        <h2 class="h5"><a href="'.site_url('game/show/'.$row->url).'" title="'.$row->title.'">'.mb_strimwidth($row->title, 0, 17, '...').'</a> </h2>
                                    </div>
                                </div>
                            </div>';
        }
        // Number of users results
        $nbUsers = $this->db->select('username, url, image, about');
        $nbUsers = $this->db->from('2d_users');
        $nbUsers = $this->db->like('url', $postSearch);
        $nbUsers = $this->db->or_like('username', $postSearch);
        $nbUsers = $this->db->or_like('about', $postSearch);
        $nbUsers = $this->db->get();
        $nbUsers = $nbUsers->num_rows();
        // Result for pagination
        $query = $this->db->select('username, url, image, about');
        $query = $this->db->from('2d_users');
        $query = $this->db->like('url', $postSearch);
        $query = $this->db->or_like('username', $postSearch);
        $query = $this->db->or_like('about', $postSearch);
        //$query = $this->db->limit(100, $postPageUser);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $getSearchUsers = '';
        foreach ($query->result() as $row) {
            $getSearchUsers .= 
             '<div class="search-item">
					<div class="media">
						<div class="media-left">
							<a href="'.site_url('/user/'.$row->url.'/').'"> <img class="media-object img-circle" alt="'.$row->username.'" src="'.(empty($row->image) ? site_url('assets/images/default-user.png') : site_url('uploads/images/users/'.$row->image)).'" style="width: 64px; height: 64px;"> </a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><a href="'.site_url('/user/'.$row->url.'/').'">'.$row->username.'</a></h4>
							<p>
								<b>About:</b>
								<br/>
								<span class="text-muted">'.$row->about.'</span>
							</p>
						</div>
					</div>
				</div>';
        }
        return $data = array(
         'getSearchGames' => $getSearchGames, 
         'nbGames' => $nbGames, 
         'getSearchUsers' => $getSearchUsers, 
         'nbUsers' => $nbUsers
         );
        //exit();
        return json_encode($data);
    }
}
