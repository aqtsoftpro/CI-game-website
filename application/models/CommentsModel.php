<?php

class CommentsModel extends CI_Model
{

    public function getComments() 
    {
        $getComments = '';
        $sql = "SELECT co.id AS id, co.comment AS comment, co.id_game AS id_game, co.date_creation AS date_creation, co.ip AS ip, us.id AS id_user, us.username AS username, ga.title AS title, ga.url AS url FROM 2d_comments co, 2d_users us, 2d_games ga WHERE co.id_user = us.id AND co.id_game = ga.id";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $uploaded = timespan(strtotime($row->date_creation), time(), 1);
            $getComments .= 
             '<tr class="text-center">
					<td>'.$row->id.'</td>
					<td>'.$row->username.'</td>
					<td>'.$row->comment.'</td>
					<td>'.$row->title.'</td>
					<td>'.$uploaded.'</td>
					<td>'.$row->ip.'</td>
					<td>
						<a class="btn btn-icon waves-effect btn-primary waves-light btn-xs" href="'.site_url('game/show/'.$row->url.'/').'"><i class="fa fa-search"></i> </a>
						<a class="btn btn-icon waves-effect btn-default waves-light btn-xs" href="'.site_url('dashboard/comments/edit/'.$row->id.'/').'"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-icon waves-effect btn-danger waves-light btn-xs" href="'.site_url('dashboard/comments/?del='.$row->id.'&id='.$row->id_user).'"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>';
        }
        return $getComments;
    }

    public function getUsers($idUser = '') 
    {
        $getUsers = '';
        $sql = "SELECT id, username FROM 2d_users";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $select = ($idUser === $row->id) ? 'selected' : '';
            $getUsers .= '<option value="'.$row->id.'" '.$select.'>'.$row->username.'</option>';
        }
        return $getUsers;
    }

    public function getGames($idGame = '') 
    {
        $getGames = '';
        $sql = "SELECT id, title FROM 2d_games";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $select = ($idGame === $row->id) ? 'selected' : '';
            $getGames .= '<option value="'.$row->id.'" '.$select.'>'.$row->title.'</option>';
        }
        return $getGames;
    }

    public function getComment($idComment) 
    {
        $sql = "SELECT comment, id_user, id_game FROM 2d_comments WHERE id = ?";
        $query = $this->db->query($sql, array($idComment));
        if($result = $query->row()) {
            return array(
             'comment' => $result->comment,
             'id_game' => $result->id_game,
             'id_user' => $result->id_user
             );
        } else {
            return null;
        }
    }

    public function addComment($postAuthor, $postComment, $postGame) 
    {        
        $sql = "INSERT INTO 2d_comments (id_user, comment, id_game, date_creation, ip) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql, array($postAuthor, $postComment, $postGame, date("Y-m-d H:i:s"), $this->input->ip_address()));
        $this->updateComs($postAuthor);
        $msg = alert('The comment was created. <a href="/dashboard/comments/edit/'.$this->db->insert_id().'">Edit it</a> now !');
        return $msg;
    }

    public function editComment($idComment, $postAuthor, $postComment, $postGame) 
    {
        $sql = "UPDATE 2d_comments SET id_user = ?, comment = ?, id_game = ? WHERE id = ?";
        $this->db->query($sql, array($postAuthor, $postComment, $postGame, $idComment));
        $msg = alert('Saved changes');
        return $msg;
    }

    public function delComment($idComment, $idUser)
    {
        $sql = 'DELETE FROM 2d_comments WHERE id = ?';
        $this->db->query($sql, array($idComment));
        $this->updateComs($idUser);
    }

    public function updateComs($idUser)
    {
        $sql = 'SELECT id FROM 2d_comments WHERE id_user = ?';
        $query = $this->db->query($sql, array($idUser));
        $sql = "UPDATE 2d_users SET nb_coms = ? WHERE id = ?";
        $this->db->query($sql, array($query->num_rows(), $idUser));
    }

    public function user_addComment($postAuthor, $postComment, $postGame) 
    {        
        $sql = "INSERT INTO 2d_comments (id_user, comment, id_game, date_creation, ip) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql, array($postAuthor, $postComment, $postGame, date("Y-m-d H:i:s"), $this->input->ip_address()));
        $this->updateComs($postAuthor);
        $msg = alert('The comment was created. <a href="/dashboard/comments/edit/'.$this->db->insert_id().'">Edit it</a> now !');
    return $msg;
    }
    public function getComment_game($game_id) 
    {
        $sql = "SELECT 2d_comments.id,2d_comments.comment,2d_comments.date_creation,2d_users.url,2d_users.username,2d_users.email,2d_users.image FROM 2d_comments INNER JOIN 2d_users ON 2d_comments.id_user=2d_users.id WHERE 2d_comments.id_game=? ORDER BY date_creation DESC";

        $query = $this->db->query($sql, array($game_id));
        $nbRows = $query->num_rows();
        // echo $this->db->last_query();
        // exit();
         //var_dump($query->result());
        $getComment='';
       foreach($query->result() as $row){

         $time = timespan(strtotime($row->date_creation), time(), 1);
        //getting the user profile 
        
        $getComment .='<div class="col-sm-6 com_div">
                                                <div class="col-sm-3 user_img">
                                                    <img class="img-responsive" src="'.(empty($row->image) ? site_url('assets/images/default-user.png') : site_url('uploads/images/users/'.$row->image)).'" alt="'.$user->username.'">
                                                </div>
                                                <div class="col-sm-9 user_info">
                                                    <b class="com_title">'.$row->username.'</b><p class="inline"> <small>'.$time.' ago</small></p>
                                                    <p class="com">'.mb_strimwidth($row->comment, 0,28, '...').'</p>
                                                </div>
                        </div>'; 
        }
       
       return array(
         'nbRows' => $nbRows,
         'getCommments' => $getComment
         );
    }
    public function getUser($idGame) 
    {
        $sql = "SELECT username, email, role, status, image FROM 2d_users WHERE id = ?";
        $query = $this->db->query($sql, array($idGame));
        if($result = $query->row()) {
            return array(
             'username'   => $result->username,
             'email'      => $result->email,
             'role'       => $result->role,
             'status'     => $result->status,
             'name_image' => $result->image
             );
        } else {
            return null;
        }
    }
     public function getComment_user($id_game,$user_id) 
    {
        $sql = "SELECT * FROM 2d_comments WHERE id_user = ? AND id_game=?";
        $query = $this->db->query($sql, array($user_id,$id_game));
        if($result = $query->row()) {
            return array(
             'comment' => $result->comment,
             'id_game' => $result->id_game,
             'id_user' => $result->id_user
             );
        } else {
            return null;
        }
    }
}
