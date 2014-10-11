<html>
    <head>
        <title><?php echo $titulo; ?>  </title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="http://127.0.0.1/codeingnate/application/views/css/estilo.css" type="text/css"/>
         
    </head>
    <body>
        
        <h1> <?php echo $titulo; ?></h1>
        
        
        <?php
        
        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
        
        echo form_open('usuarioController/inserir_usuario');
        echo form_fieldset('Informações do Usúario');

        echo form_label("Nome: ");
        echo form_input('nome', '', 'size="50" class="campo" required');
        echo br();

        echo form_label("Login: ");
        echo form_input('login', '', 'size="5" class="campo" ');
        echo br();

        echo form_label("E-mail: ");
        echo form_input('email', '', 'size="50" class="campo"');
        echo br();

        echo form_label("Senha: ");
        echo form_password('senha', '', 'size="10"  class="campo" required');
        echo br();

        echo form_label("Inativo: ");
        echo form_input('inativo', '', 'size="1" class="campo" required');
        echo br();

  
        echo br();

        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');



        echo form_fieldset_close();
        echo form_close();
        ?>
    </body>
    <html

