<?php

class classificacaoModel extends CI_Model {

   /*VERIFICAR SE É NECESSÁRIO ESSE TRECHO COMENTADO*/
 /*   function listarTudo($limite = 100, $start = 0){
        $this->db->limit($limite, $start);
        $this->db->select('cidade.codigo, cidade.nome, '
                . 'estado.nome as estado');
        $this->db->from('cidade');

        if ($this->uri->segment(3)) {
            $this->db->join('estado', 'estado.codigo = cidade.estado_codigo'
                    . ' and estado.codigo = ' . $this->uri->segment(3));
        } else {
            $this->db->join('estado', ' estado.codigo = cidade.estado_codigo');
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    function contarTudo(){
        $this->db->select('cidade.codigo, cidade.nome,'
                . 'estado.nome');
        $this->db->from('cidade');

        if ($this->uri->segment(3)) {
            $this->db->join('estado', 'estado.codigo = cidade.estado_codigo'
                    . ' and estado.codigo = ' . $this->uri->segment(3));
        } else {
            $this->db->join('estado', ' estado.codigo = cidade.estado_codigo');
        }
        $this->db->get();
        return $this->db->affected_rows();
    
    }
    
    function consultaCidade() {
        $this->db->select('cidade.codigo, cidade.nome');
        $this->db->from('cidade');
        $this->db->join('estado', 'estado.codigo = cidade.estado_codigo'
                . ' and estado.codigo = ' . $this->uri->segment(3));
        $query = $this->db->get();
        return $query->result();
    }

//    function listarTudo2() {
//        $this->db->select('conta.codigo, conta.agencia, conta.data_criacao, '
//                . 'conta.titular, pessoa.nome, conta.senha, conta.saldo, conta.cancelada');
//        $this->db->from('conta');
//
//
//        $this->db->join('pessoa', ' pessoa.codigo = conta.titular');
//
//        $query = $this->db->get();
//        return $query->result();
//    }
*/
    function inserir($inf = array()) {
        $this->db->insert('classificacao', $inf);
        return $this->db->affected_rows();
    }

    function alterar($dados = array()) {
        if (isset($dados['codigo'])) {
            $this->db->set('codigo', $dados['codigo']);
        }
        if (isset($dados['nome'])) {
            $this->db->set('nome', $dados['nome']);
        }
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('nome');
        return $this->db->affected_rows();
    }

    function eliminar() {
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('nome');
        return $this->db->affected_rows();
    }

    function buscar_pelo_codigo($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('nome');
        return $query->row(0);
    }

}
