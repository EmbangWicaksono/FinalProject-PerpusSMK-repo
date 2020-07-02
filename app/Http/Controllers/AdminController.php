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
use App\publisher;
use App\author;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
    public function index()
    {
        // if (Gate::denies('isAdmin')) {
        //     return redirect('/');
        // }
        return view('admin.index');
    }

    public function edituser()
    {
        // if (Gate::denies('isAdmin')) {
        //     return redirect('/');
        // }
        return view('admin.edituser');
    }
    public function adduser()
    {
        // if (Gate::denies('isAdmin')) {
        //     return redirect('/');
        // }
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

    public function penerbitget()
    {
        if (Gate::denies('isAdmin')) {
            return redirect('/');
        }
        $penerbit = publisher::orderBy('created_at','desc')->paginate(5);
        return view('admin.penerbit')->with('penerbit', $penerbit);
    }

    public function penerbitinput(Request $request)
    {
        $this->validate($request,[
            'penerbit_name' => 'required|string|unique:publishers,Nama'
        ]);
        $penerbit = new publisher;
        $penerbit->Nama = $request->penerbit_name;
        $penerbit->save();
        return redirect('/penerbit')->with('success','data telah ditambahkan');

    }

    public function penerbitdelete($id)
    {
        $penerbit = publisher::find($id);
        if (!isset($penerbit)) {
            return redirect('/penerbit')->with('error','data tidak ditemukan!');
        }

        $penerbit->delete();
        return redirect('/penerbit')->with('success','data telah dihapus');
    }

    public function penulisget()
    {   
        if (Gate::denies('isAdmin')) {
            return redirect('/');
        }
        $penulis = author::orderBy('created_at','desc')->paginate(5);
        return view('admin.penulis')->with('penulis', $penulis);
    }

    public function penulisinput(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|unique:authors,nama'
        ]);
        $penulis = new author;
        $penulis->nama = $request->nama;
        $penulis->type = $request->type;
        $penulis->save();
        return redirect('/penulis')->with('success','data telah ditambahkan');
    }

    public function penulisdelete($id)
    {
        $penulis = author::find($id);
        if (!isset($penulis)) {
            return redirect('/penulis')->with('error','data tidak ditemukan!');
        }

        $penulis->delete();
        return redirect('/penulis')->with('success','data telah dihapus');
    }

}
