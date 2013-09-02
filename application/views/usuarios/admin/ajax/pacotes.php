<div>
		<label>Pacote</label><br/>
		<select name="pacote_ajax">
			
			<option value='0'>Selecione um Pacote</option>
			{pacotes}<option value='{id}'>Pacote {nome}</option>{/pacotes}
		
		</select>
	</div>
	
	<script>

	$("#pacotes_box").hide();
	
	</script>