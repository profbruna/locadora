<?php
class estadoController extends CI_Controller{

    public function index(){
        $this->listar();
    }
    
    public function listar(){
        $this->load->model('estadoModel');
        $pagina = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados = array(
            'estados' => $this->estadoModel->listarTudo(numRegPagina(), $pagina), 
            'paginacao' => criaPaginacao(
            'estadoController', $this->estadoModel->contarTudo(), $this->uri->segment(3), 3),
            'titulo' => "Lista de Estados");
        $this->load->view('estadoView', $dados);
    }
    
    function novo(){
        $this->load->model('estadoModel');
        $dados['titulo'] = "Cadastro de Estados";
        $this->load->view('estadoFormView', $dados);
    }
    function inserir_estado(){
        $this->load->model('estadoModel');
        
        $inf = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
        );
        if($this->estadoModel->inserir($inf)){
            $this->session->set_flashdata('msg','Criado com sucesso!');
            redirect('estadoController/index');
        }else{
            $this->session->set_flashdata('msg','Não consegui gravar!');
        }
    }
    
    function alterar_estado($codigo){
        $this->load->model('estadoModel');
        $dados['titulo'] = "Alteração de Estados";
        $dados['estado'] = $this->estadoModel->buscar_pelo_codigo($codigo);
        
        $this->form_validation->set_rules('codigo', 'codigo', 'trim');
        $this->form_validation->set_rules('nome', 'nome', 'trim');
        if($this->form_validation->run()){
            $_POST['codigo'] = $codigo;
            if($this->estadoModel->alterar($_POST)){
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('estadoController/index');
            }
        }
        $this->load->view('estadoUpdateView', $dados);
    }
    function eliminar_estado(){
        $this->load->model('estadoModel');
            $del = $this->estadoModel->eliminar();
            if ($del > 0){
                $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
                redirect('estadoController/index.php');
            }
        }
    }

