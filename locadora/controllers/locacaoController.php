<?php

class locacaoController extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('locacaoModel');
        $dados['titulo'] = "Lista de Locações";

        $pagina = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);

        $dados['locacoes'] = $this->locacaoModel->listarTudo(numRegPagina(), $pagina);
        $dados['paginacao'] = criaPaginacao('locacaoController', $this->locacaoModel->contarTudo(), $this->uri->segment(3), 3);

        $this->load->view('locacaoView', $dados);
    }

    function novo() {
        $dados['titulo'] = "Cadastro de Locações";
        $this->load->model('clienteModel');
        $dados['clientes'] = $this->clienteModel->listarTudo();
        $dados['condicoes'] = $this->condicao_pagamentoModel->listarTudo();
      
        $this->load->view('locacaoFormView', $dados);
    }

    function inserir_locacao() {
        $this->load->model('locacaoModel');
        $dados = array(
            'data' => $this->input->post('data'),
            'valor' => $this->input->post('valor'),
            'observacoes' => $this->input->post('observacoes'),
            'cliente_codigo' => $this->input->post('cliente_codigo'),
            'condicao_pagamento_codigo' => $this->input->post('condicao_pagamento_codigo'),
            
        );
        $dados['data'] = implode('-', array_reverse(explode('/', $dados['data'])));

        $this->form_validation->set_rules(
                'data', 'data', 'trim|required');
        $this->form_validation->set_rules(
                'valor', 'valor', 'trim|required');
        $this->form_validation->set_rules(
                'observacoes', 'observacoes', 'trim|required');
        $this->form_validation->set_rules(
                'cliente_codigo', 'cliente_codigo', 'trim|required');
        $this->form_validation->set_rules(
                'condicao_pagamento_codigo', 'condicao_pagamento_codigo', 'trim|required');
        
                

        if ($this->form_validation->run()) {
            if ($this->locacaoModel->inserir($dados)) {
                $this->session->set_flashdata('msg', 'Criado com Sucesso');
                redirect('locacaoController');
            }
                    } else {
            $this->session->set_flashdata('msg', $this->form_validation->error_string());
             redirect('locacaoController');
        }
    }

    function alterar_locacao($codigo) {
        $this->load->model('locacaoModel');
        $dados['titulo'] = "Alteração de Locação";
        $this->load->model('clienteModel');
        $dados['clientes'] = $this->clienteModel->listarTudo();
        $dados['loc'] = $this->locacaoModel->buscar_pelo_codigo($codigo);

       
        $this->form_validation->set_rules('data', 'data', 'trim|required');
        $this->form_validation->set_rules('valor', 'valor', 'trim|required');
        $this->form_validation->set_rules('observacoes', 'observacoes', 'trim|required');
        $this->form_validation->set_rules('cliente_codigo', 'cliente_codigo', 'trim|required');
        $this->form_validation->set_rules('condicao_pagamento_codigo', 'condicao_pagamento_codigo', 'trim|required');

        if ($this->form_validation->run()) {
            $_POST['data'] = implode('-', array_reverse(explode('/', $_POST['data'])));

            $_POST['codigo'] = $codigo;
            if ($this->locacaoModel->alterar($_POST)) {
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('locacaoController');
            }
        } else {
            echo $this->form_validation->error_string();
            $this->session->set_flashdata('msg', $this->form_validation->error_string(), 'class="bg-danger"');
        }
        $this->load->view('locacaoUpdateView', $dados);
    }

    function excluir_locacao($codigo) {
        $this->load->model('locacaoModel');
        
        
            if ($this->locacaoModel->excluir()) {
                $this->session->set_flashdata('msg', 'Excluído com Sucesso');
                redirect('locacaoController');
            }
         else {
            $this->session->set_flashdata('msg', 'Não foi possível excluir.');
            redirect('locacaoController');
        }
    }

}
