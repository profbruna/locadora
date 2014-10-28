<meta charset="UTF-8"/>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div id="menu">
            <ul class="nav nav-tabs nav-stacked"> 
                <li><?php echo anchor("clienteController/index", 'Listar Clientes', 'title="Listar Clientes"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 130px; margin-top: -10px;"><?php echo anchor("estadoController/index", 'Listar Estados', 'title="Listar Estados"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 260px; margin-top: -30px;"><?php echo anchor("cidadeController/index", 'Listar Cidades', 'title="Listar Cidades"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 390px; margin-top: -50px;"><?php echo anchor("classificacaoController/index", 'Listar Classificação', 'title="Listar Classificação"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 551px; margin-top: -70px;"><?php echo anchor("generoController/index", 'Listar Gênero', 'title="Listar Gênero"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 676px; margin-top: -90px;"><?php echo anchor("locacaoController/index", 'Lisatr Locação', 'title="Listar Locação"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 807px; margin-top: -110px;"><?php echo anchor("usuarioController/index", 'Listar Usuário', 'title="Listar Usuário"', 'class="novo"'); ?></li>                       
            </ul>
        </div>
    </body>
</html>



