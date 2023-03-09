<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\characters;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class personajesController extends Controller
{
    public function save(Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        $status = $request->get('status');
        $species = $request->get('species');
        $image = $request->get('image');
        $type = $request->get('type');
        $gender = $request->get('gender');
        $origin_name = $request->get('origin_name');

        characters::create([
            'code' => $id,
            'name' => $name,
            'image' => $image,
            'status' => $status,
            'species' => $species,
            'type' => $type,
            'gender' => $gender,
            'origin_name' => $origin_name,
        ]);

        $responses = HTTP::get('https://rickandmortyapi.com/api/character/')['results'];
        return view('principal', compact('responses'));
    }

    public function update(Request $request){
        $id = $request->get('id');
        $code = $request->get('code');
        $name = $request->get('name');
        $status = $request->get('status');
        $species = $request->get('species');
        $image = $request->get('image');
        $type = $request->get('type');
        $gender = $request->get('gender');
        $origin_name = $request->get('origin_name');

        DB::table('characters')->where('id', $id)->update([
            'code' => $code,
            'name' => $name,
            'image' => $image,
            'status' => $status,
            'species' => $species,
            'type' => $type,
            'gender' => $gender,
            'origin_name' => $origin_name,
        ]);

        return redirect()->back();
    }
    public function delete($id){
        characters::destroy($id);
        return redirect()->back();
    }
    public function list(Request $request){
        $responses = HTTP::get('https://rickandmortyapi.com/api/character/')['results'];
        return view('principal', compact('responses'));
    }
    public function details($id){
        $url = "https://rickandmortyapi.com/api/character/$id";
        $data = HTTP::get($url);

        return response()->view('xml', compact('data'))->withHeaders([
            'Content-Type' => 'application/xml',
            'charset' => 'utf-8'
        ]);
    }

}
