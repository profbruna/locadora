
<html>

    <meta charset="UTF-8"/>
    <head>
        <title></title>
        <link rel="stylesheet" href="http://127.0.0.1/locadora/application/views/css/estilo.css" type="text/css"/> </head>
    <body>
        <?php

        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        $this->table->set_heading('Vencimento', 'Valor', 'Valor Pago', 'Valor Saldo', 'Locação Código', 'Ações');
        foreach ($financeiros as $p) {
            $link_alterar = anchor("financeiroController/alterar_financeiro/$p->codigo", "Alterar");
            $link_eliminar = anchor("financeiroController/eliminar_financeiro/$p->codigo", "Eliminar");

            $vencimento = implode('/', array_reverse(explode('-', $p->vencimento)));

            $this->table->add_row($vencimento, $p->valor, $p->valor_pago, $p->valor_saldo, $p->locacao_codigo, "$link_alterar $link_eliminar ");
        }
        echo $this->table->generate();
        ?>
    </body>
</html>