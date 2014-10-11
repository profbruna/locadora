<html>
    <head>
        <title></title>
         <meta charset="utf-8"/>
        <link rel="stylesheet" href="http://127.0.0.1/locadora/locadora/views/css/estilo.css" type="text/css"/>
    </head>
    <body>
         <?php 
        echo anchor("usuarioController/novo", "Inserir um novo Usuário",'class="novo"');
        echo '<br>';
        echo '<br>';
       
        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
        
        
        $this->table->set_heading('Nome', 'Login', 'E-mail', 'Senha', 'Inativo', 'Ações');    
 foreach ($usuarios as $p){
     
     $link_alterar = anchor("usuarioController/alterar_usuario/$p->codigo", "Alterar");
     $link_eliminar = anchor("usuarioController/eliminar_usuario/$p->codigo", "Eliminar");
 
     $this->table->add_row($p->nome, $p->login, $p->email,  $p->senha, $p->inativo, "$link_alterar $link_eliminar ");
     
 }
        
   echo $this->table->generate();   
   
   ?>
    </body>
       
</html>




