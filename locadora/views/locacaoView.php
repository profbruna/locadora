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

        echo anchor("locacaoController/novo", "Inserir",'class="btn btn-xs btn-primary"');


        $tmpl = array('table_open' => '<table class="table table-striped">');

        $this->table->set_heading('Data', 'Valor', 'Observações', 'Cliente', 'Condição de Pagamento',  'Ações');
        foreach(@$locacoes as $l) {

            $alterar = anchor("locacaoController/alterar_locacao/$l->codigo", "Alterar" );
            $excluir = anchor("locacaoController/excluir_locacao/$l->codigo", "Excluir");
            $inserirProd = anchor("locacaoProdController/novo/$l->codigo", "Inserir Produto");
            $listarProd = anchor("locacaoProdController/index/$l->codigo", "Listar Produtos");
            //$listarProd = anchor("locacaoProdController/index/".$this->uri->segment(3), "Listar Produtos");
            $financeiro = anchor("financeiroController/index/$l->codigo", "Financeiro");
            
            date_default_timezone_set('America/Sao_Paulo');
            $data  = substr($l->data, 0, 10);
            $hora = substr($l->data, 11, 8);
            $data = implode('/', array_reverse(explode('-', $data)));         

            $this->table->add_row($data . ' ' . $hora, $l->valor, $l->observacoes, $l->cliente_codigo. ' - ' .$l->cliente_nome, $l->condicao_pagamento_codigo. ' - ' . $l->condicao_pagamento_nome,  "$alterar $excluir $inserirProd $listarProd $financeiro" );
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