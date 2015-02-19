<?php
Class Forms extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create() {
		if ($this->db->table_exists('forms')) {
			return;
		} else {
			//forms need a unique identifier {id}, and a name {form_name}
			$fields = array(
				'id' => array(
						'type' => 'INT',
						'unsigned' => True
						'auto_increment' => True
					),
				'form_name' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					)
				);

			$this->dbforge->add_fields($fields);
			$this->dbforge->create_table('forms');
		}
	}

	function destroy() {
		$this->dbforge->drop_table('forms');
	}

	function insert($form_name) {
		//ISSUE - Check for more efficent method to prevent duplicates
		$this -> db -> insert('forms', $form_name);
	}

	function form_exists($form_name) {
		if ($this->db->get_where('forms', array('form_name' => $form_name))->count_all_results > 0) {
			return False;
		} else {
			return True;
		}
	}
}
?>