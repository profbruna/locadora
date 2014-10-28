<?php

class tipoController extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('tipoModel');
        $pagina = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados = array(
            'classificacoes' => $this->tipoModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao(
                    'tipoController', $this->tipoModel->contarTudo(), $this->uri->segment(3), 4),
            'titulo' => "Lista de Tipos");
        $this->load->view('tipoView', $dados);
    }

    function novo() {
        $this->load->model('tipoModel');
        $this->load->model('tipoModel');
        $dados['titulo'] = "Cadastro de Gêneros";

        $this->load->view('tipoFormView', $dados);
    }

    function inserir_tipo() {
        $this->load->model('tipoModel');
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
                if ($this->tipoModel->inserir($inf)) {
                    $this->session->set_flashdata('msg', 'Criado com sucesso!');
                    redirect('tipoController/index');
                } else {
                    $this->session->set_flashdata('msg', 'Não consegui gravar!');
                }
            }
        }redirect('tipoController/index' . $this->uri->segment(3));
    }

    function alterar_tipo($codigo) {
        $this->load->model('tipoModel');
        $dados['titulo'] = "Alteração de Classificação";
        $this->load->model('tipoModel');

        $dados['tipo'] = $this->tipoModel->buscar_pelo_codigo($codigo);

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
                    if ($this->tipoModel->alterar($_POST)) {
                        $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                        redirect('tipoController/index');
                    }
                }
            }
        }
        $this->load->view('tipoUpdateView', $dados);
    }

    function eliminar_tipo() {
        $this->load->model('tipoModel');
        $codigo = $this->tipoModel->buscar_pelo_codigo($this->uri->segment(3));
        $del = $this->tipoModel->eliminar();
        if ($del > 0) {
            $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
            redirect('tipoController/index');
        }
    }

}
