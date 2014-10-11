<?php


class financeiroController extends CI_Controller {
     public function index(){
        $this->listar();
    }
     public function listar() {
       
           $this->load->model('financeiroModel');
        $pagina = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados = array(
            'financeiros' => $this->financeiroModel->listarTudo(numRegPagina(), $pagina),
            'paginacao' => criaPaginacao('financeiroController', $this->financeiroModel->contarTudo(),$this->uri->segment(3),3),
            'titulo' => "Lista de Financeiro ");
        $this->load->view('financeiroView', $dados);
    }

    function novo() {
        $this->load->model('financeiroModel');
        $dados['titulo'] = "Cadastro do Financeiro";
        $this->load->view('financeiroFormView', $dados);
        
    } function inserir_financeiro() {
        $this->load->model('financeiroModel');
        $inf = array(
            'vencimento' => $this->input->post('vencimento'),
            'valor' => $this->input->post('valor'),
            'valor_pago' => $this->input->post('valor_pago'),
            'valor_saldo' => $this->input->post('valor_saldo'),
            'locacao_codigo' => $this->input->post('locacao_codigo'),
        );
        $inf['vencimento'] = implode('-', array_reverse(explode('/', $inf['vencimento'])));
  
        if ($this->financeiroModel->inserir_financeiro($inf)) {
            
            $this->session->set_flashdata('msg', 'Criado com sucesso!');
            redirect('financeiroController');
        } else {
            $this->session->set_flashdata('msg', 'Não consegui gravar!');
        }
    }
     function alterar_financeiro($codigo) {
        $this->load->model('financeiroModel');
        $dados['titulo'] = "Alteração do Financeiro";
        $dados['financeiro'] = $this->financeiroModel->buscar_pelo_codigo($codigo);

        $this->form_validation->set_rules('vencimento', 'vencimento', 'trim');
        $this->form_validation->set_rules('valor', 'valor', 'trim');
          $this->form_validation->set_rules('valor_pago', 'valor_pago', 'trim');
        $this->form_validation->set_rules('valor_saldo', 'valor_saldo', 'trim');
      
        $this->form_validation->set_rules('locacao_codigo', 'locacao_codigo', 'trim');
        
        if ($this->form_validation->run()) {
            $_POST['codigo'] = $codigo;
             $_POST['vencimento'] = implode('-', array_reverse(explode('/', $_POST['vencimento'])));
           if($this->financeiroModel->alterar_financeiro($_POST)){
               $this->session->set_flashdata('msg', 'Alterado com sucesso!');
               redirect('financeiroController');
            
            }
        }
        $this->load->view('financeiroUpdateView', $dados);
    }

    function eliminar_financeiro() {
        $this->load->model('financeiroModel');
        
            if ($this->financeiroModel->eliminar_financeiro()) {
                
                $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
                redirect('financeiroController');
            } else {

                echo $this->session->set_flashdata('msg', 'Não consegui eliminar');
            }
      
        redirect('financeiroController');
    }

    
    
    
}
