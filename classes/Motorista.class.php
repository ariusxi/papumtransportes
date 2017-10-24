<?php
	class Motorista extends BD{

		public function registerAction($parameters = array()){
			$pdo = parent::conn();
			session_start();
			
			$dataquery = $pdo->prepare("INSERT INTO motoristas(id_user, firstname, lastname, rg, oe, cpf, registro, cathab, validade, status) VALUES(:id_user, :firstname, :lastname, :rg, :oe, :cpf, :registro, :cathab, :validade, 1)");
			$dataquery->bindParam(":id_user", $_SESSION['id_user']);
			$dataquery->bindParam(":firstname", $parameters["firstname"]);
			$dataquery->bindParam(":lastname", $parameters["lastname"]);
			$dataquery->bindParam(":rg", $parameters["rg"]);
			$dataquery->bindParam(":oe", $parameters["oe"]);
			$dataquery->bindParam(":cpf", $parameters["cpf"]);
			$dataquery->bindParam(":registro", $parameters["nregistro"]);
			$dataquery->bindParam(":cathab", $parameters["cathab"]);
			$dataquery->bindParam(":validade", $parameters["validade"]);
			if($dataquery->execute()){
				$select = $pdo->prepare("SELECT id FROM motoristas WHERE cpf = ? AND rg = ?");
				$select->execute([$parameters['cpf'],$parameters['rg']]);
				$fetch = $select->fetchObject();
				return $fetch->id;
			}else{
				return false;
			}
		}

		public function loadAction($parameters = array()){
			$pdo = parent::conn();
			$arr = array("status" => "ok", "results" => array());
			session_start();

			$dataquery = $pdo->prepare("SELECT * FROM motoristas WHERE id_user = :id_user");
			$dataquery->bindParam(":id_user", $_SESSION['id_user']);
			$dataquery->execute();
			if($dataquery->rowCount() > 0){
				while($fetch = $dataquery->fetchObject()){
					$arr["results"][] = array(
						"id" => $fetch->id,
						"firstname" => $fetch->firstname,
						"lastname" => $fetch->lastname,
						"rg" => $fetch->rg,
						"oe" => $fetch->oe,
						"cpf" => $fetch->cpf,
						"registro" => $fetch->registro,
						"cathab" => $fetch->cathab,
						"validade" => date("d/m/Y", strtotime($fetch->validade)),
						"status" => $fetch->status
					);
				}
			}else{
				$arr["status"] = "no";
			}

			return $arr;
		}

		public function deleteAction($parameters = array()){
			$pdo = parent::conn();
			session_start();
			$parameters['motorista'] = (int)$parameters['motorista'];

			$dataquery = $pdo->prepare("DELETE FROM motoristas WHERE id = :id AND id_user = :id_user");
			$dataquery->bindParam(":id", $parameters['motorista']);
			$dataquery->bindParam(":id_user", $_SESSION['id_user']);
			if($dataquery->execute()){
				return true;
			}else{
				return false;
			}
		}

	}