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

        $this->table->set_heading('Data', 'Valor', 'Observações', 'Cliente Código', 'Condição de Pagamento',  'Ações');
        foreach(@$locacoes as $l) {

            $alterar = anchor("locacaoController/alterar_locacao/$l->codigo", "Alterar" ,'class="btn btn-xs btn-primary"');
            $excluir = anchor("locacaoController/excluir_locacao/$l->codigo", "Excluir",'class="btn btn-xs btn-danger"');
           


            $data = implode('/', array_reverse(explode('-', $l->data)));

            $this->table->add_row($data, $l->valor, $l->observacoes, $l->cliente_codigo, $l->condicao_pagamento_codigo,  "$alterar $excluir");
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