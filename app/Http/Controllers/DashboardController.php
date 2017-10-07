<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\Announcement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Notifications;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
    	$users = DB::table('users')->orderBy('ok', 'asc')->paginate(20);
        return view('dashadmin', ['users' => $users]);
    }

    function notifyUser($id){
        // this is where the notification logic will be implemented
        $user = User::findOrFail($id);
        $stringRandomPassword = str_random(8);
    	$hashedRandomPassword = Hash::make($stringRandomPassword);
	     DB::table('users')
	        ->where('id', $user->id)
	        ->update([
	          'password' => $hashedRandomPassword
	          ]);

	    $content = 'Akun Anda pada website bem.ukdw.ac.id telah aktif. Silakan masuk pada website BEMU menggunakan email dan password berikut :<br><br>
	    Email : '.$user->email.'<br>
	    Password : '.$stringRandomPassword.'<br><br>
	    Untuk mengubah password Anda silahkan masuk pada menu Pengaturan Pengguna.';

	    $message = array(
	    	'content' => $content,
	    	'name' => $user->name,
	    	'subject' => 'Akun BEMU Anda Telah Dibuat'
	    	);
        Mail::to($user->email)->send(new Announcement($message));
		return redirect()->back()
                ->with('message', 'Generate Password Success')
                ->with('status', 'success');
    }

    public function sendMail(){
    	
    	$message = 'tes';
        Mail::to('samuel.r@ti.ukdw.ac.id')->send(new Announcement($message));
    }

    public function tambahAkun(Request $request){
        $email =  DB::table('users')
            ->where('email', $request->email)
            ->first();

        if(!$email){
            $stringRandomPassword = str_random(8);
            $hashedRandomPassword = Hash::make($stringRandomPassword);

            DB::table('users')->insert([
                'name' => $request->namaLengkap,
                'nickname' => $request->namaPanggilan,
                'email' => $request->email,
                'ok'=> $request->ok,
                'admin' => $request->admin,
                'user_mode' => $request->admin,
                'password' => $hashedRandomPassword
            ]);

            $content = 'Akun Anda pada website bem.ukdw.ac.id telah aktif. Silakan masuk pada website BEMU menggunakan email dan password berikut :<br><br>
            Email : '.$request->email.'<br>
            Password : '.$stringRandomPassword.'<br><br>
            Untuk mengubah password Anda silahkan masuk pada menu Pengaturan Pengguna.<br>';

            $message = array(
                'content' => $content,
                'name' => $request->name,
                'subject' => 'Akun BEMU Anda Telah Dibuat'
                );

            Mail::to($request->email)->send(new Announcement($message));

            return redirect()->back()
                    ->with('message', 'Akun berhasil ditambahkan')
                    ->with('status', 'success');
        } else{
            return redirect()->back()
                    ->with('message', 'Email sudah terdaftar!')
                    ->with('status', 'danger');
        }
    }
}
