<html>
    <head>
        <meta charset="utf-8">
        <title> <?php echo $titulo; ?></title>
        
      <link rel="stylesheet" href=" <?php echo base_url('/includes/bot/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href=" <?php echo base_url('/includes/bot/css/bootstrap-theme.css'); ?>"/>
    
      
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <link href="http://127.0.0.1/locadora/includes/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://127.0.0.1/locadora/includes/jquery/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/includes/jquery/js/jquery-ui.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/includes/jquery/js/jquery.maskMoney.js"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#datepicker").datepicker({
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    dateFormat: 'dd/mm/yy',
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                });
            });
        </script>
    </head>

    <body>
        <div>
            <?php
            echo form_open('locacaoController/inserir_locacao');
            echo form_fieldset('Informações da Locação','class="col-sm-6 col-sm-offset-3 control-label"');

            echo form_label("Data:");
            echo form_input('data', '', 'size="50" class="form-control" id="datepicker"');
            echo br();

            echo form_label("Valor:");
            echo form_input('valor', '', 'size="5" class="form-control"');
            echo br();

            echo form_label("Observações:");
            echo form_input('observacoes', '', 'size="5" class="form-control"');
            echo br();

            echo form_label("Cliente Código: ");
            $lista = array();
            $lista[0] = "Selecione um cliente";
            foreach ($clientes as $c){
                $lista[$c->codigo] = $c->nome;
            }
            echo form_dropdown('cliente_codigo', $lista,'',  'class="form-control" ');
            echo br();

            echo form_label("Condição de Pagamento:");
            echo form_input('condicao_pagamento_codigo', '', 'size="10" class="form-control"');
            echo br();


            echo form_submit('submit', 'Enviar', 'class="btn btn-success"');
            echo anchor("locacaoController/", "Cancelar", 'class="btn btn-danger"');

            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>

    </body>
</html>