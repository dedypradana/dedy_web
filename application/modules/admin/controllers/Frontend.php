<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('MY_directory_helper');
    }

    public function about() {
        $crud = $this->generate_crud('f_about');
        $crud->columns('facebook','instagram','linkedin','address','phone','email');
        $crud->set_field_upload('image1', 'assets/uploads/media');
        $crud->set_field_upload('image2', 'assets/uploads/media');
        $crud->callback_after_upload(array($this, 'thumbnail_after_upload'));
        $crud->callback_before_delete(array($this,'thumbnail_before_delete'));
        $this->mPageTitle = 'Frontend - About';
        $this->render_crud();
    }
    
    function thumbnail_after_upload($uploader_response, $field_info, $files_to_upload) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/uploads/media/' . $uploader_response[0]->name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 585;
        $config['height'] = 585;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return true;
    }
    
    function thumbnail_before_delete($primary_key) {
        $blog = $this->db->where('id', $primary_key)->get('f_about')->row();
        $thumb_name1 = $this->get_thumb(@$blog->image1);
        $thumb_name2 = $this->get_thumb(@$blog->image2);
        $image1 = 'assets/uploads/media/' . @$blog->image1;
        $image2 = 'assets/uploads/media/' . @$blog->image2;
        $thumb1 = 'assets/uploads/media/' . $thumb_name1;
        $thumb2 = 'assets/uploads/media/' . $thumb_name2;
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
