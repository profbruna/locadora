<html>
    <head>
        <meta charset="utf-8">
        <title> <?php echo $titulo; ?></title>
        <link type="text/css" rel="stylesheet" href="http://127.0.0.1/locadora/locadora/views/css/estilo.css"/>
    </head>

    <body>
        <div class="container">
        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }

        echo anchor("locacaoProdController/novo/".$this->uri->segment(3), "Inserir",'class=""');


        $tmpl = array('table_open' => '<table class="">');

        $this->table->set_heading('Locação Código', 'Produto Código', 'Quantidade', 'Data Devolução', 'Ações');
        foreach(@$prodlocacoes as $p) {

            $alterar = anchor("locacaoProdController/alterar_produto/$p->locacao_codigo/$p->produto_codigo", "Alterar");
            $excluir = anchor("locacaoProdController/excluir_produto/$p->locacao_codigo/$p->produto_codigo", "Excluir");
        
            
            $datadevolucao = implode('/', array_reverse(explode('-', $p->data_devolucao)));

            $this->table->add_row($p->locacao_codigo, $p->produto_codigo . ' - ' . $p->produto_nome, $p->quantidade . ' Unidade(s)', $datadevolucao ,"$alterar $excluir");
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