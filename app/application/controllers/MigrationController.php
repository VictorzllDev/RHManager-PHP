<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MigrationController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Carregar a biblioteca de migração
        $this->load->library('migration');
    }

    public function index()
    {
        // Verifica se o ambiente é "development"
        if (ENVIRONMENT !== 'development') {
            show_error('Migrações só podem ser executadas no ambiente de desenvolvimento!');
            return;
        }

        // Tenta rodar a migração mais recente
        if ($this->migration->latest() === FALSE) {
            // Caso ocorra erro, exibe o erro
            show_error($this->migration->error_string());
        } else {
            // Caso seja bem-sucedido, exibe mensagem de sucesso
            echo 'Migração realizada com sucesso!';
        }
    }
}
