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
                        $codigo = @$usuario->codigo;





                        echo form_open("usuarioController/alterar_usuario/$codigo");
                        echo form_fieldset('Informações Pessoais');



                        echo form_label("Nome: ");
                        echo form_input('nome', set_value('nome', @$usuario->nome), 'size="50" class="campo" required');
                        echo br();

                        echo form_label("Login: ");
                        echo form_input('login', set_value('login', @$usuario->login), 'size="10" class="campo"  required');
                        echo br();

                        echo form_label("E-mail: ");
                        echo form_input('email', set_value('email', @$usuario->email), 'size="50" class="campo"  required');
                        echo br();

                        echo form_label("Senha: ");
                        echo form_input('senha', set_value('senha', @$usuario->senha), 'size="30" class="campo" required');
                        echo br();


                        if (@$usuario->inativo == 'S') {
                            echo form_checkbox('inativo', 'S', TRUE, 'size="1" class="campo" ');
                        } else {
                            echo form_checkbox('inativo', 'S', FALSE, 'size="1" class="campo" ');
                        }

                        echo " Inativo";
                        echo br();
                        echo br();

                        echo form_submit('submit', 'Enviar', 'class="botao1"');
                        echo form_reset('reset', 'Limpar');
 echo br();
                        echo br();





                        echo form_fieldset_close();
                        echo form_close();
                        echo anchor("usuarioController/index", "Voltar", 'class="novo"');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


