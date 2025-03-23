
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Trainings_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'SERIAL', // PostgreSQL auto-increment
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'employee_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => TRUE,
                'null'       => FALSE
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => FALSE
            ],
            'execution_date' => [
                'type' => 'DATE',
                'null' => FALSE
            ],
            'expiration_date' => [
                'type' => 'DATE',
                'null' => FALSE
            ]
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('trainings');

        // Adding foreign key constraint separately
        $this->db->query("ALTER TABLE trainings ADD CONSTRAINT trainings_employee_id_fk FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE;");
    }

    public function down()
    {
        $this->dbforge->drop_table('trainings', TRUE);
    }
}
