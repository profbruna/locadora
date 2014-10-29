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
        $codigo = @$financeiro->codigo;
        
       /* $vencimento ="";
        $vencimento = implode('/',
        array_reverse(explode('-', $financeiro->vencimento )));*/
        
        echo form_open("financeiroController/alterar_financeiro/$codigo");
        echo form_fieldset('Alteração do Financeiro');
        
         
         echo form_label("Vencimento: ");
        echo form_input('vencimento', set_value('vencimento', @$financeiro->vencimento), 'size="10"  class="campo"');
        echo br();
        
        echo form_label("Valor: ");
        //Como era antes
       // echo form_input('conta_codigo', set_value('conta_codigo', @$lancamento->conta_codigo), 'size="5" class="campo"');
        echo form_input('valor', set_value('valor',@$financeiro->valor), 'required readonly="true" size="5" class="campo" ');
        echo br();
        
        echo form_label("Valor Pago: ");
        echo form_input('valor_pago', set_value('valor_pago', @$financeiro->valor_pago), 'size="10" class="campo"');
        echo br();
        
       
        
        echo form_label("Valor Saldo: ");
        echo form_input('valor_saldo', set_value('valor_saldo', @$financeiro->valor_saldo), 'size="10" class="campo"');
        echo br();
        
            echo form_label("Locação Código: ");
        echo form_input('locacao_codigo', set_value('locacao_codigo', @$financeiro->locacao_codigo), 'size="10" class="campo"');
        echo br();
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
