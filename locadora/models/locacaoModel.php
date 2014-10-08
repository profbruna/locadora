<?php

class locacaoModel extends CI_Model {

    function listarTudo($limit = 100, $_start = 0) {
        $this->db->limit($limit, $_start);
        $query = $this->db->get('locacao');
        return $query->result();
    }

    function contarTudo() {
        return $this->db->count_all('locacao');
    }

    function inserir($dados = array()) {
        $this->db->insert('locacao', $dados);
        return $this->db->affected_rows();
    }

    function alterar($dados = array()) {
        if (isset($dados['data'])) {
            $this->db->set('data', $dados['data']);
        }
        if (isset($dados['valor'])) {
            $this->db->set('valor', $dados['valor']);
        }
        if (isset($dados['observacoes'])) {
            $this->db->set('observacoes', $dados['observacoes']);
        }
        if (isset($dados['cliente_codigo'])) {
            $this->db->set('cliente_codigo', $dados['cliente_codigo']);
        }
        if (isset($dados['condicao_pagamento_codigo'])) {
            $this->db->set('condicao_pagamento_codigo', $dados['condicao_pagamento_codigo']);
        }
        

        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('locacao');
        return $this->db->affected_rows();
    }

    function buscar_pelo_codigo($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('locacao');
        return $query->row(0);
    }

    function excluir() {
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('locacao');
        return $this->db->affected_rows();
    }

}
