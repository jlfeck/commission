<?php

class CollaboratorController
{

	public static function allCollaborators(){
		return Collaborator::all();
	}

	public function findByCollaboratorId($id = null){
		$Collaborator = Collaborator::find($id);

		try {

			$data = array(
				'id' => $Collaborator->id,
				'name' => $Collaborator->name,
				'phone' => $Collaborator->phone,
				'profession' => $Collaborator->profession
			);

			return $data;

		} catch (Exception $ex) {

			$data = array(
				'msg' => 'Error: '.$ex->getMessage()
			);

			return $data;

		}

	}

	public function deleteCollaborator($id = null){
		try {

			// if (UserController::hasUserCollaborator($id) >= 1) {

			// 	$data = array(
			// 		'msg' => 'Colaborador não pode ser removido, pois possui usuário relacionado',
			// 		'route' => '/collaborators/'
			// 	);

			// } else {

				$Collaborator = Collaborator::find($id);
				$Collaborator->delete();

				$data = array(
					'msg' => 'Registro removido com sucesso',
					'route' => '/collaborators/'
				);
			
			// }

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/collaborators/'
			);

			return $data;
		}

	}

	public function editCollaborator($data = array()){
		try {
			$Collaborator = Collaborator::find($data['id']);
			$Collaborator->name = $data['name'];
			$Collaborator->phone = $data['phone'];
			$Collaborator->profession = $data['profession'];
			$Collaborator->save();

			$data = array(
				'msg' => 'Registro alterado com sucesso',
				'route' => '/collaborators/'
			);

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/collaborator/edit/'.$data['id']
			);

			return $data;
		}
	}

	public function newCollaborator($data = array()){

		try {

			$Collaborator = new Collaborator();
			$Collaborator->name = $data['name'];
			$Collaborator->phone = $data['phone'];
			$Collaborator->profession = $data['profession'];
			$Collaborator->save();

			$data = array(
				'msg' => 'Registro inserido com sucesso',
				'route' => '/collaborators/'
			);

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/collaborator/new'
			);

			return $data;

		}

	}
}
