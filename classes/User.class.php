<?php
	class User extends BD{
		
		private function generateCode(){
			$cr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$max = strlen($cr)-1;
			$gera = null;
			for($i=0; $i < 16; $i++){
				$gera .= $cr{mt_rand(0, $max)};
			}
			$gera = str_split($gera, 4);
			
			return "$gera[0]-$gera[1]-$gera[2]-$gera[3]";
		}
		
		public function loginAction($parameters = array()){
			$pdo = parent::conn();
			$dataquery = $pdo->prepare("SELECT id, level FROM users WHERE (cpf = :login OR email = :login) AND password = :password");
			$dataquery->bindParam(':login', $parameters['login']);
			$dataquery->bindParam(':password', $parameters['password']);
			$dataquery->execute();
			if($dataquery->rowCount() == 1){
				$fetch = $dataquery->fetchObject();
				session_start();
				$_SESSION['id_user'] = $fetch->id;
				$_SESSION['type'] = $fetch->level;
				
				return ["status" => "ok", "id_user" => $fetch->id];
			}else{
				return ["status" => "no"];
			}
		}
		
		public function registerAction($parameters = array()){
			$pdo = parent::conn();
			
			$dataquery = $pdo->prepare("INSERT INTO users(firstname,lastname,cpf,email,telefone,celular,password,level,created_at) VALUES(:firstname,:lastname,:cpf,:email,:telefone,:celular,:password,:level,NOW())");
			$dataquery->bindParam(':firstname', $parameters['firstname']);
			$dataquery->bindParam(':lastname', $parameters['lastname']);
			$dataquery->bindParam(':cpf', $parameters['cpf']);
			$dataquery->bindParam(':email', $parameters['email']);
			$dataquery->bindParam(':telefone', $parameters['telefone']);
			$dataquery->bindParam(':celular', $parameters['celular']);
			$dataquery->bindParam(':password', $parameters['password']);
			$dataquery->bindParam(':level', $parameters['type']);
			if($dataquery->execute()){
				$select = $pdo->prepare("SELECT id, level FROM users WHERE cpf = ? AND email = ?");
				$select->execute([$parameters['cpf'],$parameters['email']]);				
				$fetch = $select->fetchObject();
				session_start();
				$_SESSION['id_user'] = $fetch->id;
				$_SESSION['type'] = $fetch->level;
				
				return ["status" => "ok", "id_user" => $fetch->id];
			}else{
				return ["status" => "no"];
			}
		}
		
		public function forgotAction($parameters = array()){
			$pdo = parent::conn();
			
			$dataquery = $pdo->prepare("SELECT id FROM users WHERE email = :email");
			$dataquery->bindParam(':email', $parameters['email']);
			$dataquery->execute();
			if($dataquery->rowCount() == 1){
				$fetch = $dataquery->fetchObject();
				$code = User::generateCode();
				$insert = $pdo->prepare("INSERT INTO forgotcodes(id_user,code,status) VALUES(?,?,0)");
				$insert->execute([$fetch->id,$code]);
				session_start();
				$_SESSION['forgot_email'] = $parameters['email'];
				//enviar email com o código
				return ["status" => "ok"];
			}else{
				return ["status" => "no"];
			}
		}
		
		public function resetPasswordAction($parameters = array()){
			$pdo = parent::conn();
			
			$dataquery = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
			$dataquery->bindParam(':password', $parameters['password']);
			$dataquery->bindParam(':id', $_SESSION['id_forgot']);
			if($dataquery->execute()){
				$update = $pdo->prepare("UPDATE forgotcodes SET status = 1 WHERE code = :code");
				$update->bindParam(':code', $parameters['current']);
				$update->execute();
				session_start();
				unset($_SESSION['id_forgot']);
				session_destroy();
				return ["status" => "ok"];
			}else{
				return ["status" => "no"];
			}
		}
		
		public function defineCategoriasAction($parameters = array()){
			$pdo = parent::conn();
			$categorias = explode(",", $parameters['categorias']);
			$status = true;
			session_start();
			for($i = 0; $i < count($categorias); $i++){
				$insert = $pdo->prepare("INSERT INTO users_categorias(id_user, id_categoria) VALUES(:id_user, :id_categoria)");
				$insert->bindParam(':id_user', $_SESSION['id_user']);
				$insert->bindParam(':id_categoria', $categorias[$i]);
				if($insert->execute()){
					$status = true;
				}else{
					$status = false;
				}
			}
			
			return $status;
		}
		
	}