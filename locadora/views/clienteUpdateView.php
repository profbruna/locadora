<html>
    <head>
        <meta charset="UTF-8"> 
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
                                <h2 class="center" style="margin-top: -100px;"><?php echo $titulo; ?></h2> 
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
                        $codigo = @$cliente->codigo;

                        $nascimento = 0;
                        $codigo = @$cliente->codigo;

                        echo form_open("clienteController/alterar_cliente/$codigo");
                        echo form_fieldset('Informações pessoais');
                        ?>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <?php
                                echo form_label("Nome:");
                                echo form_input('nome', set_value('nome', @$cliente->nome), 'size="50" class="campo" required');
                                echo br();

                                echo form_label("Endereço:");
                                echo form_input('endereco', set_value('endereco', @$cliente->endereco), 'size="5" class="campo"');
                                echo br();

                                echo form_label("Cpf:");
                                echo form_input('cpf', set_value('cpf', @$cliente->cpf), 'size="5" class="campo" required');
                                echo br();

                                echo form_label("Rg:");
                                echo form_input('rg', set_value('rg', @$cliente->rg), 'size="10" class="campo" required');
                                echo br();

                                echo form_label("Telefone:");
                                echo form_input('telefone', set_value('telefone', @$cliente->telefone), 'size="10" class="campo"');
                                echo br();

                                echo form_label("E-mail:");
                                echo form_input('email', set_value('email', @$cliente->email), 'size="50" class="campo"');
                                echo br();
                                
                                echo form_label("Cidade:");
                                echo form_input('cidade_codigo', set_value('cidade_codigo', @$cliente->cidade_codigo), 'size="50" class="campo"');
                                echo br();

                                echo form_submit('submit', 'Enviar', 'class="botao1"');
                                echo form_reset('reset', 'Limpar');

                                echo form_fieldset_close();
                                echo form_close();
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php


