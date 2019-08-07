<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('products');
		$this->load->model('reservations');
		$this->load->library('form_validation');
		$data['products'] = $this->products->getProductFrontend()->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/index', $data);
		} else {
			$param = [
				'id'			=> null,
				'name'			=> $this->input->post('name'),
				'phone'			=> $this->input->post('phone'),
				'booking_at'	=> time()
			];
			$this->reservations->booking($param);
			$this->session->set_flashdata('message', 'Your reservation is in progress, we will contact you as soon as possible.');
			redirect(base_url());
		}
	}
}
