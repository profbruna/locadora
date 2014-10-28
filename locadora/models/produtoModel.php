<?php
class produtoModel extends CI_Model{
    function listarTudo($limite = 100, $start = 0){
        $this->db->limit($limite, $start);
        $query = $this->db->get('produto');
        return $query->result();
    }
    function contarTudo(){
        return $this->db->count_all('produto');
    }
    function inserir($inf = array()){
       echo $this->db->insert('produto', $inf);
        return $this->db->affected_rows();
    }
    function alterar($dados = array()){
        if(isset($dados['nome'])){
            $this->db->set('nome', $dados['nome']);
        }
         if(isset($dados['quantidade'])){
            $this->db->set('quantidade', $dados['quantidade']);
        }
        if(isset($dados['quantidade_locado'])){
            $this->db->set('quantidade_locado', $dados['quantidade_locado']);
        }
        if(isset($dados['quantidade_disponivel'])){
            $this->db->set('quantidade_disponivel', $dados['quantidade_disponivel']);
        }
        if(isset($dados['valor'])){
            $this->db->set('valor', $dados['valor']);
        }
        if(isset($dados['inativo'])){
            $this->db->set('inativo', $dados['inativo']);
        }
        if(isset($dados['data_cadastro'])){
            $this->db->set('data_cadastro', $dados['data_cadastro']);
        }
        if(isset($dados['numero_serie'])){
            $this->db->set('numero_serie', $dados['numero_serie']);
        }
        if(isset($dados['detalhes'])){
            $this->db->set('detalhes', $dados['detalhes']);
        }
        if(isset($dados['genero_codigo'])){
            $this->db->set('genero_codigo', $dados['genero_codigo']);
        }
        if(isset($dados['classificacao_codigo'])){
            $this->db->set('classificacao_codigo', $dados['classificacao_codigo']);
        }
        if(isset($dados['tipo_codigo'])){
            $this->db->set('tipo_codigo', $dados['tipo_codigo']);
        }
        if(isset($dados['dias_devolucao'])){
            $this->db->set('dias_devolucao', $dados['dias_devolucao']);
        }
        
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('produto');
        return $this->db->affected_rows();
    }
    function eliminar(){
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->delete('produto');
        return $this->db->affected_rows();
    }
    function buscar_pelo_codigo($codigo){
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('produto');
        return $query->row(0);
    }
}
