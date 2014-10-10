<meta charset="UTF-8"/>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        echo form_open('acessoController/faca_login'); //isenrir_pessoa
        echo form_fieldset('Faça o seu Login');
        echo form_label("Login: ");
        echo form_input('login', '', 'size="50" class="campo" required');
        echo br();
        echo br();

        echo form_label("Senha: ");
        echo form_password('senha', '', 'size="10" class="campo" ');
        echo br();
        echo br();
        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');

        echo form_fieldset_close();
        echo form_close();
        ?>
    </body>
</html>



