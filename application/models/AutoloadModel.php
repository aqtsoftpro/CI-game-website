<?php

class AutoloadModel extends CI_Model
{
		public function getCategories()
		{
		$sql="SELECT `id`,`title` FROM `2d_categories` WHERE (`id_relation`=? OR `id_relation` IS NULL ) AND `display_front`='1' ORDER BY `title`";
		$query=$this->db->query($sql,0);
		$getCategories='';
		foreach($query->result() as $row){
		$sql="SELECT title,url FROM 2d_categories WHERE id_relation=? AND display_front=1 ORDER BY title";
		$query1=$this->db->query($sql,$row->id);
		$getSubCategories='';
		foreach($query1->result() as $row1){
		if(!empty($row1)){
		$getSubCategories.='<li><a href="'.site_url('category/'.$row1->url.'/').'">'.$row1->title.'</a></li>';
		}
		}
		$getCategories.='<li class="dropdown">';
		if($getSubCategories){
			$getCategories.='<a href="#" class="dropdown-togglewaves-effectwaves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$row->title.'<span class="caret"></span></a>
											<ul class="dropdown-menu new-dropdown-menu">
												'.$getSubCategories.'
											</ul>';
		}
		else{
			$getCategories.='<a href="'.site_url('category/'.lcfirst($row->title)).'">'.$row->title.'</a>';
		}
											
		$getCategories.='</li>'; 

		//$getCategories.='<li>
		//<ahref="'.site_url('category/'.strtolower($row->title)).'">'.$row->title.'</a>

		//</li>';
		}
		return $getCategories;
		}

		public function getFooter()
		{
		$sql="SELECT title,url FROM 2d_pages WHERE display_footer=1 ORDER BY title";
		$query=$this->db->query($sql);
		$getFooter='';
		foreach($query->result() as $row){
		$getFooter.='<li><a href="'.site_url('page/'.$row->url.'/').'">'.$row->title.'</a></li>';
		}
		return $getFooter;
		}
		public function getLanguages()
		{
		$sql="SELECT * from language_settings where lang_flag=1 order by lang_name asc";
		$query=$this->db->query($sql);

		return $query->result();
		}
		public function lang_settings($lang){


		$data=array(
		'lang_name'=>$lang
		);

		if($this->db->insert('language_settings',$data)){
		return true;
		}

		}//endslangsetting
		public function display_languages(){

		$query=$this->db->get('language_settings');
		if(!empty($query)){
		return $query->result();
		}

		}
		public function lang_id($lang){
		$data=array(
		'lang_name'=>$lang
		);
		if($query=$this->db->get_where('language_settings',$data)){
		foreach($query->row() as $item){
		return $item;
		}
		}
		}
		public function lang_show($id=NULL){
		if(isset($id)){
		$data=array(
		'lang_flag'=>1
		);
		$this->db->where('lang_id',$id);
		return $this->db->update('language_settings',$data);
		}

		}//endslang_show
		public function lang_hide($id=NULL){
		if(isset($id)){
		$data=array(
		'lang_flag'=>0
		);
		$this->db->where('lang_id',$id);
		return $this->db->update('language_settings',$data);
		}
		}
		public function hide_all(){
		$data=array(
		'lang_flag'=>0
		);
		return $this->db->update('language_settings',$data);
		}
}
