<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://127.0.0.1/codeingnate/application/views/css/estilo.css" type="text/css"/>
        <link rel="stylesheet" href="http://127.0.0.1/codeingnate/application/views/css/estilo.css" type="text/css"/>
        <link href="http://127.0.0.1/codeingnate/application/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
           
        <title><?php echo $titulo; ?></title>
    </head>
    <body>
         
        <h1><?php echo $titulo; ?></h1>
        <?php
        $codigo = 0;
        $codigo = @$usuario->codigo;
        
       
        
        
        
        echo form_open("usuarioController/alterar_usuario/$codigo");
        echo form_fieldset('Informações pessoais');
        
         
        
        echo form_label("Nome: ");
        echo form_input('nome', set_value('nome', @$usuario->nome), 'size="50" class="campo"');
        echo br();
        
        echo form_label("Login: ");
        echo form_input('login', set_value('login',@$usuario->login), 'size="5" class="campo"');
        echo br();
        
        echo form_label("E-mail: ");
        echo form_input('email', set_value('email', @$usuario->email), 'size="5" class="campo"');
        echo br();
        
        echo form_label("Senha: ");
        echo form_input('senha', set_value('senha', @$usuario->senha), 'size="10" class="campo"');
        echo br();
        
        echo form_label("Inativo: ");
        echo form_input('inativo', set_value('inativo', @$usuario->inativo), 'size="50" class="campo"');
        echo br();
        
        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');
        
        
        
        
        
        
        echo form_fieldset_close();
        echo form_close();
          echo anchor("usuarioController/index", "Voltar", 'class="novo"');
        ?>
    </body>
        
        
</html>




