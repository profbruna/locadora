<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $titulo; ?></title>

        <!-- JQUERY -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
        <!-- TWITTER BOOTSTRAP CSS -->

        <link href="<?php echo base_url('locadora/views/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo base_url('locadora/views/css/estilo.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- TWITTER BOOTSTRAP JS -->
        <script src="<?php echo base_url('locadora/views/jquery/js/bootstrap.min.js') ?>"></script>      
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
                    timeFormat: 'H:m:s',
                    stepHour: 2,
                    stepMinute: 10,
                    stepSecond: 10
                });
            });
        </script>
    </head>
    <body>
        <!-- HEADER --> 
        <header class="container-fluid"> 
            <div class="row-fluid"> 
                <div class="span12"> 
                    <div id="menu_topo">
                            <?php require_once 'locadora/views/menuView.php'; ?>
                        </div>
                        <div id="menu_topo1">
                            <?php require_once 'locadora/views/listaView.php'; ?>
                        </div>
                    <div class="navbar">
                        <div class="navbar-inner"> 
                            <div class="container"> 
                                <h2 class="center"><?php echo $titulo; ?></h2> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </header> 
        <!-- / HEADER -->
        <div class="container-fluid"> 
            <!-- CLASSE PARA DEFINIR UMA LINHA --> 
            <div class="row-fluid"> 
                <!-- COLUNA OCUPANDO 2 ESPAÇOS NO GRID -->         
                <div class="span12">
                    <div class="well">
                        <?php
                        $codigo = 0;
                        $codigo = @$loc->codigo;
                        echo form_open('locacaoController/alterar_locacao/' . $codigo);
                        echo form_fieldset('Informações da Locação', 'class=""');

                        //$data = implode('/', array_reverse(explode('-', @$loc->data)));
                        date_default_timezone_set('America/Sao_Paulo');
                        $data = substr($loc->data, 0, 10);
                        $hora = substr($loc->data, 11, 8);
                        $data = implode('/', array_reverse(explode('-', $data)));
                        echo form_label("Data:");
                        echo form_input('data', set_value('data', $data . ' ' . $hora), 'size="10" id="datepicker" class=""');
                        echo br();

                        echo form_label("Valor:");
                        echo form_input('valor', set_value('valor', @$loc->valor), 'size="5" class=""');
                        echo br();

                        echo form_label("Observações:");
                        echo form_input('observacoes', set_value('observacoes', @$loc->observacoes), 'size="5" class=""');
                        echo br();

                        $lista = array('Selecione um Cliente');
                        foreach ($clientes as $c) {
                            $lista[$c->codigo] = $c->nome;
                        }
                        echo form_label("Cliente Código:");
                        echo form_dropdown('cliente_codigo', $lista, (@$loc->cliente_codigo), 'class=""');
                        echo br();

                        /* $listagem = array('' => 'Selecione um estado');
                          foreach ($estados as $p) {
                          $listagem[$p->codigo] = "$p->codigo - $p->nome";
                          } */


                        echo form_label("Condição de Pagamento:");
                        $listaCond = array('Selecione uma Condição de Pagamento');
                        foreach ($condicoes as $c) {
                            $listaCond[$c->codigo] = $c->nome;
                        }
                        echo form_dropdown('condicao_pagamento_codigo', $listaCond, (@$loc->condicao_pagamento_codigo), ' class=""');
                        echo br();

                        echo form_submit('submit', 'Enviar', 'class=""');
                        echo anchor("locacaoController/", "Cancelar", 'class=""');

                        echo form_fieldset_close();
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
