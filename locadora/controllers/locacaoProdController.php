<?php

class locacaoProdController extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('locacaoProdModel');
        $dados['titulo'] = "Lista de Produtos Locados";

        $pagina = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);

        $dados['prodlocacoes'] = $this->locacaoProdModel->listarTudo(numRegPagina(), $pagina);
        $dados['paginacao'] = criaPaginacao('locacaoProdController', $this->locacaoProdModel->contarTudo(), $this->uri->segment(3), 4);

        $this->load->view('locacaoProdView', $dados);
    }

    function novo() {
        $dados['titulo'] = "Cadastro de Locação de Produtos";
       // $this->load->model('produtoModel');
       //$dados['produtos'] = $this->produtoModel->listarTudo();

        $this->load->view('locacaoProdFormView', $dados);
    }

    function inserir_produto() {
        $this->load->model('locacaoProdModel');

        $dados = array(
            'locacao_codigo' => $this->input->post('locacao_codigo'),
            'produto_codigo' => $this->input->post('produto_codigo'),
            'quantidade' => $this->input->post('quantidade'),
            'data_devolucao' => $this->input->post('data_devolucao'),
        );
        $data = substr($dados['data_devolucao'], 0, 10);

        $data = implode('-', array_reverse(explode('/', $data)));
        $dados['data_devolucao'] = $data;

        $this->form_validation->set_rules(
                'locacao_codigo', 'locacao_codigo', 'trim|required');
        $this->form_validation->set_rules(
                'produto_codigo', 'produto_codigo', 'trim|required');
        $this->form_validation->set_rules(
                'quantidade', 'quantidade', 'trim|required');
        $this->form_validation->set_rules(
                'data_devolucao', 'data_devolucao', 'trim|required');



        if ($this->form_validation->run()) {
            if ($this->locacaoProdModel->inserir($dados)) {
                $this->session->set_flashdata('msg', 'Cadastrado com Sucesso');
                redirect('locacaoProdController');
            }
        } else {
            $this->session->set_flashdata('msg', $this->form_validation->error_string());
            redirect('locacaoProdController');
        }
    }

    function alterar_produto($locacao_codigo,$produto_codigo) {
        $this->load->model('locacaoProdModel');
        $dados['titulo'] = "Alteração de Locação de Produto";
        $dados['loc'] = $this->locacaoProdModel->buscar_pelo_codigo($locacao_codigo,$produto_codigo);

        $this->form_validation->set_rules('data', 'data', 'trim|required');
        $this->form_validation->set_rules('valor', 'valor', 'trim|required');
        $this->form_validation->set_rules('observacoes', 'observacoes', 'trim|required');
        $this->form_validation->set_rules('cliente_codigo', 'cliente_codigo', 'trim|required');
        $this->form_validation->set_rules('condicao_pagamento_codigo', 'condicao_pagamento_codigo', 'trim|required');

        if ($this->form_validation->run()) {
            $_POST['data_devolucao'] = implode('-', array_reverse(explode('/', $_POST['data_devolucao'])));

            $_POST['codigo'] = $codigo;
            if ($this->locacaoProdModel->alterar($_POST)) {
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('locacaoProdController');
            }
        } else {
            echo $this->form_validation->error_string();
            $this->session->set_flashdata('msg', $this->form_validation->error_string(), 'class="bg-danger"');
        }
        $this->load->view('locacaoProdUpdateView', $dados);
    }

    function excluir_produto($locacao_codigo,$produto_codigo) {
         $this->load->model('locacaoProdModel');


        if ($this->locacaoProdModel->excluir($locacao_codigo,$produto_codigo)) {
            $this->session->set_flashdata('msg', 'Excluído com Sucesso');
            redirect('locacaoProdController');
        } else {
            $this->session->set_flashdata('msg', 'Não foi possível excluir.');
            redirect('locacaoProdController');
        }
    }

}
