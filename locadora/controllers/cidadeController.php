<?php

class cidadeController extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('cidadeModel');
        $pagina = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados = array(
            'cidades' => $this->cidadeModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao(
                    'cidadeController', $this->cidadeModel->contarTudo(), $this->uri->segment(3), 4),
            'titulo' => "Lista de Cidades");
        $this->load->view('cidadeView', $dados);
    }

    function novo() {
        $this->load->model('cidadeModel');
        $this->load->model('estadoModel');
        $dados['titulo'] = "Cadastro de Cidades";
        $dados['estados'] = $this->estadoModel->listarTudo();
        if ($this->uri->segment(3)) {
            $dados['estadoAtual'] = $this->uri->segment(3);
        }
        $this->load->view('cidadeFormView', $dados);
    }

    function inserir_cidade() {
        $this->load->model('cidadeModel');
        $inf = array(
            'nome' => $this->input->post('nome'),
            'estado_codigo' => $this->input->post('estado_codigo'),
        );

        if ($this->cidadeModel->inserir($inf)) {
            $this->session->set_flashdata('msg', 'Criado com sucesso!');
            redirect('cidadeController/index');
        } else {
            $this->session->set_flashdata('msg', 'Não consegui gravar!');
        }
    }

    function alterar_cidade($codigo) {
        $this->load->model('cidadeModel');
        $dados['titulo'] = "Alteração de Cidades";
        $this->load->model('estadoModel');
        $dados['estados'] = $this->estadoModel->listarTudo();
        if ($this->uri->segment(3)) {
            $dados['estadoAtual'] = $this->uri->segment(3);
        }
        $dados['cidade'] = $this->cidadeModel->buscar_pelo_codigo($codigo);

        $this->form_validation->set_rules('nome', 'nome', 'trim');
        $this->form_validation->set_rules('estado_codigo', 'estado_codigo', 'trim');
        if ($this->form_validation->run()) {
            $_POST['codigo'] = $codigo;
            if ($this->cidadeModel->alterar($_POST)) {
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('cidadeController/index');
            }
        }
        $this->load->view('cidadeUpdateView', $dados);
    }

    function eliminar_cidade() {
        $this->load->model('cidadeModel');
        $titular = $this->cidadeModel->buscar_pelo_codigo($this->uri->segment(3));
        $del = $this->cidadeModel->eliminar();
        if ($del > 0) {
            $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
            redirect('cidadeController/index');
        }
    }

}
