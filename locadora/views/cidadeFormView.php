<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>  

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
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#datepicker").datepicker({
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    montNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
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
                        if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                        }

                        echo form_open('cidadeController/inserir_cidade');
                        echo form_fieldset('Informações das Cidades');

                        echo form_label("Nome: ");
                        echo form_input('nome', '', 'size="8" class="campo" required');
                        echo br();

                        echo form_label("Estado: ");
                        $listagem = array('' => 'Selecione um Estado');
                        foreach ($estados as $e) {
                            $listagem[$e->codigo] = "$e->codigo - $e->nome";
                        }
                        echo form_dropdown('estado_codigo', $listagem, set_value('estado_codigo', @$estadoAtual), 'required');
                        echo br();

                        echo form_submit('submit', 'Enviar', 'class="botao1"');
                        echo form_reset('reset', 'Limpar');

                        echo form_fieldset_close();
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>