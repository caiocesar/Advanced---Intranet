<?php
class LoginController extends AppController {
	
	public $uses = array('Usuario');
	
	function index(){
		
		$this->layout = '';
		
		if($this->data){
		
			$login = $this->Usuario->find('first', array(
						'fields' => array(
							'id',
							'nome',
							'perfil_id',
							'Departamento.nome',
							'Usuario.departamento_id'
							),
						'joins' => array(
							array(
								'table' => 'departamentos',
								'alias' => 'Departamento',
								'type' => 'INNER',
								'conditions' => array('Usuario.departamento_id = Departamento.id')
								)
							),	
						'conditions' => array(
							'email = "'.$this->data['Usuario']['email'].'"',
							'senha = "'.$this->data['Usuario']['senha'].'"'
						 	 )
						 )
					 );
	
			if($login){
				
				$this->Session->write('Usuario', $login);
				
				$this->redirect('/dashboard');
				
			} else {
				
				unset($this->data);
				$this->set('mensagem_login','<center><strong>Usuario e/ou senha inválido.</strong></center><br />');
							
			}

		}
		
	}
	
	function logoff(){
		
		$this->Session->delete('Usuario');
		$this->redirect('/login');
		
	}
	
}