<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://127.0.0.1/locadora/locadora/views/css/estilo.css" type="text/css"/>
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
         
        <h1><?php echo $titulo; ?></h1>
        <?php
        $codigo = 0;
        $codigo = @$financeiro->codigo;
        
        $vencimento ="";
        $vencimento = implode('/',
        array_reverse(explode('-', $financeiro->vencimento )));
        
        echo form_open("financeiroController/alterar_financeiro/$codigo");
        echo form_fieldset('Alteração do Financeiro');
        
         
         echo form_label("Vencimento: ");
        echo form_input('vencimento', set_value('vencimento', @$vencimento), 'size="10" id="datepicker" class="campo"');
        echo br();
        
        echo form_label("Valor: ");
        //Como era antes
       // echo form_input('conta_codigo', set_value('conta_codigo', @$lancamento->conta_codigo), 'size="5" class="campo"');
        echo form_input('valor', set_value('valor',@$financeiro->valor), 'required readonly="true" size="5" class="campo" ');
        echo br();
        
        
       
        
        echo form_label("Valor Pago: ");
        echo form_input('valor_pago', set_value('valor_pago', @$financeiro->valor_pago), 'size="10" class="campo"');
        echo br();
        
       
        
        echo form_label("Valor Saldo: ");
        echo form_input('valor_saldo', set_value('valor_saldo', @$financeiro->valor_saldo), 'size="10" class="campo"');
        echo br();
        
            echo form_label("Locação Código: ");
        echo form_input('locacao_codigo', set_value('locacao_codigo', @$financeiro->locacao_codigo), 'size="10" class="campo"');
        echo br();
        
       
        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');
        
        
        
        
        
        
        echo form_fieldset_close();
        echo form_close();
        
        
       
        ?>
    </body>
        
        
</html>



