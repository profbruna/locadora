<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $titulo; ?></title>
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
            echo form_open('locacaoProdController/alterar_produto/' . $loc->locacao_codigo . "/" . $loc->produto_codigo);
            echo form_fieldset('Informações do Produto','class=""');

            
            echo form_label("Locação Código:");
            echo form_input('locacao_codigo', set_value('locacao_codigo', @$loc->locacao_codigo), 'size="10" class="" readonly="true"');
            echo br();

            echo form_label("Produto Código:");
            echo form_input('produto_codigo', set_value('produto_codigo', @$loc->produto_codigo), 'size="5" class=""');
            echo br();

            echo form_label("Quantidade:");
            echo form_input('quantidade', set_value('quantidade', @$loc->quantidade), 'size="5" class=""');
            echo br();

            $datadevolucao = implode('/', array_reverse(explode('-', @$loc->data_devolucao)));
            echo form_label("Data Devolução:");
            echo form_input('data_devolucao', set_value('data_devolucao', $datadevolucao), 'size="10" class="" id="datepicker"');
            echo br();

            
            echo form_submit('submit', 'Enviar', 'class=""');
            echo anchor("locacaoProdController/", "Cancelar", 'class=""');

            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>
    </body>
</html>
