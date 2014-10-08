<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href=" <?php echo base_url('/includes/bot/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href=" <?php echo base_url('/includes/bot/css/bootstrap-theme.css'); ?>"/>
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
        <div class="container">
            <?php
            
            $codigo = 0;
            $codigo = @$loc->codigo;
            echo form_open('locacaoController/alterar_locacao/' . $codigo);
            echo form_fieldset('Informações da Locação','class="col-sm-6 col-sm-offset-3 control-label"');

            $data = implode('/', array_reverse(explode('-', @$loc->data)));
            echo form_label("Data:");
            echo form_input('data', set_value('data', $data), 'size="10" id="datepicker" class="form-control"');
            echo br();

            echo form_label("Valor:");
            echo form_input('valor', set_value('valor', @$loc->valor), 'size="5" class="form-control"');
            echo br();

            echo form_label("Observações:");
            echo form_input('observacoes', set_value('observacoes', @$loc->idade), 'size="5" class="form-control"');
            echo br();


            echo form_label("Cliente Código:");
            echo form_input('cliente_codigo', set_value('cliente_codigo', @$loc->cliente_codigo), 'size="10" class="form-control"');
            echo br();

            echo form_label("Condição de Pagamento:");
            echo form_input('condicao_pagamento_codigo', set_value('condicao_pagamento_codigo', @$loc->condicao_pagamento_codigo), 'size="50" class="form-control"');
            echo br();

            echo form_submit('submit', 'Enviar', 'class="btn btn-success"');
            echo anchor("pessoaController/", "Cancelar", 'class="btn btn-danger"');

            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>
    </body>
</html>
