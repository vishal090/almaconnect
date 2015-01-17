<?php if(!defined('BASEPATH'))exit('No direct scripts access allowed');

class Map extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->library('googlemaps');
		
		$this->load->model('map_model','',TRUE);
		
		$config['center'] = 'Windmill craftworks, bangalore, india';
		$config['zoom'] = "auto";
		$this->googlemaps->initialize($config);
		
		$coords = $this->map_model->get_coordinates();
		
		foreach($coords as $coordinate){
			$marker = array();
			$marker['position'] = $coordinate->lat.','.$coordinate->lng;
			$this->googlemaps->add_marker($marker);
			}
		$data = array();
$data['map'] = $this->googlemaps->create_map();

$this->load->view('welcome_message',$data);		
	}
}