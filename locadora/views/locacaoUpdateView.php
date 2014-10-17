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
        <script type="text/javascript" src="http://127.0.0.1/locadora/includes/jquery/js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#datepicker").datetimepicker({
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    dateFormat: 'dd/mm/yy',
                    nextText: 'Próximo',
                    prevText: 'Anterior',
                    timeFormat: 'HH:mm:ss',
                    stepHour: 2,
                    stepMinute: 10,
                    stepSecond: 10
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
            echo form_fieldset('Informações da Locação', 'class="col-sm-6 col-sm-offset-3 control-label"');

            //$data = implode('/', array_reverse(explode('-', @$loc->data)));
            $data  = substr($loc->data, 0, 10);
            $hora = substr($loc->data, 11, 8);
            $data = implode('/', array_reverse(explode('-', $data)));
            echo form_label("Data:");
            echo form_input('data', set_value('data', $data . ' ' . $hora), 'size="10" id="datepicker" class="form-control"');
            echo br();

            echo form_label("Valor:");
            echo form_input('valor', set_value('valor', @$loc->valor), 'size="5" class="form-control"');
            echo br();

            echo form_label("Observações:");
            echo form_input('observacoes', set_value('observacoes', @$loc->observacoes), 'size="5" class="form-control"');
            echo br();

            $lista = array('Selecione um Cliente');
            foreach ($clientes as $c) {
                $lista[$c->codigo] = $c->nome;
            }
            echo form_label("Cliente Código:");
            echo form_dropdown('cliente_codigo', $lista, (@$loc->cliente_codigo), 'class="form-control"');
            echo br();

            /* $listagem = array('' => 'Selecione um estado');
              foreach ($estados as $p) {
              $listagem[$p->codigo] = "$p->codigo - $p->nome";
              } */


            echo form_label("Condição de Pagamento:");
            echo form_input('condicao_pagamento_codigo', set_value('condicao_pagamento_codigo', @$loc->condicao_pagamento_codigo), 'size="50" class="form-control"');
            echo br();

            echo form_submit('submit', 'Enviar', 'class="btn btn-success"');
            echo anchor("locacaoController/", "Cancelar", 'class="btn btn-danger"');

            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>
    </body>
</html>
