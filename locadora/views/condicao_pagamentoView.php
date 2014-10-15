
<html>
    <head>
        <title><?php echo $titulo;?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://127.0.0.1/CodeIgniter/application/views/css/estilo.css" type="text/css"/>
        <link href="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery-ui-1.10.4.custom.css" 
              rel="stylesheet" type="text/javascript"/>
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery/js/jquery-1.9.1.js"></script>
        
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery/js/jquery-ui.js"></script>
        
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery/js/jquery.maskMonkey.js"></script>
                
    </head>
    <body>
        <?php 
            
        echo anchor("condicao_pagamentoController/novo","Inserir",'class=""');
       
        
            $this->table->set_heading('Código','Nome','Parcelas','Ações');
            
            foreach ($condicoes_pagamentos as $p){
                $link_alterar = anchor("condicao_pagamentoController/alterar_condicao_pagamento/$p->codigo","Alterar");
                $link_eliminar = anchor("condicao_pagamentoController/eliminar_condicao_pagamento/$p->codigo","Eliminar");
                $link_listar = anchor("condicao_pagamentoController/index/$p->codigo","Listar Condição de Pagamento");
                
                                                
                $this->table->add_row($p->codigo, $p->nome, $p->parcelas,"$link_alterar $link_eliminar $link_listar");
                
                
            }
        echo$this->table->generate();
        
        echo '<div class="mensagem">';
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        echo '</div>';
        ?>
<!--        <div id="paginacao">
            
            <?php 
            echo ($paginacao);
            ?>
        </div>-->
    </body>
</html>

