<?php
class estadoModel extends CI_Model{
    function listarTudo($limite = 100, $start = 0){
        $this->db->limit($limite, $start);
        $query = $this->db->get('estado');
        return $query->result();
    }
    function contarTudo(){
        return $this->db->count_all('estado');
    }
    function inserir($inf = array()){
       echo $this->db->insert('estado', $inf);
        return $this->db->affected_rows();
    }
    function alterar($dados = array()){
        if(isset($dados['nome'])){
            $this->db->set('nome', $dados['nome']);
        }
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('estado');
        return $this->db->affected_rows();
    }
    function eliminar(){
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('estado');
        return $this->db->affected_rows();
    }
    function buscar_pelo_codigo($codigo){
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('estado');
        return $query->row(0);
    }
}
