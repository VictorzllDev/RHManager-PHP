<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Employees_Table extends CI_Migration {

    public function up()
    {
        // Criando o tipo ENUM
        $this->db->query("CREATE TYPE role AS ENUM ('regular', 'manager');");

        // Criação da tabela funcionarios
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'position' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'department' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'cpf' => array(
                'type' => 'VARCHAR',
                'constraint' => '14',
                'unique' => TRUE,
                'null' => FALSE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
                'null' => FALSE
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'role' => array(
                'type' => 'role', // Usando o tipo ENUM criado previamente
                'default' => 'regular'
            ),
            'training_alert' => array(
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('employees');
    }

    public function down()
    {
        // Excluindo a tabela employees
        $this->dbforge->drop_table('employees');

        // Removendo o tipo ENUM role
        $this->db->query("DROP TYPE IF EXISTS role;");
    }
}
