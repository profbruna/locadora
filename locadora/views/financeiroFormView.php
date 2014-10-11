<html>
    <head>
        <title><?php echo $titulo; ?>  </title>
        <meta charset="utf-8"/>
       <link rel="stylesheet" href="http://127.0.0.1/locadora/locadora/views/css/estilo.css" type="text/css"/>
        <link href="http://127.0.0.1/locadora/locadora/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://127.0.0.1/locadora/locadora/views/jquery/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/locadora/views/jquery/js/jquery-ui.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/locadora/views/jquery/js/jquery.maskMoney.js"></script>
        <script type="text/javascript">
        $(document).ready(function(e){
            $ ("#datepicker").datepicker({
                dayNamesMin:['D', 'S','T', 'Q', 'Q','S','S'],
                dayNamesShort:['Dom','Seg','Ter','Qua', 'Qui','Sex','Sab'],
                dayNames:['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                monthNamesShort:['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out', 'Nov','Dec'],
                monthNames:['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro', 'Novembro','Dezembro'],
                dateFormat:'dd/mm/yy',
                nextText:'Proximo',
                prevText:'Anterior'
            });
        });
        
        
       </script>
            
        <title><?php echo $titulo; ?></title>
    </head>
    <body>

<?php

        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
         echo form_open('financeiroController/inserir_financeiro');
        echo form_fieldset('Informações do Financeiro');

        echo form_label("Vencimento: ");
        echo form_input('vencimento', '', 'size="10" class="campo" id="datepicker" required');
        echo br();

        echo form_label("Valor: ");
        echo form_input('valor', '', 'size="10" class="campo"  required');
        echo br();
        
         echo form_label("Valor Pago: ");
        echo form_input('valor_pago', '', 'size="10" class="campo" required');
        echo br();
        
         echo form_label("Valor Saldo: ");
        echo form_input('valor_saldo', '', 'size="10" class="campo" required');
        echo br();

     
         echo form_label("Locação Código: ");
         echo form_input('locacao_codigo', '', 'size="10" class="campo" required');
        echo br();
       
         
         

        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');
