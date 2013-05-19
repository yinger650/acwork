<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Task extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function post()
    {
        $name = $this->input->post('name');
        $deadline = $this->input->post('deadline');
        $to = $this->input->post('to');
        $text = $this->input->post('text');
        $this->load->model('user_model','user');
        $uid = $this->user->nametouid($to);
        $this->load->model('task_model','task');
        $taskinfo = array(
                ''
            );
        $this->task->post();
    }
    
    function kill()
    {
        $pid = $this->input->post('pid');
        $this->load->model('task_model','task');
        $this->task->kill($pid);
        redirect();
    }

    function finish()
    {
        $pid = $this->input->post('pid');
        $this->load->model('task_model','task');
        $this->task->finish($pid);
        redirect();
    }

    function delay()
    {
        $pid = $this->input->post('pid');
        $newtime = $this->input->post('newtime');
        $this->load->model('task_model','task');
        $this->task->delay($pid, $newtime);
        redirect();
    }