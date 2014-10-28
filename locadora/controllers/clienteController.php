<?php

class clienteController extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('clienteModel');
        $pagina = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados = array(
            'clientes' => $this->clienteModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao(
                    'clienteController', $this->clienteModel->contarTudo(), $this->uri->segment(3), 3),
            'titulo' => "Lista de clientes");
        $this->load->view('clienteView', $dados);
    }

    function novo() {
        $this->load->model('clienteModel');
        $this->load->model('cidadeModel');
        $dados['titulo'] = "Cadastro de Clientes";
        $dados['cidades'] = $this->cidadeModel->listarTudo();
        if ($this->uri->segment(3)) {
            $dados['cidadeAtual'] = $this->uri->segment(3);
        }
        $this->load->view('clienteFormView', $dados);
    }

    function inserir_cliente() {
        $this->load->model('clienteModel');

        $inf = array(
            'nome' => $this->input->post('nome'),
            'endereco' => $this->input->post('endereco'),
            'cpf' => $this->input->post('cpf'),
            'rg' => $this->input->post('rg'),
            'telefone' => $this->input->post('telefone'),
            'email' => $this->input->post('email'),
            'cidade_codigo' => $this->input->post('cidade_codigo'),
        );

        if ($this->clienteModel->inserir($inf)) {
            $this->session->set_flashdata('msg', 'Criado com sucesso!');
            redirect('clienteController/index/');
        } else {
            $this->session->set_flashdata('msg', 'Não consegui gravar!');
        }
    }

    function alterar_cliente($codigo) {
        $this->load->model('clienteModel');
        $dados['titulo'] = "Alteração de Cliente";
        $dados['cliente'] = $this->clienteModel->buscar_pelo_codigo($codigo);

        $this->form_validation->set_rules('nome', 'nome', 'trim');
        $this->form_validation->set_rules('endereco', 'endereco', 'trim');
        $this->form_validation->set_rules('cpf', 'cpf', 'trim');
        $this->form_validation->set_rules('rg', 'rg', 'trim');
        $this->form_validation->set_rules('telefone', 'telefone', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim');
        $this->form_validation->set_rules('cidade_codigo', 'cidade_codigo', 'trim');
        if ($this->form_validation->run()) {
            $_POST['codigo'] = $codigo;
            if ($this->clienteModel->alterar($_POST)) {
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('clienteController/index/');
            }
        }
        $this->load->view('clienteUpdateView', $dados);
    }

    function eliminar_cliente() {
        $this->load->model('clienteModel');

        $del = $this->clienteModel->eliminar();
        if ($del > 0) {
            $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
            redirect('clienteController/index/');
        }
    }

}
