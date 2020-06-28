<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use App\Exports\SuggestReport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\book_suggestion;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Gate::denies('isAdmin')) {
            return redirect('/');
        }
        return view('admin.index');
    }

    public function edituser()
    {
        if (Gate::denies('isAdmin')) {
            return redirect('/');
        }
        return view('admin.edituser');
    }
    public function adduser()
    {
        if (Gate::denies('isAdmin')) {
            return redirect('/');
        }
        return view('admin.adduser');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->status = $request->input('status');
        $user->{'jenis kelamin'} = $request->input('jenis_kelamin');
        $user->telepon = $request->input('telepon');
        if ($request->has('newpass') && !empty($request->input('newpass'))) {
            $user->password = Hash::make($request->input('newpass'));
        }
        $user->save();
        $profile = $user;
        $success = 'Data Profil telah diubah';
        return redirect(route('user.index'))->with('success', $success);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
            'jenis_kelamin' => ['required'],
            'kelas' => ['string', 'nullable'],
            'telepon' => ['numeric', 'digits_between:10,13'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'status' => $data['status'],
            'jenis kelamin' => $data['jenis_kelamin'],
            'kelas' => $data['kelas'],
            'telepon' => $data['telepon'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function insertuser(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect('user')->with('success','data berhasil ditambahkan');
    }
    public function usulanbooks()
    {
        $usulan = book_suggestion::orderBy('created_at','desc')->get();
        return view('admin.suggestion_list')->with('books',$usulan);
    }

    public function exportsuggest()
    {
        return Excel::download(new SuggestReport, 'daftar usulan buku.xlsx');
    }

}
