<html>
    <head>
        <meta charset="utf-8"/> 

        <!-- JQUERY -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
        <!-- TWITTER BOOTSTRAP CSS -->
       
        <link href="<?php echo base_url('locadora/views/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo base_url('locadora/views/css/estilo.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- TWITTER BOOTSTRAP JS -->
        <script src="<?php echo base_url('locadora/views/jquery/js/bootstrap.min.js') ?>"></script>      
        <script src="<?php echo base_url('locadora/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css') ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery-1.9.1.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery-ui.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery.maskMoney.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#datepicker").datepicker({
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    montNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    dateFormat: 'dd/mm/yy',
                    nextText: 'Próximo',
                    prevText: 'Anterior'

                });
            });

        </script>   
    </head>
    <body>
        <h1><?php echo $titulo; ?></h1>
        <?php
        $codigo = 0;
        $codigo = @$condicao_pagamento->codigo;
        
     
        
        echo form_open("condicao_pagamentoController/alterar_condicao_pagamento/$codigo");
        echo form_fieldset('Informações Pessoais');
        echo form_label("Nome:");
        echo form_input('nome', set_value('nome', @$condicao_pagamento->nome), 'size="50" class="campo" required');
        echo br();

        echo form_label("Parcelas:");
        echo form_input('parcelas', set_value('parcelas', @$condicao_pagamento->parcelas), 'size="5" class="campo" required');
        echo br();
        
        echo form_label("Nº de Dias:");
        echo form_input('dias', set_value('dias', @$condicao_pagamento->dias), 'size="5" class="campo" required');
        echo br();

                
        echo form_submit('submit','Enviar','class="botao1"');
        echo form_reset('reset', 'Limpar');
        
        echo form_fieldset_close();
        echo form_close();
        echo anchor("condicao_pagamentoController/index/" ,"Condições de Pagamento", 'class=""');
        
        
        echo '<div class="mensagem">';
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        echo '</div>';          
        
        ?>
    </body>
</html>