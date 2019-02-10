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
      return back()->with('flash','Se actualizo la contraseña correctamente');

    }


    public function cambioclaveform()
    {
      return view('auth.reset');
    }


    public function updatePhoto(Request $request)
    {
      // if ($request->hasFile('archivo')){
      // $file = $request->file('photo');
      // // $file = Input::file('avatar');
      // $destinationPath = '/img/';
      // $filename = uniqid() .'-' . $file->getClientOriginalName();
      // $file->move(public_path(). $destinationPath, $filename);
      // $user->avatar = $destinationPath . $filename;

    $file = $request->file('photo');
    $name = time().$file->getClientOriginalName();
    $file->move(public_path().'/images/', $name);
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
        ['disponible','=',1],
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
