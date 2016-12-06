<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About
 */
class Blog extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Frontend', 'fr');
        $this->limit = 4;
    }
    
    public function index() {
        $this->mPageTitle = 'My Blog';
        $category = $this->fr->get_blog_category();
        $blog = $this->fr->get_blog('',$this->limit, $this->input->get('p'));
        $blog_recent = $this->fr->get_blog_recent();
        $blog_popular = $this->fr->get_blog_popular();
        $total_blog = $this->db->count_all('blog_post');
        $data['paging'] = paging(curCname(), $total_blog, $this->limit,3);
        $this->mViewData['category'] = $category;
        $this->mViewData['blog'] = $blog;
        $this->mViewData['blog_recent'] = $blog_recent;
        $this->mViewData['blog_popular'] = $blog_popular;
        $this->mViewData['total_blog'] = $total_blog;
        $this->mViewData['paging'] = $this->pagination->create_links();
        $this->render('blog', 'default');
    }
    
    public function read($param=''){
        $data = explode('-', $param);
        $blog = $this->fr->get_blog_id($data[0]);
        if(!$blog){redirect('blog');}
        $date = day_month(@$blog->date);
        $category = $this->fr->get_blog_category();
        $blog_recent = $this->fr->get_blog_recent();
        $blog_popular = $this->fr->get_blog_popular();
        $total_blog = $this->db->count_all('blog_post');
        $comment = $this->fr->get_comment($data[0]);
        $this->mViewData['blog_recent'] = $blog_recent;
        $this->mViewData['blog_popular'] = $blog_popular;
        $this->mViewData['blog'] = $blog;
        $this->mViewData['day'] = $date['day'];
        $this->mViewData['month'] = $date['month'];
        $this->mViewData['category'] = $category;
        $this->mViewData['comment'] = $comment;
        $this->mViewData['total_blog'] = $total_blog;
        $this->mPageTitle = 'Read Blog';
        $this->mMetaData['description'] = read_more_meta(@$blog->content);
        $this->mMetaData['keywords'] = $blog->title;
        $this->render('blog_single', 'default');
    }
    
    public function search(){
        $search = $this->input->post('search');
        $this->mPageTitle = 'Search';
        $category = $this->fr->get_blog_category();
        $blog_recent = $this->fr->get_blog_recent();
        $blog_popular = $this->fr->get_blog_popular();
        $blog = $this->fr->get_blog_search($search, $this->limit, $this->input->get('p'));
        $total_blog = $this->fr->get_all_search($search);
        $data['paging'] = paging(curCname().'/search', $total_blog, $this->limit,3);
        $this->mViewData['category'] = $category;
        $this->mViewData['blog'] = $blog;
        $this->mViewData['blog_recent'] = $blog_recent;
        $this->mViewData['blog_popular'] = $blog_popular;
        $this->mViewData['total_blog'] = count($blog);
        $this->mViewData['paging'] = $this->pagination->create_links();
        $this->render('blog', 'default');
    }
    
    public function category($name=''){
        $this->mPageTitle = 'Category - '.$name;
        $category = $this->fr->get_blog_category();
        $blog_recent = $this->fr->get_blog_recent();
        $blog_popular = $this->fr->get_blog_popular();
        $blog = $this->fr->get_blog($name,$this->limit, $this->input->get('p'));
        $total_blog = $this->fr->get_all($name);
        $data['paging'] = paging(curCname().'/category/'.$name, $total_blog, $this->limit,3);
        $this->mViewData['category'] = $category;
        $this->mViewData['blog'] = $blog;
        $this->mViewData['blog_recent'] = $blog_recent;
        $this->mViewData['blog_popular'] = $blog_popular;
        $this->mViewData['total_blog'] = $total_blog;
        $this->mViewData['paging'] = $this->pagination->create_links();
        $this->render('blog', 'default');
    }
    
    public function add_comment(){
        $post = $this->input->post();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>", "</label>")));
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $save = $this->fr->ins_comment($post);
            if ($save==TRUE) {
                $this->session->set_flashdata('flash_data', succ_msg('Terimakasih, Comment berhasil di input..'));
            } else {
                $this->session->set_flashdata('flash_data', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}
