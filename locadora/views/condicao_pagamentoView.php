
<html>
    <head>
        <meta charset="utf-8"/> 

        <!-- JQUERY -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
        <!-- TWITTER BOOTSTRAP CSS -->
       
        <link href="<?php echo base_url('locadora/views/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo base_url('locadora/views/css/estilo.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- TWITTER BOOTSTRAP JS -->
        <script src="<?php echo base_url('locadora/views/jquery/js/bootstrap.min.js') ?>"></script>      
        <script src="<?php echo base_url('locadora/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css') ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery-1.9.1.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery-ui.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('locadora/views/jquery/js/jquery.maskMoney.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#datepicker").datepicker({
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    montNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    dateFormat: 'dd/mm/yy',
                    nextText: 'Próximo',
                    prevText: 'Anterior'

                });
            });

        </script>   
    </head>
    <body>
        <?php 
            
        echo anchor("condicao_pagamentoController/novo","Inserir",'class=""');
       
        
            $this->table->set_heading('Código','Nome','Parcelas','Nº de Dias','Ações');
            
            foreach ($condicoes_pagamentos as $p){
                $link_alterar = anchor("condicao_pagamentoController/alterar_condicao_pagamento/$p->codigo","Alterar");
                $link_eliminar = anchor("condicao_pagamentoController/eliminar_condicao_pagamento/$p->codigo","Eliminar");
                /*$link_listar = anchor("condicao_pagamentoController/index/$p->codigo","Listar Condição de Pagamento");*/
                
                                                
                $this->table->add_row($p->codigo, $p->nome, $p->parcelas,$p->dias,"$link_alterar $link_eliminar");
                
                
            }
        echo$this->table->generate();
        
        echo '<div class="mensagem">';
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        echo '</div>';
        ?>
<!--        <div id="paginacao">
            
            <?php 
            echo ($paginacao);
            ?>
        </div>-->
    </body>
</html>

