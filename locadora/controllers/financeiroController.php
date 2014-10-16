<?php

class financeiroController extends CI_Controller {

    public function index($locacao) {
        $this->load->model('locacaoModel');
        $this->load->model('financeiroModel');
        $loc = $this->locacaoModel->buscar_pelo_codigo($locacao);
        $fin = $this->financeiroModel->buscar_pela_locacao($locacao);
        if ($fin) {
            $this->listar($locacao);
        } else {
            $this->inserir_financeiro($locacao, $loc);
            $this->listar($locacao);
        }
    }

    public function listar($locacao) {

        $this->load->model('financeiroModel');
        $pagina = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados = array(
            'financeiros' => $this->financeiroModel->listarTudo(numRegPagina(), $pagina, $this->uri->segment(3)),
            'paginacao' => criaPaginacao('financeiroController', $this->financeiroModel->contarTudo(), $this->uri->segment(3), 4),
            'titulo' => "Lista de Financeiro ");

        $this->load->view('financeiroView', $dados);
    }

    function inserir_financeiro($locacao, $loc) {
        $this->load->model('financeiroModel');

        $inf = array(
            'vencimento' => date('Y-m-d'),
            'valor' => $loc->valor,
            'valor_pago' => 0,
            'valor_saldo' => $loc->valor,
            'locacao_codigo' => $this->uri->segment(3)
        );

        $this->financeiroModel->inserir_financeiro($inf);
    }

    function alterar_financeiro($codigo) {
        $this->load->model('financeiroModel');
        $dados['titulo'] = "Alteração do Financeiro";
        $financeiro = $this->financeiroModel->buscar_pelo_codigo($codigo);
        $dados['financeiro'] = $financeiro;

        $this->form_validation->set_rules('vencimento', 'vencimento', 'trim');
        $this->form_validation->set_rules('valor', 'valor', 'trim');
        $this->form_validation->set_rules('valor_pago', 'valor_pago', 'trim');
        $this->form_validation->set_rules('valor_saldo', 'valor_saldo', 'trim');

        $this->form_validation->set_rules('locacao_codigo', 'locacao_codigo', 'trim');

        if ($this->form_validation->run()) {
            $_POST['codigo'] = $codigo;
            $_POST['vencimento'] = implode('-', array_reverse(explode('/', $_POST['vencimento'])));
            if ($this->financeiroModel->alterar_financeiro($_POST)) {
                $this->session->set_flashdata('msg', 'Alterado com sucesso!');
                redirect('financeiroController/index/' . $financeiro->locacao_codigo);
            }
        }
        $this->load->view('financeiroUpdateView', $dados);
    }

    function eliminar_financeiro($codigo) {
        $this->load->model('financeiroModel');
        $financeiro = $this->financeiroModel->buscar_pelo_codigo($codigo);

        if ($this->financeiroModel->eliminar_financeiro($codigo)) {

            $this->session->set_flashdata('msg', 'Eliminado com sucesso!');
            redirect('locacaoController/index/');
        } else {

            echo $this->session->set_flashdata('msg', 'Não consegui eliminar');
        }

        redirect('locacaoController/index/');
    }

}
