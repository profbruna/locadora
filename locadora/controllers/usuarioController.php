<?php


class usuarioController extends CI_Controller {
    public function index(){
        $this->listar();
    }

    public function listar() {
       
           $this->load->model('usuarioModel');
        $pagina = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados = array(
            'usuarios' => $this->usuarioModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao('usuarioController', $this->usuarioModel->contarTudo(),$this->uri->segment(3),3),
            'titulo' => "Lista de Usuários ");
        $this->load->view('usuarioView', $dados);
    }

    function novo() {
        $this->load->model('usuarioModel');
        $dados['titulo'] = "Cadastro de Usuário";
        $this->load->view('usuarioFormView', $dados);
        
    }
    function inserir_usuario() {
        $this->load->model('usuarioModel');
        $inf = array(
            'nome' => $this->input->post('nome'),
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'senha' => $this->input->post('senha'),
            'inativo' => $this->input->post('inativo'),
        );
  
        if ($this->usuarioModel->inserir_usuario($inf)) {
            
            $this->session->set_flashdata('msg', 'Criado com sucesso!');
            redirect('usuarioController');
        } else {
            $this->session->set_flashdata('msg', 'Não consegui gravar!');
        }
    }
     function alterar_usuario($codigo) {
        $this->load->model('usuarioModel');
        $dados['titulo'] = "Alteração de Usuário";
        $dados['usuario'] = $this->usuarioModel->buscar_pelo_codigo($codigo);

        $this->form_validation->set_rules('nome', 'nome', 'trim');
        $this->form_validation->set_rules('login', 'login', 'trim');
          $this->form_validation->set_rules('email', 'email', 'trim');
        $this->form_validation->set_rules('senha', 'senha', 'trim');
      
        $this->form_validation->set_rules('inativo', 'inativo', 'trim');
        
        if ($this->form_validation->run()) {
            
            
           if($this->usuarioModel->alterar_usuario($_POST)){
               $this->session->set_flashdata('msg', 'Alterado com sucesso!');
               redirect('usuarioController');
            
            }
        }
        $this->load->view('usuarioUpdateView', $dados);
    }

    function eliminar_usuario() {
        $this->load->model('usuarioModel');
        
            if ($this->usuarioModel->eliminar_usuario()) {
                
                $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
                redirect('usuarioController');
            } else {

                echo $this->session->set_flashdata('msg', 'Não consegui eliminar');
            }
      
        redirect('usuarioController');
    }


}

