<?php
class produtoController extends CI_Controller{

    public function index(){
        $this->listar();
    }
    
    public function listar(){
        $this->load->model('produtoModel');
        $pagina = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados = array(
            'produtos' => $this->produtoModel->listarTudo(numRegPagina(), $pagina), 
            'paginacao' => criaPaginacao(
            'produtoController', $this->produtoModel->contarTudo(), $this->uri->segment(3), 3),
            'titulo' => "Lista de Produtos");
        $this->load->view('produtoView', $dados);
    }
    
    function novo(){
        $this->load->model('produtoModel');
        $dados['titulo'] = "Cadastro de Produtos";
        
        $this->load->model('generoModel');
        $this->load->model('classificacaoModel');
        $this->load->model('tipoModel');
        $dados['generos'] = $this->generoModel->listarTudo();
        $dados['classificacoes'] = $this->classificacaoModel->listarTudo();
        $dados['tipos'] = $this->tipoModel->listarTudo();
        
        $this->load->view('produtoFormView', $dados);
    }
    function inserir_produto(){
        $this->load->model('produtoModel');
       
        $inf = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
            'quantidade' => $this->input->post('quantidade'),
            'quantidade_locado' => $this->input->post('quantidade_locado'),
            'quantidade_disponivel' => $this->input->post('quantidade_disponivel'),
            'valor' => $this->input->post('valor'),
            'inativo' => $this->input->post('inativo'),
            'data_cadastro' => $this->input->post('data_cadastro'),
            'numero_serie' => $this->input->post('numero_serie'),
            'detalhes' => $this->input->post('detalhes'),
            'genero_codigo' => $this->input->post('genero_codigo'),
            'classificacao_codigo' => $this->input->post('classificacao_codigo'),
            'tipo_codigo' => $this->input->post('tipo_codigo'),
            'dias_devolucao' => $this->input->post('dias_devolucao'),
        );
        if($this->produtoModel->inserir($inf)){
            $this->session->set_flashdata('msg','Criado com sucesso!');
            redirect('produtoController/index');
        }else{
            $this->session->set_flashdata('msg','Não consegui gravar!');
        }
    }
    
    function alterar_produto($codigo){
        $this->load->model('produtoModel');
        $dados['titulo'] = "Alteração de Produtos";
        $dados['produto'] = $this->produtoModel->buscar_pelo_codigo($codigo);
        
        $this->load->model('generoModel');
        $this->load->model('classificacaoModel');
        $this->load->model('tipoModel');
        $dados['generos'] = $this->generoModel->listarTudo();
        $dados['classificacoes'] = $this->classificacaoModel->listarTudo();
        $dados['tipos'] = $this->tipoModel->listarTudo();
        
        $this->form_validation->set_rules('codigo', 'codigo', 'trim');
        $this->form_validation->set_rules('nome', 'nome', 'trim');
        $this->form_validation->set_rules('quantidade', 'quantidade', 'trim');
        $this->form_validation->set_rules('quantidade_locado', 'quantidade_locado', 'trim');
        $this->form_validation->set_rules('quantidade_disponivel', 'quantidade_disponivel', 'trim');
        $this->form_validation->set_rules('valor', 'valor', 'trim');
        $this->form_validation->set_rules('inativo', 'inativo', 'trim');
        $this->form_validation->set_rules('data_cadastro', 'data_cadastro', 'trim');
        $this->form_validation->set_rules('numero_serie', 'numero_serie', 'trim');
        $this->form_validation->set_rules('detalhes', 'detalhes', 'trim');
        $this->form_validation->set_rules('genero_codigo', 'genero_codigo', 'trim');
        $this->form_validation->set_rules('classificacao_codigo', 'classificacao_codigo', 'trim');
        $this->form_validation->set_rules('tipo_codigo', 'tipo_codigo', 'trim');
        $this->form_validation->set_rules('dias_devolucao', 'dias_devolucao', 'trim');
        if($this->form_validation->run()){
            $_POST['codigo'] = $codigo;
            if($this->produtoModel->alterar($_POST)){
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('produtoController/index');
            }
        }
        $this->load->view('produtoUpdateView', $dados);
    }
    function eliminar_produto(){
        $this->load->model('produtoModel');
            $del = $this->produtoModel->eliminar();
            
            
            if ($del > 0){
                $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
                redirect('produtoController/index');
                
            }
        }
    }

