<?php


 
class financeiroModel extends CI_Model {
    
    function listarTudo($limite = 100, $start=0, $locacao){
        $this->db->limit($limite, $start);
        $this->db->where('locacao_codigo', $locacao);
        $query = $this->db->get('financeiro');
        
        //indicando a tabela para buscar os dados
        return $query->result();
    }
     function contarTudo(){
        return $this->db->count_all('financeiro');
        
        
    }
        function inserir_financeiro($inf = array()){
        $this->db->insert('financeiro',$inf);
        
        return $this->db->affected_rows();
    }
     function alterar_financeiro($dados = array()){
        if(isset($dados['vencimento'])){
            $this->db->set('vencimento', $dados['vencimento']);
            
        }
        if(isset($dados['valor'])){
            $this->db->set('valor', $dados['valor']);
            
        }
        if(isset($dados['valor_pago'])){
            $this->db->set('valor_pago', $dados['valor_pago']);
            
        }
        if(isset($dados['valor_saldo'])){
            $this->db->set('valor_saldo', $dados['valor_saldo']);
            
        }
        if(isset($dados['locacao_codigo'])){
            $this->db->set('locacao_codigo', $dados['locacao_codigo']);
            
        }
        
        
        $this->db->where('codigo', $this->uri->segment(3));
        $this->db->update('financeiro');
        return $this->db->affected_rows();
    }
    
    function eliminar_financeiro($codigo){
        $this->db->where('codigo', $codigo);
        $this->db->delete('financeiro');
        return $this->db->affected_rows();
    }
    function buscar_pelo_codigo($codigo){
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('financeiro');
        return $query->row(0);
    }
    function buscar_pela_locacao($locacao){
        $this->db->where('locacao_codigo', $locacao);
        $query = $this->db->get('financeiro');
        return $query->row(0);
    }
    
    
}
