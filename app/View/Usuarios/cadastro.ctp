<?php echo $this->Html->script('cadastro');?>
<?php echo $this->Html->script('advanced');?>
<div id="meio">
	<div id="colunaB">
		<h1>Novo Usuário</h1> 
		<div class="conteudo">
			<div class="formulario">
			
 				<?php echo $this->Form->create('Usuario' , array( 'options' => array ( 'action' => 'cadastro' , 'controller' => 'usuarios' ), 'enctype' => 'multipart/form-data' ) ); ?>
 						
 					<?php if($id):?>
 						<?php echo $this->Form->input('id' , array ( 'type' => 'hidden' , 'value' => $id ) ) ;?>
 					<?php endif;?>		
 					
 					<?php echo $this->Form->input('status_usuario_id' , array ( 'type' => 'hidden' , 'value' => 1 ) ) ;?>
                                
					<label for="Nome">
						Nome: <br />
						<?php echo $this->Form->input('nome' , array ( 'type' => 'text' , 'label' => false) ) ;?>
					</label>
					
					<label for="Email">
						E-mail: <br />                                           
						<?php echo $this->Form->input('email' , array ( 'type' => 'text' , 'label' => false) ) ;?> 
					</label>
					
					<label for="Senha">
						Senha: <br />                                           
						<?php echo $this->Form->input('senha' , array ( 'type' => 'password' , 'label' => false) ) ;?> 
					</label>
						
 						
					<label for="Departamento">
						Departamento: <br />                                           
						<?php echo $this->Form->input('departamento_id' , array ( 'options' => $departamentos, 'onchange' => "mostraUsuarios(this.value,'cargos','usuarios','cargos')", 'label' => false) ) ;?> 
					</label>
					
					<?php if($cargo_id):?>
						<?php echo $this->Form->input('cargo_id_aux' , array ( 'type' => 'hidden', 'value' => $cargo_id, 'id' => 'cargo_id_aux' ) ) ;?>
					<?php endif;?>
						<label for="Cargo">
							<div class="cargos"></div> 
						</label>
				
				                    
					<label for="Ramal">
						Ramal: <br />                                           
						<?php echo $this->Form->input('ramal' , array ( 'type' => 'text' , 'label' => false) ) ;?> 
					</label>
					
					<label for="Data_Nascimento">
						Data de Nascimento: <br />                                           
						<?php echo $this->Form->input('data_nascimento' , array ( 'type' => 'text' , 'maxLenght' => '10' , 'label' => false) ) ;?> 
					</label>
					
					<?php echo $this->Form->input('perfil_id' , array ( 'type' => 'hidden' ) ) ;?> 
					
					<label for="Telefone">
						Telefone: <br />                                           
						<?php echo $this->Form->input('telefone' , array ( 'type' => 'text' , 'label' => false) ) ;?> 
					</label>
					                                                             
					<label for="Celular">
						Celular: <br />                                           
						<?php echo $this->Form->input('celular' , array ( 'type' => 'text' , 'label' => false) ) ;?> 
					</label>

					<label for="Foto_url">
						Foto: <br />                                           
						<input type="file" name="data[File][imagem]" id="FileImage" />
						<br />
						<?php if($url_foto){ echo "<a href='/$url_foto' target='_blank' ><img src=/$url_foto /></a>";}?>
					</label>
					                                                             
					<?php echo $this->Form->submit('Enviar' , array ( 'class' => 'btForm' ) ) ;?>
				
				<?php echo $this->Form->end();?>
           </div>  
		</div>
	</div>
	
	<div id="colunaB">
		<h1>Últimos Usuários Cadastrados</h1> 
			
		<div class="conteudo">
			<table>
				<tr>
					<th>Nome</th>
					<th width="30%">Departamento</th>
					<th width="20%">Editar</th>
				</tr>			
			<?php foreach ($ultimos_cadastrados as $ultimo_cadastrado):?>
				<tr>
					<td><?php echo $ultimo_cadastrado['Usuario']['nome'];?></td>  
					<td align="center"><?php echo $ultimo_cadastrado['Departamento']['nome'];?></td>
					<td align="center"><a href="/usuarios/cadastro/<?php echo $ultimo_cadastrado['Usuario']['id'];?>"><img src="/img/edit_icon.png" /></a>
					<?php if ($ultimo_cadastrado['Usuario']['perfil_id'] != 1): ?>
					<a href="/usuarios/excluir/<?php echo $ultimo_cadastrado['Usuario']['id'];?>"><img src="/img/delete_icon.png" /></a></td>
					<?php endif; ?>
			<?php endforeach;?>
			</table>	
		</div>
	</div>
</div>