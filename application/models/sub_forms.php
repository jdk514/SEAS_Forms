<?php
Class Sub_Forms extends CI_Model {

	function create() {

		if ($this->db->table_exists('sub_forms')) {
			return;
		} else {
			//sub_form must know the form it is associated with {fid} and its name {sub_form_mane}
			$fields = array(
				'id' => array(
						'type' => 'INT',
						'unsigned' => True
						'auto_increment' => True
					),
				'fid' => array(
						'type' => 'INT',
						'unsigned' => TRUE,
						)
				'sub_form_name' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					)
				);

			$this->dbforge->add_fields($fields);
			$this->dbforge->create_table('sub_forms');
		}
	}

	function destroy() {
		$this->dbforge->drop_table('sub_forms');
	}

	function insert($form_name, $sub_form_name) {
		$this->db->select('id');
		$this->db->from('forms');
		$this->db->where('form_name', $form_name);
		//get the id for the form that the sub_form corresponds to
		$result = $this->db->get()->result();

		$data = array(
				'fid' => $result[0]->id,
				'sub_form_name' => $form_name . '_' . $sub_form_name
			);

		$this->db->insert('subforms', $data);
	}
}
?>