<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	/**
	 * Metodo que configura numero de registro por pagina
	 */
	function numRegPagina()
	{
		return 50;
	}

	/**
	 * Metodo que cria link de paginacao
	 */
	function criaPaginacao( $controlador, $total, $uri3, $uri )
	{	
		$ci = &get_instance();
		$ci->load->library('pagination');
                if ($uri == 3){
                    $config['base_url']    = base_url("{$controlador}/listar/");
                }
                if ($uri == 4){
                    $config['base_url']    = base_url("{$controlador}/listar/{$uri3}/");
                }
		$config['total_rows']  = $total;
		$config['per_page']    = numRegPagina();
		$config["uri_segment"] = $uri;
		$config['first_link']  = 'Primeiro';
		$config['last_link']   = 'Último';
		$config['next_link']   = 'Próximo';
		$config['prev_link']   = 'Anterior';
                
                $config['last_tag_open']  = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['first_tag_open']  = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['cur_tag_open']   = '<li class="active"><a href="#"><strong>';
                $config['cur_tag_close']  = '</strong></a></li>';
                $config['next_tag_open']  = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_tag_open']  = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['num_tag_open']   = '<li>';
                $config['num_tag_close']  = '</li>';

		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}