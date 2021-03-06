<?php
	$this->Paginator->options(array('url' => array('controller' => 'eventos', 'action' => 'index', '?' => array('nome' => $this->params['url'][nome], 'tipos_conteudo_id' => $this->params['url'][tipos_conteudo_id], 'status' => $this->params['url'][status]) ) , 'paramType' => 'querystring'));
?>
<div id="meio">
	<div id="colunaE" style=" width: 950px;">
		<h1>Filtros</h1> 
		<div class="conteudo" style=" width: 910px;margin-bottom:20px;">
			<div class="formulario">
				<?php echo $this->Form->create('Eventos' , array ( 'type' => 'get' , 'action' => 'index' ) ) ;?>
					<label for="Nome">
						Nome:<br />
						<?php echo $this->Form->input('nome' , array ( 'type' => 'text' , 'label' => false , 'div' => false ) ) ;?>
					</label>
					<label for="Status">
						Status:<br />
						<?php echo $this->Form->input('status' , array ( 'options' => array( '' => "Selecione", 1 => "Publicado", 2 => "Aguardando aprovação" ) , 'label' => false , 'div' => false ) ) ;?>
					</label>
					<?php echo $this->Form->submit('Pesquisar' , array ( 'class' => 'btForm' ) ) ;?>
				<?php echo $this->Form->end();?>
			</div>  
		</div>
	</div><br />
	<div id="colunaE" style=" width: 950px;">
		<h1>ÚLTIMOS EVENTOS CADASTRADOS<a style="float: right; text-decoration: none; color: white;" href="/eventos/add"> CRIAR EVENTO <img src="/img/add_3.png" width="20px" align="Absmiddle" /></a></h1> 
			
		<div class="conteudo" style=" width: 910px;">
			<table bordercolor="#B8B5B5" border="1">
				<tr>
					<th width="60%">Nome</th>
					<th width="30%">Data Criação</th>
					<th width="30%">Status</th>
					<th width="20%">Editar</th>
					<th width="20%">Excluir</th>
				</tr>			
			<?php foreach ($ultimos_eventos as $ultimos_evento):?>
				<tr>
					<td align="center"><?php echo $ultimos_evento['Evento']['nome'];?></td>  
					<td align="center"><?php echo $this->Time->format( 'd/m/Y - H:i', $ultimos_evento['Evento']['data_criacao']);?></td>
					<td align="center"><?php if($ultimos_evento['Evento']['status'] == 2){echo "Aguardando aprovação";}else{echo "Publicada";}?></td>
					<td align="center"><a href="/eventos/add/<?php echo $ultimos_evento['Evento']['id'];?>"><img src="/img/edit_icon.png" /></a></td>
					<td align="center"><a href="/eventos/remove/<?php echo $ultimos_evento['Evento']['id'];?>"><img src="/img/delete_icon.png" /></a></td>
			<?php endforeach;?>
			</table>
			<div class="paginacao" style="text-align:center;">
				<span><?php echo $this->Paginator->first('Primeira'); ?></span>	
				<span><?php echo $this->Paginator->numbers(); ?></span>
				<span><?php echo $this->Paginator->last('Última');	?></span>
			</div>
		</div>
	</div>
</div>