<meta charset="UTF-8"/>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div id="menu">
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: -85px; margin-top: 30px;"><?php echo anchor("tipoController/index", 'Listar Tipos', 'title="Listar Tipos"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 30px;"><?php echo anchor("clienteController/index", 'Listar Clientes', 'title="Listar Clientes"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 160px; margin-top: -10px;"><?php echo anchor("estadoController/index", 'Listar Estados', 'title="Listar Estados"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 290px; margin-top: -30px;"><?php echo anchor("cidadeController/index", 'Listar Cidades', 'title="Listar Cidades"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 420px; margin-top: -50px;"><?php echo anchor("produtoController/index", 'Listar Produtos', 'title="Listar Produtos"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 555px; margin-top: -70px;"><?php echo anchor("classificacaoController/index", 'Listar Classificação', 'title="Listar Classificação"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 715px; margin-top: -90px;"><?php echo anchor("generoController/index", 'Listar Gênero', 'title="Listar Gênero"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 840px; margin-top: -110px;"><?php echo anchor("locacaoController/index", 'Listar Locação', 'title="Listar Locação"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 970px; margin-top: -130px;"><?php echo anchor("usuarioController/index", 'Listar Usuário', 'title="Listar Usuário"', 'class="novo"'); ?></li>                       
            </ul>
        </div>
    </body>
</html>



