<?php

class CashController
{

	public static function allCashs(){
		return Cash::all();
	}

	public function findByCashId($id = null){
		$Cash = Cash::find($id);

		try {

			$data = array(
				'id' => $Cash->id,
				'date' => date('d/m/Y', strtotime(str_replace('-','/', $Cash->date))),
				'total' => $Cash->total,
				'observation' => $Cash->observation
			);

			return $data;

		} catch (Exception $ex) {

			$data = array(
				'msg' => 'Error: '.$ex->getMessage()
			);

			return $data;

		}

	}

	public function deleteCash($id = null){
		try {

			// if (UserController::hasUserCash($id) >= 1) {

			// 	$data = array(
			// 		'msg' => 'Colaborador não pode ser removido, pois possui usuário relacionado',
			// 		'route' => '/cash/'
			// 	);

			// } else {

				$Cash = Cash::find($id);
				$Cash->delete();

				$data = array(
					'msg' => 'Registro removido com sucesso',
					'route' => '/cash/'
				);

			// }

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/cash/'
			);

			return $data;
		}

	}

	public function editCash($data = array()){
		try {
			$Cash = Cash::find($data['id']);
			$Cash->date = date('Y-m-d', strtotime(str_replace('/','-',$data['date'])));
			$Cash->total = $data['total'];
			$Cash->observation = $data['observation'];
			$Cash->save();

			$data = array(
				'msg' => 'Registro alterado com sucesso',
				'route' => '/cash/'
			);

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/cash/edit/'.$data['id']
			);

			return $data;
		}
	}

	public function newCash($data = array()){

		try {

			$Cash = new Cash();
			$Cash->date = date('Y-m-d', strtotime(str_replace('/','-',$data['date'])));
			$Cash->total = $data['total'];
			$Cash->observation = $data['observation'];
			$Cash->save();

			$data = array(
				'msg' => 'Registro inserido com sucesso',
				'route' => '/cash/'
			);

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/cash/new'
			);

			return $data;

		}

	}
}
