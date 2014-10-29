<html>
    <head>

        <!--<link type="text/css" rel="stylesheet" href="http://127.0.0.1/codeigniter/application/views/css/estilo.css"/>-->

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


    </head>
    <body>
        <!-- HEADER --> 
        <header class="container-fluid"> 
            <div class="row-fluid"> 
                <div class="span12">
                    <div id="menu_topo">
                        <?php require_once 'locadora/views/menuView.php'; ?>
                    </div>
                    <div class="navbar"> 
                        <div class="navbar-inner"> 
                            <div class="container"> 
                                <h2 class="center">Lista Financeiro</h2> 
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
                            $this->table->set_heading('Vencimento', 'Valor', 'Valor Pago', 'Valor Saldo', 'Locação Código', 'Ações');
                            foreach ($financeiros as $p) {
                                $link_alterar = anchor("financeiroController/alterar_financeiro/$p->codigo", "Alterar");
                                $link_eliminar = anchor("financeiroController/eliminar_financeiro/$p->codigo", "Eliminar");

                                $vencimento = implode('/', array_reverse(explode('-', $p->vencimento)));

                                $this->table->add_row($vencimento, $p->valor, $p->valor_pago, $p->valor_saldo, $p->locacao_codigo, "$link_alterar $link_eliminar ");
                            }
                            echo $this->table->generate();
                            ?>
                            <hr />

                           
                        </div>
                    </div>
                </div>
            </div>
     
    </body>
</html>