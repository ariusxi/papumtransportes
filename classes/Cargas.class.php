<?php
	class Cargas extends BD{
		
		private function insereItems($parameters = array(), $id_evento){
			$pdo = parent::conn();
			$status = false;
			
			foreach($parameters as $key => $value){
				$dataquery = $pdo->prepare("INSERT INTO items_cargas(id_cargas,nome,comp,largura,altura,medida,peso,quantidade) VALUES(:id_cargas,:nome,:comp,:largura,:altura,:medida,:peso,:quantidade)");
				$dataquery->bindParam(':id_cargas', $id_evento);
				$dataquery->bindParam(':nome', $value['nome']);
				$dataquery->bindParam(':comp', $value['comp']);
				$dataquery->bindParam(':largura', $value['largura']);
				$dataquery->bindParam(':altura', $value['altura']);
				$dataquery->bindParam(':medida', $value['medida']);
				$dataquery->bindParam(':peso', $value['peso']);
				$dataquery->bindParam(':quantidade', $value['quantidade']);
				if($dataquery->execute()){
					$status = true;
				}else{
					$status = false;
				}
			}
			return $status;
		}
		
		public function registerAction($parameters = array()){
			session_start();
			$pdo = parent::conn();
			
			$dataquery = $pdo->prepare("INSERT INTO cargas(id_user,titulo,retirada,entrega,categoria,subcategoria,created_at) VALUES(:id_user,:titulo,:retirada,:entrega,:categoria,:subcategoria,NOW())");
			$dataquery->bindParam(':id_user', $_SESSION['id_user']);
			$dataquery->bindParam(':titulo', $parameters['anuncio']);
			$dataquery->bindParam(':retirada', $parameters['retirada']);
			$dataquery->bindParam(':entrega', $parameters['entrega']);
			$dataquery->bindParam(':categoria', $parameters['categoria']);
			$dataquery->bindParam(':subcategoria', $parameters['subcategoria']);
			if($dataquery->execute()){
				$select = $pdo->prepare("SELECT id FROM cargas WHERE id_user = ? AND retirada = ? AND entrega = ? AND created_at = NOW()");
				$select->execute([$_SESSION['id_user'], $parameters['retirada'], $parameters['entrega']]);
				$fetch = $select->fetchObject();
				if(Cargas::insereItems($parameters['items'], $fetch->id)){
					include_once "Categoria.class.php";
					Categoria::atualizaViews($parameters['categoria'], $parameters['subcategoria']);
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		public function anunciosAction($parameters = array()){
			session_start();
			$pdo = parent::conn();
			$arr = array("status" => "ok", "results" => array());
			
			$dataquery = $pdo->prepare("SELECT * FROM cargas WHERE id_user = :id_user");
			$dataquery->bindParam(':id_user', $_SESSION['id_user']);
			$dataquery->execute();
			if($dataquery->rowCount()){
				$i = 0;
				while($fetch = $dataquery->fetchObject()){
					$arr['results'][$i]["id"] = $fetch->id;
					$arr['results'][$i]["titulo"] = $fetch->titulo;
					$arr['results'][$i]["entrega"] = $fetch->entrega;
					$arr['results'][$i]["retirada"] = $fetch->retirada;
					$arr['results'][$i]["created_at"] = date('d/m/Y H:i:s', strtotime($fetch->created_at));
					$arr['results'][$i]["items"] = array();
					$i++;
				}
			}else{
				$arr['status'] = 'no';
			}
			
			return $arr;
		}

		public function pesquisaAction($parameters = array()){
			$pdo = parent::conn();
			$arr = array("status" => "ok", "results" => array());
			$query = $parameters['search'];
			$filtro = "";
			if(isset($parameters["categoria"]) && $parameters["categoria"] != ""){
				$filtro .= " AND categoria IN(".$parameters['categoria'].")";
			}
			if(isset($parameters["estado"]) && $parameters["estado"] != ""){
				$filtro .= " AND retirada LIKE '%".$parameters['estado']."%' OR entrega LIKE '%".$parameters['estado']."%'";
			}
			if(isset($parameters["cidade"]) && $parameters["cidade"] != ""){
				$filtro .= " AND retirada LIKE '%".$parameters['cidade']."%' OR entrega LIKE '%".$parameters['cidade']."%'";
			}

			$dataquery = $pdo->prepare("SELECT * FROM cargas WHERE titulo LIKE '%$query%' OR retirada LIKE '%$query%' OR entrega LIKE '%$query%' ORDER BY created_at DESC");
			$dataquery->bindParam(':query', $parameters['search']);
			$dataquery->execute();
			if($dataquery->rowCount() > 0){
				$i = 0;
				while($fetch = $dataquery->fetchObject()){
					$arr['results'][$i]["id"] = $fetch->id;
					$arr['results'][$i]["titulo"] = $fetch->titulo;
					$arr['results'][$i]["entrega"] = $fetch->entrega;
					$arr['results'][$i]["retirada"] = $fetch->retirada;
					$arr['results'][$i]["created_at"] = date('d/m/Y H:i:s', strtotime($fetch->created_at));
					$arr['results'][$i]["items"] = array();
					$i++;
				}
			}else{
				$arr['status'] = 'no';
			}

			return $arr;
		}
		
	}