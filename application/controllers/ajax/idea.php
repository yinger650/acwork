<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Idea extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function post()
    {
        $uid = $this->input->post('uid');
        $text = $this->input->post('text');
        $this->load->model('idea_model','idea');
        $this->idea->post($uid, $text);
        redirect();
    }
}