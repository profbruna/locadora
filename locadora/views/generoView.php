<!DOCTYPE HTML>
<html lang="en-US">
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
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div class="alert ajuste">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php
                        }

                        $this->table->set_heading('Código', 'Nome', 'Ações');
                        foreach ($classificacoes as $c) {
                            $link_alterar = anchor("generoController/alterar_genero/$c->codigo", 'Editar', 'title="Editar"');
                            $link_eliminar = anchor("generoController/eliminar_genero/$c->codigo", 'Excluir', 'title="Excluir"');                   
                        
                            $this->table->add_row($c->codigo, $c->nome, "$link_alterar  $link_eliminar");
                        }
                        
                        ?>
                        
                        <div id="menu">
<!--                            <ul class="nav nav-tabs nav-stacked"> 
                                <li><?php echo anchor("generoController/novo", 'Inserir'); ?></li>                       
                            </ul>-->
                            
                        </div>
                        
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