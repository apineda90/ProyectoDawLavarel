<?php
namespace App\Http\Controllers;
use App\Grafico;
use Input;

class GraficoController extends Controller {


	public function store(Request $request){
		$id = $request->input('id');

		$aux = Grafico::where("id",$id);
		if(empty($aux)){
			$aux = new Grafico();
			$aux->id = $request->input('id');
			$aux->x = $request->input('x');
			$aux->y = $request->input('y');
			$aux->save();
		}else{
			$aux->x = $request->input('x');
			$aux->y = $request->input('y');
			$aux->save();
		}
		return response()->json(['id' => $aux->id]);
	}
	public function show($id)
    {
        $item = Grafico::find($id);
        return view('graph.show', ['data' => $item]);
    }

}