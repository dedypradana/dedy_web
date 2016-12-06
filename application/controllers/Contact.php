<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contact
 */
class Contact extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Frontend', 'fr');
    }
    public function index() {
        $this->render('contact', 'default');
    }
    
    public function contact_us(){
        $post = $this->input->post();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>", "</label>")));
            redirect('contact');
        } else {
            $save = $this->fr->ins_contact($post);
            if ($save==TRUE) {
                $this->session->set_flashdata('flash_data', succ_msg('Terimakasih telah menghubungi kami..'));
            } else {
                $this->session->set_flashdata('flash_data', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));
            }
            redirect('contact');
        }
    }
    
}
