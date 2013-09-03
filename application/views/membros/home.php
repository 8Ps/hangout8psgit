
	
	
	
		
	

	
	
		

		
			<?php if($this->session->userdata('is_logged_in') AND $this->session->userdata('papel') == 1) {?>
				
				<div class="content_admin">
	    	
	    		<a href="<?php echo base_url()?>usuarios/admin/add_usuario">Adicionar Parceiro</a><br/>
	    		
	    		<a href="<?php echo base_url()?>usuarios/admin/lista_usuario">Listar Parceiros</a>
	    		
	    		<br/><Br/>
	    		<!--
	    	Squeeze<br/>
	    		
	    		<a href="<?php echo base_url()?>landing_pages/admin/adicionar">Adicionar Squeeze</a><br/>
	    		<a href="<?php echo base_url()?>landing_pages/admin/listar">Listar Squeeze</a>
	    		-->
	    	
	<br/><br/><br/>
				Top afiliados Leads<br/>
				<table border="1">
					
					<tr><td>Nome</td><td>Leads</td><td>Posição</td></tr>
					
					
						{top_parceiros_leads}
					
						<tr><td>{nome}</td><td>{total_leads}</td><td>{rank}</td></tr>
						
						
						{/top_parceiros_leads}
					
				</table>
				
				<!--<br/><br/>
				Top Batalha Squeeze <br/>
				<table border="1">
					
					<tr><td>Nome</td><td>Leads</td><td>Visitas</td><Td>Rank</Td><td>Status</td><td>taxa</td></tr>
					
					
						{top_batalha_squeeze}
					
						<tr><td>{nome}</td><td>{total_leads}</td><td>{total_visitas}</td><td>{rank}</td><td>{status}</td><tD>{taxa}%</tD></tr>
						
						
						{/top_batalha_squeeze}
					
				</table>
				
				
				<br/><br/>
				Squeezes não aprovadas<br/>
				<table border="1">
					
					<tr><td>Nome</td><td>Nome do afiliado</td></tr>
					
					
						{aprova_squeeze}
					
						<tr><td><a href="<?php echo base_url();?>landing_pages/admin/editar/{id_l}">{nome}</a></td><td>{nome_usuario}</td></tr>
						
						
						{/aprova_squeeze}
					
				</table>
			
			
				-->
					
					
				
				</div>
				<div style="clear:both;height:0px"></div>
				<?php } else if($this->session->userdata('is_logged_in') AND $this->session->userdata('papel') == 2){ ?>
	    		
	    		
		    		<div class="menu_afiliado">
		    			<!--
		    			<?php if($total_landing_pages == 0) { ?>
		    			<a href="<?php echo base_url()?>landing_pages/admin/adicionar"><img src="<?php echo base_url();?>assets/public/images/membros/novo/botao-add-squeeze.png" style="position:absolute;top:205px;" alt="" /></a>
		    			<?php } else { ?>
		    				<a href="<?php echo base_url()?>landing_pages/admin/editar/{id_landing_page}"><img src="<?php echo base_url();?>assets/public/images/membros/novo/botao-transparente.png" style="position:absolute;top:200px;" alt="" /></a>
		    			<?php } ?>
		    			-->
		    			<a href="<?php echo base_url()?>membros/"><img src="<?php echo base_url();?>assets/public/images/membros/novo/botao-transparente.png" style="position:absolute;top:265px;" alt="" /></a>
		    			<!--<a href="<?php echo base_url()?>membros/home/batalha_leads"><img src="<?php echo base_url();?>assets/public/images/membros/novo/botao-transparente.png" style="position:absolute;top:325px;" alt="" /></a>-->
		    			
		    		</div>
		    		
		    		<div class="content_afiliado">
		    			
		    			<div class="conteudo_stats_leads">
		    				
		    				<div style="width:148px; text-align:center;position:absolute;top:115px;left:10px;font-size:31px;font-family: 'gotham_boldregular';color:#464646;">{clicks}</div>
		    				<div style=" width:148px; text-align:center;position:absolute;top:110px;left:245px;font-size:31px;font-family: 'gotham_boldregular';color:#464646;">{minha_posicao}º</div>
		    				
		    				<!-- setas ranking -->
		    				<div style="position:absolute;top:260px;right:4px;font-size:9px;font-family: 'gotham_boldregular';color:#464646;">
		    					
			    				<img src="<?php echo base_url();?>assets/public/images/membros/novo/setas-ranking.png" alt="" style="float:left" />
			    				<div style="float:left">
			    					
			    					 
			    					{rank_posicao_abaixo} pontos acima {posicao_abaixo}º lugar<br/>
			    					{rank_posicao_acima} pontos abaixo do {posicao_acima}º lugar  
			    				</div>
			    				
		    				</div>
		    				
		    			</div>
		    			
			    		
			    		
	    			</div>
	    		
	    	
	    	<?php } ?>
	    	
		
	<div style="clear:both;height:0px"></div>
	
	
