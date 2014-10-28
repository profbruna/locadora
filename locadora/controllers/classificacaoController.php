<?php

class classificacaoController extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('classificacaoModel');
        $pagina = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados = array(
            'classificacoes' => $this->classificacaoModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao(
                    'classificacaoController', $this->classificacaoModel->contarTudo(), $this->uri->segment(3), 4),
            'titulo' => "Lista de Classificações");
        $this->load->view('classificacaoView', $dados);
    }

    function novo() {
        $this->load->model('classificacaoModel');
        $this->load->model('classificacaoModel');
        $dados['titulo'] = "Cadastro de Classificações";

        $this->load->view('classificacaoFormView', $dados);
    }

    function inserir_classificacao() {
        $this->load->model('classificacaoModel');

        $inf = array(
            'nome' => $this->input->post('nome'),
        );

        $cont = strlen($inf['nome']);

        if ($inf['nome'] == '0') {
            $this->session->set_flashdata('msg', 'Campo "Nome" não pode ser preenchido com valor "0".');
        } else {
            if ($cont < 5) {
                $this->session->set_flashdata('msg', 'Campo "Nome" deve ser preenchido com 5 caracteres no mínimo.');
            } else {

                if ($this->classificacaoModel->inserir($inf)) {
                    $this->session->set_flashdata('msg', 'Criado com sucesso!');
                    redirect('classificacaoController/index');
                } else {
                    $this->session->set_flashdata('msg', 'Não consegui gravar!');
                }
            }
        }redirect('classificacaoController/index' . $this->uri->segment(3));
    }

    function alterar_classificacao($codigo) {
        $this->load->model('classificacaoModel');
        $dados['titulo'] = "Alteração de Classificação";
        $this->load->model('classificacaoModel');

        $dados['classificacao'] = $this->classificacaoModel->buscar_pelo_codigo($codigo);


        $this->form_validation->set_rules('nome', 'nome', 'trim');

        if ($this->form_validation->run()) {
            $_POST['codigo'] = $codigo;

            $cont = strlen($_POST['nome']);

            if ($_POST['nome'] == '0') {
                $this->session->set_flashdata('msg', 'Campo "Nome" não pode ser preenchido com valor "0".');
            } else {
                if ($cont < 5) {
                    $this->session->set_flashdata('msg', 'Campo "Nome" deve ser preenchido com 5 caracteres no mínimo.');
                } else {
                    if ($this->classificacaoModel->alterar($_POST)) {
                        $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                        redirect('classificacaoController/index');
                    }
                }
            }
        }
        $this->load->view('classificacaoUpdateView', $dados);
    }

    function eliminar_classificacao() {
        $this->load->model('classificacaoModel');
        $codigo = $this->classificacaoModel->buscar_pelo_codigo($this->uri->segment(3));
        $del = $this->classificacaoModel->eliminar();
        if ($del > 0) {
            $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
            redirect('classificacaoController/index');
        }
    }

}
