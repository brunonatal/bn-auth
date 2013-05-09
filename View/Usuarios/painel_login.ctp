<?php
	echo 	$this->Session->flash(),
			$this->Session->flash('auth'),
			$this->Form->create('Usuario'),
			$this->Form->input('login'),
			$this->Form->input('senha'),
			$this->Form->end('Entrar');
?>