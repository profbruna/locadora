<?php


 
        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
         echo form_open('financeiroController/inserir_financeiro');
        echo form_fieldset('Informações do Financeiro');

        echo form_label("Venciomento: ");
        echo form_input('vencimento', '', 'size="10" class="campo" id="datepicker" required');
        echo br();

        echo form_label("Valor: ");
        echo form_input('valor', '', 'size="10" class="campo"  required');
        echo br();
        
         echo form_label("Valor Pago: ");
        echo form_input('valor_pago', '', 'size="10" class="campo" required');
        echo br();
        
         echo form_label("Valor Saldo: ");
        echo form_input('valor_saldo', '', 'size="10" class="campo" required');
        echo br();

     
         echo form_label("Locação Código: ");
        echo form_input('locacao_codigo', '', 'size="3" class="campo"');
        echo br();
        echo br();

        echo form_submit('submit', 'Enviar', 'class="botao1"');
        echo form_reset('reset', 'Limpar');
