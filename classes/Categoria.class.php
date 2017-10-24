<?php
	class Categoria extends BD{
		
		public static function atualizaViews($categoria_r, $subcategoria_r){
			$pdo = @BD::conn();
			
			$categoria = $pdo->prepare("SELECT views FROM categorias WHERE id = :categoria");
			$categoria->bindParam(':categoria', $categoria_r);
			$categoria->execute();
			$c = $categoria->fetchObject();
			$c  = $c->views;
			$c = $c + 1;
			$categoria = $pdo->prepare("UPDATE categorias SET views = :views WHERE id = :categoria");
			$categoria->bindParam(':views', $c);
			$categoria->bindParam(':categoria', $categoria_r);
			$categoria->execute();
			
			$subcategoria = $pdo->prepare("SELECT views FROM subcategorias WHERE id = :subcategoria");
			$subcategoria->bindParam(':subcategoria', $subcategoria_r);
			$subcategoria->execute();
			$s = $subcategoria->fetchObject();
			$s = $s->views;
			$s = $s + 1;
			$subcategoria = $pdo->prepare("UPDATE subcategorias SET views = :views WHERE id = :subcategoria");
			$subcategoria->bindParam(':views', $s);
			$subcategoria->bindParam(':subcategoria', $subcategoria_r);
			$subcategoria->execute();
		}
		
		public function categoriaAction($parameters = array()){
			$pdo = parent::conn();
			$arr = array("status" => "ok", "results" => array());
			
			$dataquery = $pdo->prepare("SELECT * FROM categorias");
			$dataquery->execute();
			if($dataquery->rowCount() > 0){
				while($fetch = $dataquery->fetchObject()){
					$arr['results'][] = array(
						"id" => $fetch->id,
						"categoria" => $fetch->categoria,
						"imagem" => $fetch->imagem,
						"views" => $fetch->views
					);
				}
			}else{
				$arr['status'] = 'no';
			}
			
			return $arr;
		}
		
		public function categoriaTranspAction($parameters = array()){
			$pdo = parent::conn();
			$arr = array("status" => "ok", "results" => array());
			
			$dataquery = $pdo->prepare("SELECT id, categoria, views FROM categorias");
			$dataquery->execute();
			$i = 0;
			while($fetch = $dataquery->fetchObject()){
				$arr["results"][$i]["categoria"] = array(
					"id" => $fetch->id,
					"nome" => $fetch->categoria,
					"views" => $fetch->views,
					"subcategorias" => array()
				);
				$select = $pdo->prepare("SELECT subcategoria FROM subcategorias WHERE id_categoria = ?");
				$select->execute(array($fetch->id));
				while($subcategoria = $select->fetchObject()){
					$arr["results"][$i]["categoria"]["subcategorias"][] = $subcategoria->subcategoria;
				}
				$i++;
			}
			
			return $arr;
		}
		
		public function subcategoriaAction($parameters = array()){
			$pdo = parent::conn();
			$arr = array("status" => "ok", "results" => array());
			
			$dataquery = $pdo->prepare("SELECT * FROM subcategorias WHERE id_categoria = :idcategoria");
			$dataquery->bindParam(':idcategoria', $parameters['categoria']);
			$dataquery->execute();
			if($dataquery->rowCount() > 0){
				while($fetch = $dataquery->fetchObject()){
					$arr['results'][] = array(
						"id" => $fetch->id,
						"subcategoria" => $fetch->subcategoria,
						"imagem" => $fetch->imagem,
						"views" => $fetch->views
					);
				}
			}else{
				$arr['status'] = 'no';
			}
			
			return $arr;
		}
		
	}