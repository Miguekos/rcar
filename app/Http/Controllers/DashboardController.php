<?php

namespace App\Http\Controllers;

use App\Roles;
use App\Reserva;
use App\Auto;
use App\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function dashboard()
  {

    return view('dashboard');
  }


  public function cambioclave(Request $request, $empleado)
  {
    $password = bcrypt($request->password);
    DB::table('users')
      ->where('id', $empleado)
      ->update(['password' => $password]);
    return back()->with('flash', 'Se actualizo la contraseña correctamente');
  }


  public function cambioclaveform()
  {
    return view('auth.reset');
  }


  public function upload(Request $request)
  // public function upload()
  {

    // return $request->base64;

    // $data = Input::all();
    // $png_url = "product-".time().".png";
    // $path = public_path() . "/img/designs/" . $png_url;

    // Image::make(file_get_contents($request->base64))->save($path);
    // $response = array(
    //     'status' => 'success',
    // );
    // return Response::json( $response  );

    // if ($request->hasFile('base64')){
    //   return "El archivo se llama file";
    // }else{
    //   return "No se llam nada";
    // }


    // $parametre =$request->all();
    // $name = "product-".time().".png";
    // $image = base64_encode(file_get_contents($request->base64));
    // $image->move(public_path() . '/images/', $name);
    // return $name; 



    // $file = $request->base64;
    // $name = "product-".time().".png";
    // $file->move(public_path() . '/images/', $name);
    // return $name;
    // $image = base64_encode(file_get_contents($request->base64)); // your base64 encoded
    // return $image;
    // $base_to_php = explode(',', $request->base64);
    // $data = $base_to_php[1]; // BBBFBfj42Pj4....
    // return $data;

    
    // $pos  = strpos($request->base64, ';');
    // $type = explode(':', substr($request->base64, 0, $pos))[1];
    
    $image = base64_encode(file_get_contents($request->base64)); // your base64 encoded
    $extension = explode('/', mime_content_type($request->base64))[1];
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = str_random(20) . '.' . $extension;
    \File::put(public_path() . '/images/' . $imageName, base64_decode($image));
    return $imageName;
    
    // if ($request->hasFile('image')) {
    //     if($request->file('image')->isValid()) {
    //         try {
    //             $file = $request->file('image');
    //             $image = base64_encode($file);
    //             echo $image;
    //         } catch (FileNotFoundException $e) {
    //             echo "catch";

    //         }
    //     }
    //   }

    // $files = $request->file('file');
    // return $files;
    // if (!empty($files)) {
    //   foreach ($files as $file) {
    //     Storage::put($file - getClientOriginalName(), file_get_contents($file));
    //   }
    // }

    // $image = $request->image;  // your base64 encoded
    //     $image = str_replace('data:image/png;base64,', '', $image);
    //     $image = str_replace(' ', '+', $image);
    //     $imageName = str_random(10).'.'.'png';
    //     \File::put(storage_path(). '/' . $imageName, base64_decode($image));

    // if ($request->hasFile('image')) {
    //   $image = $request->file('image');
    //   $name = time().'.'.$image->getClientOriginalExtension();
    //   $destinationPath = storage_path('/app/images');
    //   $image->move($destinationPath, $name);
    //   return response()->json(['data'=>"image is uploaded"]);
    // }
  }


  public function updatePhoto(Request $request)
  {
    // return $request;
    // if ($request->hasFile('files')){
    //   return "El archivo se llama file";
    // }else{
    //   return "No se llam nada";
    // }

    // if ($request->hasFile('archivo')){
    // $file = $request->file('photo');
    // // $file = Input::file('avatar');
    // $destinationPath = '/img/';
    // $filename = uniqid() .'-' . $file->getClientOriginalName();
    // $file->move(public_path(). $destinationPath, $filename);
    // $user->avatar = $destinationPath . $filename;

    $file = $request->file('photo');
    $name = time() . $file->getClientOriginalName();
    $file->move(public_path() . '/images/', $name);
    return $name;

    // $validator = Validator::make($request->all(), [
    // 'namedb' => 'unique:campas',
    // $file = $request->file('photo');
    // return $file;
    // $file_data = $request->file('photo');
    //  $file_name = 'image_'.time().'.png'; //generating unique file name;
    //  @list($type, $file_data) = explode(';', $file_data);
    //  @list(, $file_data) = explode(',', $file_data);
    //  if($file_data!=""){ // storing image in storage/app/public Folder
    //         \Storage::disk('public')->put($file_name,base64_decode($file_data));
    //   }
    // $file =Input::file('photo');
    // $imagedata = file_get_contents($file);
    // $base64 = base64_encode($imagedata);
    // $oUser->avatar = $base64;
    // $oUser->update();

    // if ($validator->passes()) {
    //     $namedb1 = mb_strtolower($request->namedb);
    //     $campa = new Campa;
    //     $campa->namedb = $namedb1;
    //     $campa->archivo = $name;
    //     $campa->save();
    //     $namedb = $request->get("namedb");
    //     $nametb = $request->get("namedb");
    //     $namedb = mb_strtolower($namedb);
    //     $nametb = mb_strtolower($namedb);
    //     PGSchema::create($schemaName = $namedb, $databaseName = null);
    //     Schema::create($namedb.".".$nametb, function (Blueprint $table) {
    //         $table->string('dni');
    //         $table->integer('telefono');
    //     });
    //     Excel::load(public_path()."/csv/".$name, function($reader) use ($nametb, $namedb) {
    //       foreach ($reader->get() as $asterisk) {
    //             $campa = DB::insert('insert into '.$namedb.".".$nametb.' ("dni", "telefono") values (?, ?)',["$asterisk->dni", "$asterisk->telefono"]);
    //         }
    //     });
    //     return redirect()->route('lista');
    // }else{
    //     return redirect('home')
    //         ->withErrors($validator)
    //         ->withInput();
    // }
    // }else{
    //     return "No es un archivo";
    // }

    // $this->validate($request, [
    //     'photo' => 'required|image'
    // ]);

    // $file = $request->file('photo');
    // return $file;
    // $extension = $file->getClientOriginalExtension();
    // $fileName = auth()->id() . '.' . $extension;
    // $path = public_path('\images\car'.$fileName);

    // Image::make($file)->fit(144, 144)->save($path);

    // $user = auth()->user();
    // $user->photo_extension = $extension;
    // $saved = $user->save();

    // $data['success'] = $saved;
    // $data['path'] = $user->getAvatarUrl() . '?' . uniqid();

    // return $path;
  }

  public function prueba()
  {
    return view('prueba');
  }

  public function disponible(Request $request)
  {

    // return $request->all();
    // $disponi = Reserva::whereBetween('fecha',[$request->fechaIni,$request->fechaFin])
    // ->where('estado', 0)
    // ->get();
    // return $request->all();
    $disponi = Auto::where([
      ['disponible', '=', 1],
      // ['fechasInicio', '<', $request->fechaIni],
      // ['fechaFin', '>', $request->fechaFin],
      ['fechafinauto', '<=', $request->fechaIni],
      // ['fechafinauto', '>', $request->fechaIni],
      // ['estado', '==', 0],
      // ['abono_id','=',0],
      // ['deuda','!=',0],
    ])->get();
    return $disponi;
  }
}
