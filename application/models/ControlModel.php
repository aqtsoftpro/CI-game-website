<?php

class ControlModel extends CI_Model
{
    public   function  getControls(){
        $this->db->select("*");
        $this->db->from("2d_control");
        $query = $this->db->get();
       foreach($query->result() as $row){
        $getControl .= 
             '<tr class="text-center">
                    <td>'.$row->id.'</td>
                    <td>'.$row->control_name.'</td>
                    <td><img src="'.base_url('uploads/controls/').$row->image.'" width="100px"></td>                    
                    <td>                       
                        <a class="btn btn-icon waves-effect btn-default waves-light btn-xs" href="'.site_url('dashboard/gamecontrol/edit/'.$row->id.'/').'"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-icon waves-effect btn-danger waves-light btn-xs" href="'.site_url('dashboard/gamecontrol/del_control/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>';
        }
        return $getControl;
    }
    //gettign single control with given id
    public function getControl($id){
    $sql="SELECT * FROM 2d_control WHERE id=$id";

    $query = $this->db->get_where('2d_control',array('id'=>$id));
    return $query->row();
    }

    public function addControl($control,$image)
    {
        $sql = 'INSERT INTO 2d_control(control_name,image) VALUES (?,?)';
        if($this->db->query($sql, array($control,$image))) {
            return true;
        }else{
            return false;
        }        
    }
    public function updateControl($control_title,$control_image,$id){
        $sql="UPDATE 2d_control SET control_name=?, image=? WHERE id=?";
        return $this->db->query($sql,array($control_title,$control_image,$id));
    }
    public function delControl($id){
    $sql="DELETE FROM 2d_control WHERE id=?";
    return $this->db->query($sql,array($id));
    }

    public   function  getAllControls(){
        $this->db->select("*");
        $this->db->from("2d_control");
        $query = $this->db->get();
        return $query->result();
   }


}
