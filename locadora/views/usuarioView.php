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
                         <h3 class="center"> <?php echo $titulo; ?> </h3> 
                        <hr />
                        <?php
                        
                        echo '<br>';
                        echo '<br>';

                        if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                        }


                        $this->table->set_heading('Nome', 'Login', 'E-mail', 'Senha', 'Inativo', 'Ações');
                        foreach ($usuarios as $p) {

                            $link_alterar = anchor("usuarioController/alterar_usuario/$p->codigo", "Alterar");
                            $link_eliminar = anchor("usuarioController/eliminar_usuario/$p->codigo", "Eliminar");

                            $this->table->add_row($p->nome, $p->login, $p->email, $p->senha, $p->inativo, "$link_alterar $link_eliminar ");
                        }

                        echo $this->table->generate();
                        ?>

                      


                        <hr/>
                        <div class="pagination pagination-centered">
<?php
echo $paginacao;
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </body>

</html>




