<?php

class generoController extends CI_Controller {

/************PESQUISAR SE É NECESSÁRIO A UTILIZAÇÃO DESSE 'PUBLIC' *******
      public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('generoModel');
        $pagina = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados = array(
            'genero' => $this->generoModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao(
                    'generoController', $this->generoModel->contarTudo(), $this->uri->segment(3), 4),
            'titulo' => "Lista de Gêneros");
        $this->load->view('generoView', $dados);
    }
*/
    function novo() {
        $this->load->model('generoModel');
        $this->load->model('generoModel');
        $dados['titulo'] = "Cadastro de Gêneros";
       
        $this->load->view('generoFormView', $dados);
    }

    function inserir_genero() {
        $this->load->model('generoModel');
        $inf = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
        );

        if ($this->generoModel->inserir($inf)) {
            $this->session->set_flashdata('msg', 'Criado com sucesso!');
            redirect('generoController/index');
        } else {
            $this->session->set_flashdata('msg', 'Não consegui gravar!');
        }
    }

    function alterar_genero($codigo) {
        $this->load->model('generoModel');
        $dados['titulo'] = "Alteração de Gêneros";
        $this->load->model('generoModel');
               
        $dados['genero'] = $this->generoModel->buscar_pelo_codigo($codigo);

        $this->form_validation->set_rules('codigo', 'codigo', 'trim');
        $this->form_validation->set_rules('nome', 'nome', 'trim');
        if ($this->form_validation->run()) {
            $_POST['codigo'] = $codigo;
            if ($this->generoModel->alterar($_POST)) {
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');

            }
        }

    }

    function eliminar_genero() {
        $this->load->model('generoModel');
        $codigo = $this->generoModel->buscar_pelo_codigo($this->uri->segment(3));
        $del = $this->generoModel->eliminar();
        if ($del > 0) {
            $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
            redirect('generoModel/index');
        }
    }

}
