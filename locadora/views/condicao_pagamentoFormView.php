<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $titulo;?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://127.0.0.1/CodeIgniter/application/views/css/estilo.css" type="text/css"/>
        <link href="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery-ui-1.10.4.custom.css" 
              rel="stylesheet" type="text/javascript"/>
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery/js/jquery-1.9.1.js"></script>
        
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-ligtness/jquery/js/jquery-ui.js"></script>
        <script type="text/javascript">
        
        </script>
    </head>
    
    <body>
        <h1><?php echo $titulo?></h1>
        <?php 
        
        
            
        echo form_open('condicao_pagamentoController/inserir_condicao_pagamento');
        echo form_fieldset('Condições de Pagamento');
        
               
        echo form_label("Nome:");
        echo form_input('nome','', 'size="50" class="campo" required');
        echo br();
        
        echo form_label("Parcelas:");
        echo form_input('parcelas', '', 'size="50" class="campo" required');
        echo br();
        
        echo form_label("Nº de Dias:");
        echo form_input('dias', '', 'size="50" class="campo" required');
        echo br();
                        
        echo form_submit('submit', 'Enviar', 'class="botao1" required');
        echo form_reset('reset','Limpar');
        
        
        echo form_fieldset_close();
        echo form_close();
        
        echo '<div class="mensagem">';
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        echo '</div>';
        
        ?>
    </body>
</html>
