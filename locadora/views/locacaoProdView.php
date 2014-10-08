<html>
    <head>
        <meta charset="utf-8">
        <title> <?php echo $titulo; ?></title>
          <link rel="stylesheet" href=" <?php echo base_url('/includes/bot/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href=" <?php echo base_url('/includes/bot/css/bootstrap-theme.css'); ?>"/>

        
    </head>

    <body>
        <div class="container">
        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }

        echo anchor("locacaoProdController/novo", "Inserir",'class="btn btn-xs btn-primary"');


        $tmpl = array('table_open' => '<table class="table table-striped">');

        $this->table->set_heading('Locação Código', 'Produto Código', 'Quantidade', 'Data Devolução', 'Ações');
        foreach(@$prodlocacoes as $p) {

            $alterar = anchor("locacaoProdController/alterar_produto/$p->codigo", "Alterar" ,'class="btn btn-xs btn-primary"');
            $excluir = anchor("locacaoProdController/excluir_produto/$p->codigo", "Excluir",'class="btn btn-xs btn-danger"');
           


            $datadevolucao = implode('/', array_reverse(explode('-', $p->data_devolucao)));

            $this->table->add_row($p->locao_codigo, $p->produto_codigo, $p->quantidade, $datadevolucao ,"$alterar $excluir");
        }
        $this->table->set_template($tmpl);
        echo $this->table->generate();
        ?>
        <div id="paginacao">
            <?php
            echo $paginacao;
            ?>
        </div>
            </div>
    </body>
</html>