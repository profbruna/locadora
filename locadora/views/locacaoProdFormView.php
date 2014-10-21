<html>
    <head>
        <meta charset="utf-8">
        <title> <?php echo $titulo; ?></title>
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
            echo form_open('locacaoProdController/inserir_produto');
            echo form_fieldset('Informações da Locação','class=""');

            echo form_label("Locação Código:");
            echo form_input('locacao_codigo',  set_value('locacao_codigo',$this->uri->segment(3)),  'class="" readonly="true"');
            echo br();
            
            

            echo form_label("Produto:");
            //$listaProd = array();
            //$listaProd[0] = "Selecione um Produto";
            //foreach ($produtos as $p){
               // $listaProd[$p->codigo] = $p->nome;
            //}
           // echo form_dropdown('produto_codigo', $listaProd,'','class="form-control"');
            echo form_input('produto_codigo','', 'size="10" class=""');
            echo br();

            echo form_label("Quantidade:");
            echo form_input('quantidade', '',  'size="5" class=""');
            echo br();

            echo form_label("Data Devolução: ");
            echo form_input('data_devolucao', '', 'size="10" class="" id="datepicker"');
            echo br();


            echo form_submit('submit', 'Enviar', 'class=""');
            echo anchor("locacaoProdController/", "Cancelar", 'class=""');

            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>

    </body>
</html>