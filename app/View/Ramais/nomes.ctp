Nome do Funcionário: <br />
<?php echo $this->Form->input('func' , array('options' => $select_nomes , 'selected' => $id,'label' => false , 'div' => false , 'name' => 'func' ) ) ; ?>