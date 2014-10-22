<?php

class locacaoProdModel extends CI_Model {

    function listarTudo($limit = 100, $_start = 0, $locacao) {
        $this->db->limit($limit, $_start);
        $this->db->select('locacao_produto.*, produto.nome as produto_nome');
        $this->db->from('locacao_produto');
        $this->db->join('produto', ' produto.codigo = locacao_produto.produto_codigo and locacao_produto.locacao_codigo = '.$locacao);
        $query = $this->db->get();
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

        if (isset($dados['quantidade'])) {
            $this->db->set('quantidade', $dados['quantidade']);
        }
        if (isset($dados['data_devolucao'])) {
            $this->db->set('data_devolucao', $dados['data_devolucao']);
        }

        $this->db->where('locacao_codigo', $dados['locacao_codigo']);
        $this->db->where('produto_codigo', $dados['produto_codigo']);
        $this->db->update('locacao_produto');
        return $this->db->affected_rows();
    }

    function buscar_pelo_codigo($locacao_codigo,$produto_codigo) {
        $this->db->where('locacao_codigo', $locacao_codigo);
        $this->db->where('produto_codigo', $produto_codigo);
        $query = $this->db->get('locacao_produto');
        return $query->row(0);
    }

    function excluir($locacao_codigo,$produto_codigo) {
        $this->db->where('locacao_codigo', $locacao_codigo);
        $this->db->where('produto_codigo', $produto_codigo);
        $this->db->delete('locacao_produto');
        return $this->db->affected_rows();
    }

}
