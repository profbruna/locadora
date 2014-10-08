<?php
class clienteModel extends CI_Model{
    function listarTudo($limite = 100, $start = 0){
        $this->db->limit($limite, $start);
        $query = $this->db->get('cliente');
        return $query->result();
    }
    function contarTudo(){
        return $this->db->count_all('cliente');
    }
    function inserir($inf = array()){
       echo $this->db->insert('cliente', $inf);
        return $this->db->affected_rows();
    }
    function alterar($dados = array()){
        if(isset($dados['nome'])){
            $this->db->set('nome', $dados['nome']);
        }
        if(isset($dados['endereco'])){
            $this->db->set('endereco', $dados['endereco']);
        }
        if(isset($dados['cpf'])){
            $this->db->set('cpf', $dados['cpf']);
        }
        if(isset($dados['rg'])){
            $this->db->set('rg', $dados['rg']);
        }
        if(isset($dados['telefone'])){
            $this->db->set('telefone', $dados['telefone']);
        }
        if(isset($dados['email'])){
            $this->db->set('email', $dados['email']);
        }
        if(isset($dados['cidade_codigo'])){
            $this->db->set('cidade_codigo', $dados['cidade_codigo']);
        }
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('cliente');
        return $this->db->affected_rows();
    }
    function eliminar(){
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('cliente');
        return $this->db->affected_rows();
    }
    function buscar_pelo_codigo($codigo){
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('cliente');
        return $query->row(0);
    }
}
