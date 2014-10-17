<meta charset="UTF-8"/>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div id="menu">
            <ul class="nav nav-tabs nav-stacked"> 
                <li><?php echo anchor("clienteController/novo", 'Inserir Clientes', 'title="Inserir Clientes"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 130px; margin-top: -10px;"><?php echo anchor("estadoController/novo", 'Inserir Estados', 'title="Inserir Estados"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 260px; margin-top: -30px;"><?php echo anchor("cidadeController/novo", 'Inserir Cidades', 'title="Inserir Cidades"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 390px; margin-top: -50px;"><?php echo anchor("classificacaoController/novo", 'Inserir Classificação', 'title="Inserir Classificação"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 551px; margin-top: -70px;"><?php echo anchor("generoController/novo", 'Inserir Gênero', 'title="Inserir Gênero"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 676px; margin-top: -90px;"><?php echo anchor("locacaoController/novo", 'Inserir Locação', 'title="Inserir Locação"', 'class="novo"'); ?></li>                       
            </ul>
            <ul class="nav nav-tabs nav-stacked"> 
                <li style="margin-left: 807px; margin-top: -110px;"><?php echo anchor("usuarioController/novo", 'Inserir Usuário', 'title="Inserir Usuário"', 'class="novo"'); ?></li>                       
            </ul>
        </div>
    </body>
</html>



