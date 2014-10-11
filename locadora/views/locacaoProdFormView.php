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
            echo form_open('locacaoProdController/inserir_produto');
            echo form_fieldset('Informações da Locação','class="col-sm-6 col-sm-offset-3 control-label"');

            echo form_label("Locação Código:");
            echo form_input('locacao_codigo',  set_value('locacao_codigo',$this->uri->segment(3)),  'class="form-control" readonly="true"');
            echo br();
            
            /*echo form_dropdown('estado_codigo', $listagem, set_value('estado_codigo', @$estadoAtual), 'required');
                        }*/

            echo form_label("Produto Código:");
            echo form_input('produto_codigo', '', 'size="5" class="form-control"');
            echo br();

            echo form_label("Quantidade:");
            echo form_input('quantidade', '', 'size="5" class="form-control"');
            echo br();

            echo form_label("Data Devolução: ");
            echo form_input('data_devolucao', '', 'size="10" class="form-control" id="datepicker"');
            echo br();


            echo form_submit('submit', 'Enviar', 'class="btn btn-success"');
            echo anchor("locacaoProdController/", "Cancelar", 'class="btn btn-danger"');

            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>

    </body>
</html>