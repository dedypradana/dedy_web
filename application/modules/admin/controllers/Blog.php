<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('MY_directory_helper');
    }

    public function category() {
        $crud = $this->generate_crud('blog_category');
        $this->mPageTitle = 'Blog - Category';
        $this->render_crud();
    }
    
    public function tag() {
        $crud = $this->generate_crud('blog_tag');
        $this->mPageTitle = 'Blog - Tag';
        $this->render_crud();
    }
    
    public function comment() {
        $crud = $this->generate_crud('comment');
        $crud->set_relation('id_blog', 'blog_post', 'title');
        $crud->display_as('id_blog','Title');
        $crud->display_as('ip','User');
        $this->mPageTitle = 'Blog - Comment';
        $this->render_crud();
    }
    
    public function comment_reply() {
        $crud = $this->generate_crud('comment_reply');
        $crud->display_as('id_comment','Comment User');
        $crud->set_relation('id_comment', 'comment', 'comment');
        $this->mPageTitle = 'Blog - Comment Reply';
        $this->render_crud();
    }
    
    public function media() {
        $table = 'media';
        $url_field = 'file';
        $upload_path = 'assets/uploads/media';
        $order_field = 'order';
        $title_field = 'caption';
        $crud = $this->generate_image_crud($table, $url_field, $upload_path, $order_field, $title_field);
        $this->mPageTitle = 'Media';
        $this->render_crud();
    }
    
    public function post() {
        $crud = $this->generate_crud('blog_post');
        $crud->columns('title','category','tags','content','status','date');
        $crud->set_relation('category', 'blog_category', 'name');
        $tag = $this->get_tags();
        $crud->field_type('tags', 'multiselect', $tag);
        $crud->set_field_upload('image1', 'assets/uploads/blog');
        $crud->set_field_upload('image2', 'assets/uploads/blog');
        $crud->callback_after_upload(array($this, 'thumbnail_after_upload'));
        $crud->callback_before_delete(array($this,'thumbnail_before_delete'));
        $this->mPageTitle = 'Blog - Post';
        $this->render_crud();
    }
    
    public function get_tags() {
        $this->db->select('*');
        $results = $this->db->get('blog_tag')->result();
        $tag = array();
        foreach ($results as $result) {
            $tag[$result->id] = $result->tag;
        }
        return $tag;
    }
    
    function thumbnail_after_upload($uploader_response, $field_info, $files_to_upload) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/uploads/blog/' . $uploader_response[0]->name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 330;
        $config['height'] = 160;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return true;
    }
    
    function thumbnail_before_delete($primary_key) {
        $blog = $this->db->where('id', $primary_key)->get('blog_post')->row();
        $thumb_name1 = $this->get_thumb($blog->image1);
        $thumb_name2 = $this->get_thumb($blog->image2);
        $image1 = 'assets/uploads/blog/' . $blog->image1;
        $image2 = 'assets/uploads/blog/' . $blog->image2;
        $thumb1 = 'assets/uploads/blog/' . $thumb_name1;
        $thumb2 = 'assets/uploads/blog/' . $thumb_name2;
        unlink($image1);unlink($image2);
        unlink($thumb1);unlink($thumb2);
        return true;
    }
    
    function get_thumb($img_name=''){
        $img_src = explode('.',$img_name);
        $thumbimgname = $img_src[0].'_thumb';
        $img_thumb = $thumbimgname.'.'.$img_src[1];
        return $img_thumb;
    }
    
}
