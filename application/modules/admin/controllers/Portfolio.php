<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('MY_directory_helper');
    }

    public function category() {
        $crud = $this->generate_crud('portfolio_category');
        $this->mPageTitle = 'Portfolio - Category';
        $this->render_crud();
    }

    public function skill() {
        $crud = $this->generate_crud('portfolio_skill');
        $this->mPageTitle = 'Portfolio - Skills';
        $this->render_crud();
    }

    public function client() {
        $crud = $this->generate_crud('portfolio_client');
        $this->mPageTitle = 'Portfolio - Client';
        $this->render_crud();
    }

    public function content() {
        $crud = $this->generate_crud('portfolio_content');
        $crud->columns('category','title','skill','description','client','build');
        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_relation('category', 'portfolio_category', 'name');
        $crud->set_relation('client', 'portfolio_client', 'client');
        $crud->set_field_upload('path', 'assets/uploads/portfolio');
        $crud->callback_after_upload(array($this, 'thumbnail_after_upload'));
        $crud->callback_before_delete(array($this,'thumbnail_before_delete'));
        $crud->set_field_upload('image1', 'assets/uploads/portfolio');
        $crud->set_field_upload('image2', 'assets/uploads/portfolio');
        $skill = $this->get_skill();
        $crud->field_type('skill', 'multiselect', $skill);
        $this->mPageTitle = 'Portfolio - Content';
        $this->render_crud();
    }

    public function get_skill() {
        $this->db->select('*');
        $results = $this->db->get('portfolio_skill')->result();
        $skill = array();
        foreach ($results as $result) {
            $skill[$result->id] = $result->skill;
        }
        return $skill;
    }

    function thumbnail_after_upload($uploader_response, $field_info, $files_to_upload) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/uploads/portfolio/' . $uploader_response[0]->name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 447;
        $config['height'] = 447;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return true;
    }
    function thumbnail_before_delete($primary_key) {
        $portfolio = $this->db->where('id', $primary_key)->get('portfolio_content')->row();
        $thumb_name = $this->get_thumb($portfolio->path);
        $image = 'assets/uploads/portfolio/' . $portfolio->path;
        $thumb = 'assets/uploads/portfolio/' . $thumb_name;
        unlink($image);unlink($thumb);
        return true;
    }
    function get_thumb($img_name=''){
        $img_src = explode('.',$img_name);
        $thumbimgname = $img_src[0].'_thumb';
        $img_thumb = $thumbimgname.'.'.$img_src[1];
        return $img_thumb;
    }

}
