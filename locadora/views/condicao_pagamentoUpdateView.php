<html>
    <head>
        <meta charset="utf-8"/>
         <link rel="stylesheet" href="http://127.0.0.1/CodeIgniter/application/views/css/estilo.css" type="text/css"/>
         <link href="http://127.0.0.1/CodeIgniter/application/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/js/jquery-ui.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/CodeIgniter/application/views/jquery/js/jquery.maskMoney.js"></script>
       
         <script type="text/javascript">
            $(document).ready(function(e){
                $("#datepicker").datepicker({
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'D'],
                    dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                    dayNames:['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
                    monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    dateFormat: 'dd/mm/yy',
                    nextText:'Próximo',
                    prevText:'Anterior'
                   
                });
            });
       
        </script>
        <title><?php echo $titulo; ?></title>
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

                
        echo form_submit('submit','Enviar','class="botao1"');
        echo form_reset('reset', 'Limpar');
        
        echo form_fieldset_close();
        echo form_close();
        echo anchor("condicao_pagamentoController/index/" ,"Condições de Pagamento", 'class=""');
        ?>
    </body>
</html>