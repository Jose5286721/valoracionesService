<?php
namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use App\Valoration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ValoracionesController extends Controller {
	use ApiResponse;
	public function index() {
		return $this->successResponse(Valoration::all());
	}
	public function store(Request $request) {
		$this->validate($request, [
			"usuario_id" => "required|min:1",
			"nota" => "required|min:1",
			"producto_id" => "required|min:1",
		]);
		$valoracion = Valoration::create($request->all());
		return $this->successResponse($valoracion, Response::HTTP_CREATED);
	}
	public function showByUsuarioAndProducto($idUsuario, $idProducto) {
		$valoracion = Valoration::where("usuario_id", $idUsuario)->where("producto_id", $idProducto)->first();
		if (!$valoracion) {
			return $this->errorResponse("No hay valoracion", Response::HTTP_NOT_FOUND);
		}
		return $this->successResponse($valoracion);
	}
	public function show($id) {
		$valoracion = Valoration::findOrFail($id);
		$this->successResponse($valoracion);
	}
	public function update(Request $request, $id) {
		$this->validate($request, [
			"usuario_id" => "min:1",
			"nota" => "min:1",
			"producto_id" => "min:1",
		]);
		$valoracion = Valoration::findOrFail($id);
		$valoracion->fill($request->all());
		if ($valoracion->isClean()) {
			return $this->errorResponse("Modifique al menos un valor", Response::HTTP_UNPROCESSABLE_ENTITY);
		}
		$valoracion->save();
		return $this->successResponse($valoracion);
	}
	public function destroy($id) {
		$valoracion = Valoration::findOrFail($id);
		$valoracion->delete();
		return $this->successResponse($valoracion);
	}
}
