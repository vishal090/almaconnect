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
		$this->load->library('googlemaps');
		
		$conifg = array();
		$config['center'] = 'bangalore, india';
		$config['placeTypes'] = 'bank';
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = 'whitefield, bangalore';
		$this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('welcome_message',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */