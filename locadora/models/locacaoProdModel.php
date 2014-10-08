<?php

class locacaoProdModel extends CI_Model {

    function listarTudo($limit = 100, $_start = 0) {
        $this->db->limit($limit, $_start);
        $query = $this->db->get('locacao_produto');
        return $query->result();
    }

    function contarTudo() {
        return $this->db->count_all('locacao_produto');
    }

    function inserir($dados = array()) {
        $this->db->insert('locacao_produto', $dados);
        return $this->db->affected_rows();
    }

    function alterar($dados = array()) {
        if (isset($dados['locacao_codigo'])) {
            $this->db->set('locacao_codigo', $dados['locacao_codigo']);
        }
        if (isset($dados['produto_codigo'])) {
            $this->db->set('produto_codigo', $dados['produto_codigo']);
        }
        if (isset($dados['quantidade'])) {
            $this->db->set('quantidade', $dados['quantidade']);
        }
        if (isset($dados['data_devolucao'])) {
            $this->db->set('data_devolucao', $dados['data_devolucao']);
        }
        

        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('locacao_produto');
        return $this->db->affected_rows();
    }

    function buscar_pelo_codigo($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('locacao_produto');
        return $query->row(0);
    }

    function excluir() {
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('locacao_produto');
        return $this->db->affected_rows();
    }

}
