<?php

namespace App\Http\Controllers;
use App\Roles;
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
        $this->validate($request, [
            'photo' => 'required|image'
        ]);

        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = auth()->id() . '.' . $extension;
        $path = public_path('images/users/'.$fileName);

        Image::make($file)->fit(144, 144)->save($path);

        // $user = auth()->user();
        // $user->photo_extension = $extension;
        // $saved = $user->save();

        // $data['success'] = $saved;
        $data['path'] = $user->getAvatarUrl() . '?' . uniqid();

        return $data;
    }

    public function prueba()
    {
      return view('prueba');
    }


}
