<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

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
		$money = $this->db->where('id',1)->get('budget')->row()->money;
		$items = $this->db->get('item_list')->result_array();
		$this->load->view('app',array('money'=>$money, 'items'=>$items));
	}

	public function addItem()
	{
		$item = $this->input->post("item");
		$price = (int)$this->input->post("price");

		$this->db->insert("item_list", array(
			'item' => $item,
			'price' => $price
		));

		$before_money = (int)$this->db->where('id',1)->get('budget')->row()->money;
		$after_money = $before_money - $price;
		$this->db->where('id',1)->update('budget',array('money'=>$after_money));

		header("Location:".base_url());
	}

	public function delItem($item_id)
	{
		$this->db->delete('item_list', array('id', $id));
		header("Location:".base_url());
	}
}
