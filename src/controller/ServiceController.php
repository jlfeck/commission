<?php

class ServiceController
{
	public static function allServices(){
		return Service::all();
	}

	public function findByServiceId($id = null){
		$Service = Service::find($id);

		try {
			$data = array(
				'id' => $Service->id,
				'name' => $Service->name,
				'percent' => $Service->percent
			);
			
			return $data;

		} catch (Exception $ex) {

			$data = array(
				'msg' => 'Error: '.$ex->getMessage()
			);

			return $data;
			
		}
	}

	public function deleteService($id = null){
		try {

			// Falta implementar Ordered
			// if (OrderedController::hasServiceOrdered($id) >= 1) {

			// 	$data = array(
			// 		'msg' => 'Cliente não pode ser removido, pois possui pedido relacionado',
			// 		'route' => '/services/'
			// 	);

			// } else {
			
				$Service = Service::find($id);
				$Service->delete();

				$data = array(
					'msg' => 'Registro removido com sucesso',
					'route' => '/services/'
				);
			
			// }

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/services/'
			);

			return $data;
		}

	}

	public function editService($data = array()){
		try {
			$Service = Service::find($data['id']);
			$Service->name = $data['name'];
			$Service->percent = $data['percent'];
			$Service->save();
			
			$data = array(
				'msg' => 'Registro alterado com sucesso',
				'route' => '/services/'
			);

			return $data;

		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/service/edit/'.$data['id']
			);

			return $data;
		}
	}

	public function newService($data = array()){
		try {

			$Service = new Service();
			$Service->name = $data['name'];
			$Service->percent = $data['percent'];
			$Service->save();

			$data = array(
				'msg' => 'Registro inserido com sucesso',
				'route' => '/services/'
			);

			return $data;
			
		} catch (Exception $ex) {
			$data = array(
				'msg' => $ex->getMessage(),
				'route' => '/service/new'
			);

			return $data;
			
		}

	}
}