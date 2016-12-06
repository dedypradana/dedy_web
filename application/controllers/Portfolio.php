<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About
 */
class Portfolio extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Frontend', 'fr');
    }
    public function index() {
        $filter = $this->fr->get_category();
        $portfolio = $this->fr->get_portfolio();
        $this->mViewData['filter'] = $filter;
        $this->mViewData['portfolio'] = $portfolio;
        $this->render('portfolio', 'default');
    }
    
    public function view_detail($title=''){
        $data = explode('-', $title);
        $portfolio = $this->fr->get_portfolio($data[0]);
        $skill = $this->fr->get_skill($portfolio->skill);
        $client = $this->fr->get_client($portfolio->client);
        $related = $this->fr->get_related($portfolio->id);
        $this->mViewData['portfolio'] = $portfolio;
        $this->mViewData['skill'] = $skill;
        $this->mViewData['client'] = $client;
        $this->mViewData['related'] = $related;
       
        $this->render('portfolio_single', 'default');
    }
}
