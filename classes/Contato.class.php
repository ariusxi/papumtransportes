<?php
	class Contato extends BD{

		public function sendContatoAction($parameters = array()){
			$pdo = parent::conn();
			$dataquery = $pdo->prepare("INSERT INTO contato(nome,email,mensagem) VALUES(:nome,:email,:mensagem)");
			$dataquery->bindParam(":nome", $parameters['name']);
			$dataquery->bindParam(":email", $parameters['email']);
			$dataquery->bindParam(":mensagem", $parameters['message']);
			if($dataquery->execute()){
				return ["status" => "ok"];
			}else{
				return ["status" => "no"];
			}
		}

	}