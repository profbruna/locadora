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
        <script src="<?php echo base_url('locadora/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css') ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery-1.9.1.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery-ui.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery.maskMoney.js') ?>"></script>
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
                        echo form_open('locacaoProdController/alterar_produto/' . $loc->locacao_codigo . "/" . $loc->produto_codigo);
                        echo form_fieldset('Informações do Produto', 'class=""');


                        echo form_label("Locação:");
                        echo form_input('locacao_codigo', set_value('locacao_codigo', @$loc->locacao_codigo), 'size="10" class="" readonly="true"');
                        echo br();

                        echo form_label("Produto:");
                        $listaProd = array();
                        $listaProd[0] = "Selecione um Produto";
                        foreach ($produtos as $p) {
                            $listaProd[$p->codigo] = $p->nome;
                        }
                        echo form_dropdown('produto_codigo', $listaProd, (@$loc->produto_codigo), 'class=""');
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
                </div>
            </div>
        </div>
    </body>
</html>
