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
                                <h2 class="center">Cadastro de Clientes</h2> 
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
                        $this->table->set_heading('Nome', 'Endereço', 'Cpf', 'Rg', 'Telefone', 'E-mail', 'Cidade', 'Ações');
                        foreach ($clientes as $p) {
                            $link_alterar = anchor("clienteController/alterar_cliente/$p->codigo", 'Editar', 'title="Editar"');
                            $link_eliminar = anchor("clienteController/eliminar_cliente/$p->codigo", 'Excluir', 'title="Excluir"');
                            $link_listar = anchor("cidadeController/index/$p->codigo", 'Cidades', 'title="Listar Cidades"');
                          
                            $this->table->add_row($p->nome, $p->endereco, $p->cpf, $p->rg, $p->telefone, $p->email, $p->cidade_codigo.' - '.$p->cidade_nome,"$link_alterar $link_eliminar $link_listar ");
                        }
                        ?>

                        <div id="menu">
                            <ul class="nav nav-tabs nav-stacked"> 
                                <li><?php echo anchor("clienteController/novo", 'Inserir Clientes', 'title="Inserir Clientes"', 'class="novo"'); ?></li>                       
                            </ul>
                            <ul class="nav nav-tabs nav-stacked"> 
                                <li style="margin-left: 130px; margin-top: -10px;"><?php echo anchor("estadoController/novo", 'Inserir Estados', 'title="Inserir Estados"', 'class="novo"'); ?></li>                       
                            </ul>
                            <ul class="nav nav-tabs nav-stacked"> 
                                <li style="margin-left: 260px; margin-top: -30px;"><?php echo anchor("cidadeController/novo", 'Inserir Cidades', 'title="Inserir Cidades"', 'class="novo"'); ?></li>                       
                            </ul>
                        </div>
                        <h3 class="center"> Lista de Clientes </h3> 
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