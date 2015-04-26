<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_place extends CI_Model {
	var $table = 'place';
	var $id = 'place_id';
	var $th = 'th_building';
	var $en = 'en_building';
	var $floor = 'floor';
	var $room = 'room';
	var $plan = 'floor_plan_file';
	var $seats = 'total_seat';
	public function __construct(){
		parent::__construct();
	}
	public function get_all_place(){
		return $this->db->get($this->table)->result();
	}
	//
	public function get_place($place_id) {
		$this->db->where($this->id, $place_id);
		return $this->db->get($this->table)->result();
	}
	//
	public function add_place($data) {
		$this->db->insert($this->table, $data);
		echo 'Row succesfully inserted!';
	}
	//
	public function delete_place($place_id) {
		$this->db->where($this->id, $place_id);
		$this->db->delete($this->table);
	}
	//
	public function edit_place($data) {
		$this->db->where($this->id, $data['place_id']);
		$this->db->update($this->table, array_slice($data, 1));
	}
	//
	public function search_place($data) {
		$this->db->like($this->th, $data['th_building']);
		$this->db->like($this->en, $data['en_building']);
		$this->db->like($this->floor, $data['floor']);
		$this->db->like($this->room, $data['room']);
		$this->db->like($this->plan, $data['floor_plan_file']);
		return $this->db->get($this->table)->result();
	}
	///
}
?>