<?php


class usuarioModel extends CI_Model{
      function listarTudo($limite = 100, $start=0){
        $this->db->limit($limite, $start);
        
        $query = $this->db->get('usuario');
        
        //indicando a tabela para buscar os dados
        return $query->result();
    }
     function contarTudo(){
        return $this->db->count_all('usuario');
        
        
    }
        function inserir_usuario($inf = array()){
        $this->db->insert('usuario',$inf);
        
        return $this->db->affected_rows();
    }
     function alterar_usuario($dados = array()){
        if(isset($dados['nome'])){
            $this->db->set('nome', $dados['nome']);
            
        }
        if(isset($dados['login'])){
            $this->db->set('login', $dados['login']);
            
        }
        if(isset($dados['email'])){
            $this->db->set('email', $dados['email']);
            
        }
        if(isset($dados['senha'])){
            $this->db->set('senha', $dados['senha']);
            
        }
        if(isset($dados['inativo'])){
            $this->db->set('inativo', $dados['inativo']);
            
        }
        
        
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('usuario');
        return $this->db->affected_rows();
    }
    
    function eliminar_usuario(){
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('usuario');
        return $this->db->affected_rows();
    }
    function buscar_pelo_codigo($codigo){
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('usuario');
        return $query->row(0);
    }
}
