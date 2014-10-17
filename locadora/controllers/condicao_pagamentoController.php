<?php

class condicao_pagamentoController extends CI_Controller {

    public function index() {
        $this->load->model('condicao_pagamentoModel');
        //carregando o modelo condicao_pagamentoModel para poder invocar os métodos

        $dados['condicoes_pagamentos'] = $this->condicao_pagamentoModel->listarTudo();
        //chamado o método listarTudo da classe pagamentoModel

        $dados['titulo'] = "Lista de Condicao de Pagamentos";


        $this->load->view('condicao_pagamentoView', $dados);
        //passando por parâmetro o vetor $dados com as informações inseridas
    }

    function novo() {
        $this->load->model('condicao_pagamentoModel');
        $dados['titulo'] = "Cadastro de Pagamento";
        $this->load->view('condicao_pagamentoFormView', $dados);
    }

    function inserir_condicao_pagamento() {
        $this->load->model('condicao_pagamentoModel');
        $inf = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
            'parcelas' => $this->input->post('parcelas'),
            'dias' => $this->input->post('dias'),
        );
        if ($inf['nome'] == '0') {
            $this->session->set_flashdata('msg', 'Campo "Nome" não pode ser preenchido com valor "0".');
        } else {
            if ($inf['parcelas'] == '0') {
                $this->session->set_flashdata('msg', 'Campo "Parcelas" não pode ser preenchido com valor "0".');
            } else {
                if ($inf['dias'] == '0') {
                    $this->session->set_flashdata('msg', 'Campo "Dias" não pode ser preenchido com valor "0".');
                } else {
                    if ($this->condicao_pagamentoModel->inserir($inf)) {
                        $this->session->set_flashdata('msg', 'Criado com sucesso!');
                    } else {
                        $this->session->set_flashdata('msg', 'Não consegui gravar!');
                    }
                }
            }
        }
        redirect('condicao_pagamentoController/index' . $this->uri->segment(3));
    }

    function alterar_condicao_pagamento($codigo) {
        $this->load->model('condicao_pagamentoModel');
        $dados['titulo'] = "Alteração de conta";
        $dados['condicao_pagamento'] = $this->condicao_pagamentoModel->buscar_pelo_codigo($codigo);


        $_POST['codigo'] = $codigo;
        if (isset($_POST['nome'])) {
            if ($_POST['nome'] == '0') {
                $this->session->set_flashdata('msg', 'Campo "Nome" não pode ser preenchido com valor "0".');
            } else {
                if ($_POST['parcelas'] == '0') {
                    $this->session->set_flashdata('msg', 'Campo "Parcelas" não pode ser preenchido com valor "0".');
                } else {
                    if ($_POST['dias'] == '0') {
                        $this->session->set_flashdata('msg', 'Campo "Dias" não pode ser preenchido com valor "0".');
                    } else {
                        if ($this->condicao_pagamentoModel->alterar($_POST)) {
                            $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                            redirect('condicao_pagamentoController/index/' . $_POST['nome']);
                        }
                    }
                }
            }
        }

        $this->load->view('condicao_pagamentoUpdateView', $dados);
    }

    function eliminar_condicao_pagamento($condicao_pagamento) {
        $this->load->model('condicao_pagamentoModel');
        $infCondicao_pagamento = $this->condicao_pagamentoModel->buscar_pelo_codigo($condicao_pagamento);

        if ($lancamentos) {
            $this->session->set_flashdata('msg', 'Não pode eliminar a Condicao de pagamento que contém um lançamento!');
            redirect('condicao_pagamentoController/index/' . $infCondicao_pagamento->titular);
        } else {
            if ($this->condicao_pagamentoModel->eliminar()) {
                $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
                redirect('condicao_pagamentoController/index/' . $infCondicao_pagamento->titular);
            } else {
                $this->session->set_flashdata('msg', 'Não consegui eliminar!');
            }
        }
    }

    function listar() {
        $this->load->model('condicao_pagamentoModel');
        //carregando o modelo contaModel para podeer invocar os métodos

        $dados = array(
            'condicao_pagamentos' => $this->condicao_pagamentoModel->listarTudo(numRegPagina()),
            'paginacao' => criaPaginacao('contaController', $this->condicao_pagamentoModel->contarTudo(), $this->uri->segment(3), 4),
            //chamado o método listarTudo da classe condicao_pagamentoModel
            'titulo' => "Lista de Condições de Pagamento");


        $this->load->view('condicao_pagamentoView', $dados);
        //passando por parâmetro o vetor $dados com as informações inseridas
    }

}
