<!DOCTYPE HTML>
<html lang="en-US">
    <head>

        <!--<link type="text/css" rel="stylesheet" href="http://127.0.0.1/codeigniter/application/views/css/estilo.css"/>-->

        <meta charset="UTF-8"> 
        <title><?php echo $titulo; ?></title> 
        <!-- JQUERY --> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script> 
        <!-- TWITTER BOOTSTRAP CSS --> 
        <link href="http://127.0.0.1/codeigniter/application/views/css/bootstrap.css" rel="stylesheet" type="text/css"/>  
        <link href="http://127.0.0.1/codeigniter/application/views/css/estilo.css" rel="stylesheet" type="text/css"/>
        <!-- TWITTER BOOTSTRAP JS --> 
        <script src="http://127.0.0.1/codeigniter/application/views/jquery/js/bootstrap.min.js"></script> 


    </head>
    <body>
        <!-- HEADER --> 
        <header class="container-fluid"> 
            <div class="row-fluid"> 
                <div class="span12"> 
                    <div class="navbar"> 
                        <div class="navbar-inner"> 
                            <div class="container"> 
                                <h2 class="center">Cadastro de Cidades</h2> 
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

                        
                        $this->table->set_heading('Código', 'Nome', 'Ações');
                        foreach ($cidades as $c) {
                            $link_alterar = anchor("cidadeController/alterar_cidade/$c->codigo", 'Editar', 'title="Editar"');
                            $link_eliminar = anchor("cidadeController/eliminar_cidade/$c->codigo", 'Excluir', 'title="Excluir"');                   
                            $link_listar = anchor("estadoController/index/$c->codigo", 'Estados', 'title="Listar Estados"');
                            $this->table->add_row($c->codigo, $c->nome, "$link_alterar $link_eliminar");
                        }
                        
                        ?>
                        
                        <div id="menu">
                            <ul class="nav nav-tabs nav-stacked"> 
                                <li><?php echo anchor("cidadeController/novo", 'Inserir'); ?></li>                       
                            </ul>
                            
                        </div>
                        <h3 class="center"> <?php echo $titulo; ?> </h3> 
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