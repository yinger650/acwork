<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->novelty();
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
		$res = $this->todo->getlist(3);
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