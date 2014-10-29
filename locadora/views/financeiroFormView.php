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

 <title><?php echo $titulo; ?></title>
 <form class="form-horizontal">
            <div class="control-group">
<?php

        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
         echo form_open('financeiroController/inserir_financeiro');
        echo form_fieldset('Informações do Financeiro');

        echo form_label("Vencimento: ");
        echo form_input('vencimento', '', 'size="10" class="campo" id="datepicker" required');
        echo br();

        echo form_label("Valor: ");
        echo form_input('valor', '', 'size="10" class="campo"  required');
        echo br();
        
         echo form_label("Valor Pago: ");
        echo form_input('valor_pago', '', 'size="10" class="campo" required');
        echo br();
        
         echo form_label("Valor Saldo: ");
        echo form_input('valor_saldo', '', 'size="10" class="campo" required');
        echo br();

     
         echo form_label("Locação Código: ");
         echo form_input('locacao_codigo', '', 'size="10" class="campo" required');
        echo br();
        echo br();
      

        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');
         ?>
            </div>
        </form>
          </div>
                </div>
            </div>
        </div>
    </body>
</html>
