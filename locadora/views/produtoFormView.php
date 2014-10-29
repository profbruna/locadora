<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>  

        <!-- JQUERY --> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script> 
        <!-- TWITTER BOOTSTRAP CSS --> 

        <link href="http://127.0.0.1/locadora/locadora/views/css/bootstrap.css" rel="stylesheet" type="text/css"/>  
        <link href="http://127.0.0.1/locadora/locadora/views/css/estilo.css" rel="stylesheet" type="text/css"/>
        <!-- TWITTER BOOTSTRAP JS --> 
        <script src="http://127.0.0.1/locadora/locadora/views/jquery/js/bootstrap.min.js"></script>       
        <script src="http://127.0.0.1/locadora/locadora/views/jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css"></script>       
        <script type="text/javascript" src="http://127.0.0.1/locadora/locadora/views/jquery/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/locadora/views/jquery/js/jquery-ui.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/locadora/views/jquery/js/jquery.maskMoney.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/locadora/includes/jquery/js/jquery-ui-timepicker-addon.js"></script>
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
                            <div class="container"> 

                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </header> 
        <!-- / HEADER -->
        <div class="container-fluid"> 
            <!-- CLASSE PARA DEFINIR UMA LINHA --> 
            <div class="row-fluid"> 
                <!-- COLUNA OCUPANDO 2 ESPAÇOS NO GRID -->         
                <div class="span12">
                    <div class="well">
                        <h3 class="center"> <?php echo $titulo; ?> </h3> 
                        <hr />


                        <?php
                        if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                        }

                        echo form_open('produtoController/inserir_produto');
                        echo form_fieldset('Informações dos Produtos');
                        ?>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <?php
                                echo form_label("Nome: ");
                                echo form_input('nome', '', 'size="50" class="campo" required');
                                echo br();

                                echo form_label("Quantidade: ");
                                echo form_input('quantidade', '', 'size="5" class="campo"');
                                echo br();

                                echo form_label("Quantidade Locado: ");
                                echo form_input('quantidade_locado', '', 'size="5" class="campo" required');
                                echo br();

                                echo form_label("Quantidade Disponivel: ");
                                echo form_input('quantidade_disponivel', '', 'size="10" class="campo" required');
                                echo br();

                                echo form_label("Valor: ");
                                echo form_input('valor', '', 'size="10" class="campo"');
                                echo br();

                                echo form_label("Inativo: ");
                                echo form_checkbox('inativo', 'S', FALSE, 'size="50" class="campo"');
                                echo br();

                                echo form_label("Data Cadastro: ");
                                echo form_input('data_cadastro', '', 'size="50" class="campo" required id="datepicker"');
                                echo br();

                                echo form_label("Numero Serie: ");
                                echo form_input('numero_serie', '', 'size="50" class="campo" required ');
                                echo br();

                                echo form_label("Detalhes: ");
                                echo form_input('detalhes', '', 'size="50" class="campo" required');
                                echo br();

                                echo form_label("Genero Codigo: ");
                                $listagem = array('' => 'Selecione o Genero');
                                foreach ($generos as $e) {
                                    $listagem[$e->codigo] = "$e->codigo - $e->nome";
                                }
                                echo form_dropdown('genero_codigo', $listagem, set_value('genero_codigo', @$generoAtual), 'required');
                                echo br();

                                echo form_label("Classificação Codigo: ");
                                $listagem = array('' => 'Selecione a Classificaçâo');
                                foreach ($classificacoes as $e) {
                                    $listagem[$e->codigo] = "$e->codigo - $e->nome";
                                }
                                echo form_dropdown('classificacao_codigo', $listagem, set_value('classificacao_codigo', @$classificacaoAtual), 'required');
                                echo br();

                                echo form_label("Tipo Codigo: ");
                                $listagem = array('' => 'Selecione o Tipo');
                                foreach ($tipos as $e) {
                                    $listagem[$e->codigo] = "$e->codigo - $e->nome";
                                }
                                echo form_dropdown('tipo_codigo', $listagem, set_value('tipo_codigo', @$tipoAtual), 'required');
                                echo br();

                                echo form_label("Dias Devolução: ");
                                echo form_input('dias_devolucao', '', 'size="5" class="campo" required');
                                echo br();

                                echo form_submit('submit', 'Enviar', 'class="botao1"');
                                echo form_reset('reset', 'Limpar');

                                echo form_fieldset_close();
                                echo form_close();
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>