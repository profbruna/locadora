<?php

class condicao_pagamentoModel extends CI_Model {

    function listarTudo($limite = 100, $start = 0) {
        $this->db->limit($limite, $start);
        $query = $this->db->get('condicao_pagamento');
        //indicando a tabela para buscar os dados
        return $query->result();
    }
    function contarTudo(){
        return $this->db->count_all('condicao_pagamento');
    }
            function inserir($inf = array()) {
        $this->db->insert('condicao_pagamento', $inf);

        return $this->db->affected_rows();
    }
    

    function alterar($dados = array()) {
        if (isset($dados['nome'])) {
            $this->db->set('nome', $dados['nome']);

            if (isset($dados['parcelas'])) {
                $this->db->set('parcelas', $dados['parcelas']);
            }
            if (isset($dados['dias'])) {
                $this->db->set('dias', $dados['dias']);
            }
            $this->db->where('codigo', $this->uri->segment(3));
            $this->db->update('condicao_pagamento');
            return $this->db->affected_rows();
        }
    }

    function eliminar() {
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('condicao_pagamento');
        return $this->db->affected_rows();
    }

    function buscar_pelo_codigo($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('condicao_pagamento');
        return $query->row(0);
    }

}
