<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_category() {
        $this->db->select('*');
        $this->db->from('portfolio_category');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function get_all($param=''){
        $this->db->select('*');
        $this->db->from('blog_post');
        $this->db->join('blog_category', 'blog_post.category = blog_category.id');
        if($param){$this->db->where('blog_category.name',$param);}
        $return = $this->db->count_all_results();
        return $return;
    }
    
    public function get_blog_id($id=''){
        $this->db->select('*');
        $this->db->from('blog_post');
        $this->db->join('blog_category', 'blog_post.category = blog_category.id');
        if($id){$this->db->where('blog_post.id',$id);}
        $query = $this->db->get();
        $return = $query->row();
        return $return;
    }
    
    public function get_blog_search($param='',$limit=0, $offset=0) {
        $this->db->select('blog_category.*, blog_post.*, blog_post.id blog_id');
        $this->db->from('blog_post');
        $this->db->join('blog_category', 'blog_post.category = blog_category.id');
        if($param){
            $this->db->like('blog_post.content',$param);
            $this->db->or_like('blog_post.title',$param);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function get_all_search($param=''){
        $this->db->select('*');
        $this->db->from('blog_post');
        $this->db->join('blog_category', 'blog_post.category = blog_category.id');
        if($param){$this->db->where('blog_post.content',$param);}
        $return = $this->db->count_all_results();
        return $return;
    }
    
    public function get_blog($param='',$limit=0, $offset=0){
        $this->db->select('blog_category.*, blog_post.*, blog_post.id blog_id');
        $this->db->from('blog_post');
        $this->db->join('blog_category', 'blog_post.category = blog_category.id');
        if($param){$this->db->where('blog_category.name',$param);}
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function get_blog_recent(){
        $this->db->select('*');
        $this->db->from('blog_post');
        $this->db->order_by('date','DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function get_about() {
        $this->db->select('*');
        $this->db->from('f_about');
        $query = $this->db->get();
        $return = $query->row();
        return $return;
    }
    
    public function get_reply($id='') {
        $this->db->select('*');
        $this->db->from('comment_reply');
        $this->db->where('id_comment',$id);
        $query = $this->db->get();
        $return = $query->row();
        return $return;
    }
    
    public function get_comment($id=''){
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('id_blog',$id);
        $this->db->order_by('date','DESC');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function get_blog_popular(){
        $this->db->select('*');
        $this->db->from('blog_post');
        $this->db->order_by('date','ASC');
        $this->db->limit(4);
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
        public function ins_comment($param='') {
        $this->load->library('user_agent');
        $res = explode("-", $param['id_blog']);
        $data = array(
            'id_blog' => $res[0],
            'name' => $param['name'],
            'email' => $param['email'],
            'comment' => $param['comment'],
            'ip' => $this->input->ip_address().' | '.$this->agent->agent_string(),
            'date' => date('Y-m-d H:i:s'),
        );
        $insert = $this->db->insert('comment', $data);
        return $insert;
    }
    
    public function ins_contact($param='') {
        $this->load->library('user_agent');
        $data = array(
            'name' => $param['name'],
            'email' => $param['email'],
            'subject' => $param['subject'],
            'message' => $param['message'],
            'ip' => $this->input->ip_address().' | '.$this->agent->agent_string(),
            'date' => date('Y-m-d H:i:s'),
        );
        $insert = $this->db->insert('contact', $data);
        return $insert;
    }
    
    public function get_blog_category() {
        $this->db->select('*');
        $this->db->from('blog_category');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function get_portfolio($id='') {
        $this->db->select('portfolio_content.*,portfolio_content.description deskripsi, portfolio_category.name, portfolio_category.description');
        $this->db->from('portfolio_content');
        if($id){$this->db->where('portfolio_content.id', $id);}
        $this->db->join('portfolio_category', 'portfolio_content.category = portfolio_category.id');
        $query = $this->db->get();
        if($id){
            $return = $query->row();    
        }else{
            $return = $query->result();
        }
        return $return;
    }
    
    public function get_skill($param=""){
        $data = explode(',', $param);
        foreach($data as $r){
            $skill = $this->skill($r);
            $res[] = $skill->skill;
        }
        return $res;
    }
    
    public function get_client($id='') {
        $this->db->select('*');
        $this->db->from('portfolio_client');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $return = $query->row();
        return $return;
    }
    
    public function get_related($id='') {
        $this->db->select('portfolio_content.*,portfolio_content.description deskripsi, portfolio_category.name, portfolio_category.description');
        $this->db->from('portfolio_content');
        $this->db->join('portfolio_category', 'portfolio_content.category = portfolio_category.id');
        if($id){$this->db->where_not_in('portfolio_content.id', $id);}
        $this->db->order_by('portfolio_content.build', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    
    public function skill($id=''){
        $this->db->select('*');
        $this->db->from('portfolio_skill');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $return = $query->row();
        return $return;
    }
    
}