<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
        parent::__construct();
	}

	public function index()
	{
		$uid = 2;
		if($uid!=0){
			$this->load->model('user_model', 'user');
			$userinfo = $this->user->getinfo($uid);
			$this->load->model('novelty_model','nov');
			$novelty = $this->nov->getlist($uid);
			$this->load->model('comment_model','cmt');
			foreach($novelty as $key => $item){
				$item->cmt = $this->cmt->getcmt($item->category, $item->forid);
			}
			$this->load->model('todo_model','todo');
			$todolist = $this->todo->getlist($uid);
			$data = array(
				'user' => $userinfo,
				'nov' => $novelty,
				'todo' => $todolist,
				);
			$this->load->view('activity.php', $data);
		}
		else{
			$userinfo = NULL;
			$novelty = NULL;
			$todolist = NULL;
		}
	}

	public function see()
	{
		$this->load->view('activity2');
	}

	public function task()
	{
		$this->load->model('task_model','task');
        $taskinfo['uid']=1;
		/*
		//test insert
        $taskinfo['gid']=1;
        $taskinfo['name']='something';
        $taskinfo['content']='应该说一点什么';
        $taskinfo['deadline']=time();
		$this->task->post($taskinfo);
		*/
		//test update
		//test kill
		$this->task->kill(9);
		//test finish
		$this->task->finish(10);
		$this->todo();
	}

	public function novelty()
	{
		//test for novelty_model
		$this->load->model('novelty_model','nov');
		$res = $this->nov->getlist(1);
		print_r($res);
		echo '<br>';
	}

	public function todo()
	{
		//test for todo_model
		$this->load->model('todo_model','todo');
		$res = $this->todo->getlist(1);
		print_r($res);
		echo '<br>';
		foreach($res as $item){
			print_r($this->todo->getdetail($item->tid));
			echo '<br>';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */