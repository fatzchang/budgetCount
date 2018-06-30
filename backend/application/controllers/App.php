<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	private $ori_money=0;
	private $cost_sum=0;

	public function __construct(){
		parent::__construct();
		$this->ori_money = $this->db->where('id',1)->get('budget')->row()->money;
		$this->cost_sum = $this->db->select("SUM(price) as sum")->from("item_list")->get()->row()->sum;
	}
	public function index()
	{
		$money = $this->ori_money - $this->cost_sum;
		$items = $this->db->order_by("create_date desc")->get('item_list')->result_array();
		$this->load->view('app',array('money'=>$money, 'items'=>$items));
	}

	public function addItem()
	{
		$item  = $this->input->post("item");
		$price = (int)$this->input->post("price");

		if($price > $this->ori_money - $this->cost_sum){
			echo "<script>alert('你他媽沒錢');history.back()</script>";
			return;
		}

		$this->db->insert("item_list", array(
			'item'  => $item,
			'price' => $price
		));

		header("Location:".base_url());
	}

	public function delItem($item_id)
	{
		$this->db->where('id', $item_id)
						 ->delete('item_list');
		header("Location:".base_url());
	}
}
