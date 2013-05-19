<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function more($fortype, $forid)
    {
        $this->load->model('comment_model');
        $res = json_encode($this->comment_model->getcmt($fortype, $forid));
        return $res;
    }

    function viewmore()
    {
        $fortype = $this->input->post('fortype');
        $forid = $this->input->post('forid');
        $res = $this->more($fortype, $forid);
        echo $res;
        redirect();
        return $res;
    }
    
    function post()
    {
        $uid = $this->input->post('uid');
        $fortype = $this->input->post('fortype');
        $forid = $this->input->post('forid');
        $text = $this->input->post('text');
        $this->load->model('comment_model');
        $this->comment_model->post($uid, $fortype, $forid, $text);
        $res = $this->more($fortype, $forid);
        echo $res;
        redirect();
        return $res;
    }

    function mark()
    {
        $uid = $this->input->post('uid');
        $fortype = $this->input->post('fortype');
        $forid = $this->input->post('forid');
        $mark = $this->input->post('mark');
        $this->load->model('comment_model');
        $this->comment_model->mark($uid, $fortype, $forid, $mark);
        $res = json_encode($this->comment_model->getmark($fortype, $forid));
        echo $res;
        redirect();
        return $res;
    }

    function delete($cid)
    {
        $cid = $this->input->post('cid');
        $this->load->model('comment_model');
        $this->comment_model->delete($cid);
        $res = $this->more($fortype, $forid);
        echo $res;
        redirect();
        return $res;
    }
}