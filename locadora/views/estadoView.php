<!DOCTYPE HTML>
<html lang="en-US">
    <head>

        <!--<link type="text/css" rel="stylesheet" href="http://127.0.0.1/codeigniter/application/views/css/estilo.css"/>-->

        <meta charset="UTF-8"> 
        <title><?php echo $titulo; ?></title> 
        <!-- JQUERY --> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>');</script> 
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
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div class="alert ajuste">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php
                        }
                        $this->table->set_heading('Código','Nome', 'Ações');
                        foreach ($estados as $e) {
                            $link_alterar = anchor("estadoController/alterar_estado/$e->codigo", 'Editar', 'title="Editar"');
                            $link_eliminar = anchor("estadoController/eliminar_estado/$e->codigo", 'Excluir', 'title="Excluir"');
                            $link_listar = anchor("cidadeController/index/$e->codigo", 'Cidades', 'title="Listar Estados"');
                            $this->table->add_row($e->codigo, $e->nome, "$link_alterar $link_eliminar $link_listar");
                        }
                        ?>

                        <div id="menu">
                            <ul class="nav nav-tabs nav-stacked"> 
                                <li><?php echo anchor("estadoController/novo", 'Inserir', 'title="Inserir Estado"'); ?></li>                       
                            </ul>
                        </div>
                        <h3 class="center"> Lista de Estados </h3> 
                        <hr />
                        
                        <?php
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