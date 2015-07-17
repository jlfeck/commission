<?php

class Util
{	
	public static function paginator($entity = "", $itensPerPage = 1, $page = 1) {

		try {
			$totalEntity = $entity::count();

			$pages = ceil($totalEntity / $itensPerPage);
			if ($pages == 0) $pages = 1;
			
			$entities = $entity::orderBy('id', 'desc')->skip($itensPerPage * ($page - 1))->take($itensPerPage)->get();

			$arrayEntity = array();
			foreach ($entities as $entityObj) {
				$arrayEntity[] = $entityObj;
			}

			$data = array(
				'pages' => $pages,
				'entities' => $arrayEntity
			);

			return $data;
			
		} catch (Exception $ex) {
			$data = array(
				'msg' => 'Error: '.$ex->getMessage()		
			);

			return $data;
			
		}

	}
}