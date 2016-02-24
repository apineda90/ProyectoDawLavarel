<?php
namespace App\Http\Controllers;
use App\Grafico;
use Input;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\WebService\WebService;

class GraficoController extends Controller {

	public function index(){
        session_start();
        $userespol=$_SESSION['usuarioespol'];
        $user=$_SESSION['nameusuario'];
        return view('nuevo', ['user'=> $user]);
    }

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