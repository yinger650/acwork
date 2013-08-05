<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Task extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    function post()
    {
        $name = $this->input->post('name');
        $fromuid = $this->input->post('uid');
        $deadline = $this->input->post('deadline');
        $to = $this->input->post('to');
        $content = $this->input->post('content');
        $this->load->model('user_model','user');
        $uid = $this->user->nametouid($to);
        $this->load->model('task_model','task');
        $taskinfo = array(
            'uid' => $uid,
            'name' => $name,
            'fromuid' => $fromuid,
            'content' => $content,
            'deadline' => $deadline,
            );
        $this->task->post($taskinfo);
        redirect();
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
}