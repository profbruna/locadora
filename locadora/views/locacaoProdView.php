<html>
    <head>
        <meta charset="utf-8">
        <title> <?php echo $titulo; ?></title>
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
                                <h2 class="center">Cadastro de Locação de Produtos</h2> 
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
                        $this->table->set_heading('Locação Código', 'Produto Código', 'Quantidade', 'Data Devolução', 'Ações');
                        foreach (@$prodlocacoes as $p) {

                            $alterar = anchor("locacaoProdController/alterar_produto/$p->locacao_codigo/$p->produto_codigo", "Alterar");
                            $excluir = anchor("locacaoProdController/excluir_produto/$p->locacao_codigo/$p->produto_codigo", "Excluir");


                            $datadevolucao = implode('/', array_reverse(explode('-', $p->data_devolucao)));

                            $this->table->add_row($p->locacao_codigo, $p->produto_codigo . ' - ' . $p->produto_nome, $p->quantidade . ' Unidade(s)', $datadevolucao, "$alterar $excluir");
                        }
                        ?>
                        <div id="menu">
                            <ul class="nav nav-tabs nav-stacked"> 
                                <li><?php echo anchor("locacaoProdController/novo/" . $this->uri->segment(3), "Inserir"); ?></li>                       
                            </ul>
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