<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8"> 
        <!-- JQUERY --> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script> 
        <!-- TWITTER BOOTSTRAP CSS --> 
        <link href="<?php echo base_url('locadora/views/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>  
        <link href="<?php echo base_url('locadora/views/css/estilo.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- TWITTER BOOTSTRAP JS --> 
        <script src="<?php echo base_url('locadora/views/jquery/js/bootstrap.min.js') ?>"></script> 
    </head>
    <body>
        <!-- HEADER --> 
        <header class="container-fluid"> 
            <div class="row-fluid"> 
                <div class="span12">
                    <div id="menu_topo">
                        <?php require_once 'locadora/views/menuView.php'; ?>
                    </div>
                    <div id="menu_topo1">
                       <?php require_once 'locadora/views/listaView.php'; ?>
                    </div>
                    <div class="navbar"> 
                        <div class="navbar-inner"> 
                            <div class="principal"> 
                                <h2 class="center1">Bem Vindo!!!</h2> 
                            </div> 
                        </div> 
                    </div>
                    
                </div> 
            </div> 
        </header> 
        <!-- / HEADER -->
    </body>
</html>
