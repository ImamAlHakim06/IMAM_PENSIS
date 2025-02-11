<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *  @return \Illuminate\Http\Response
     */
    public function index(Request $request, Siswa $siswas)
    {
        $q = $request->input('q');

        $active = 'Siswas';

        $siswas = $siswas->when($q, function($query) use ($q) {
            return $query->where('nama', 'like', '%' .$q. '%')
                         ->orwhere('alamat', 'like', '%' .$q. '%');
        })

        ->paginate(10);
        return view('dashboard/siswa/list', [
            'siswas' => $siswas,
            'request' => $request,
            'active' => $active,
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'Siswas';
        return view('dashboard/siswa/form', [
            'active' => $active,
            'button' =>'Create',
            'url'    =>'dashboard.siswa.store' 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'pas_photo'     => 'required|image',
            'no_daftar'     => 'required|unique:App\Models\Siswa,no_daftar',
            'nama'          => 'required',
            'nisn'          => 'required|unique:App\Models\Siswa,nisn',
            'nik'           => 'required|unique:App\Models\Siswa,nik',
            'gender'        => 'required',
            'agama'         => 'required',
            'no_kk'         => 'required|unique:App\Models\Siswa,nik',
            'tempat_l'      => 'required',
            'tanggal_l'     => 'required|unique:App\Models\Siswa,tanggal_l',
            'alamat'        => 'required'
  
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('dashboard.siswa.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $siswa = new Siswa(); 
            $image = $request->file('pas_photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage ::disk('local')->putFileAs('public/siswa', $image, $filename);
            
            $siswa->pas_photo = $filename; 
            $siswa->no_daftar = $request->input('no_daftar');
            $siswa->nama = $request->input('nama');
            $siswa->nisn = $request->input('nisn');
            $siswa->nik = $request->input('nik');
            $siswa->gender = $request->input('gender');
            $siswa->agama = $request->input('agama');
            $siswa->no_kk = $request->input('no_kk');
            $siswa->tempat_l = $request->input('tempat_l');
            $siswa->tanggal_l = $request->input('tanggal_l');
            $siswa->alamat = $request->input('alamat');
            $siswa->save();

            return redirect()->route('dashboard.siswa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
        $active = 'Siswas';
        return view('dashboard/Siswa/show', [
            'active'    =>$active,
            'siswa'     =>$siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
        $active = 'Siswas';
        return view('dashboard/Siswa/form', [
            'active'    =>$active,
            'siswa'     =>$siswa,
            'button'    =>'Update',
            'url'       =>'dashboard.siswa.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
         //
         $validator = Validator::make($request->all(), [
            'pas_photo'     => 'required|image',
            'no_daftar'     => 'required|unique:App\Models\Siswa,no_daftar,'.$siswa->id,
            'nama'          => 'required',
            'nisn'          => 'required|unique:App\Models\Siswa,nisn,'.$siswa->id,
            'nik'           => 'required|unique:App\Models\Siswa,nik,'.$siswa->id,
            'gender'        => 'required',
            'agama'         => 'required',
            'no_kk'         => 'required|unique:App\Models\Siswa,nik,'.$siswa->id,
            'tempat_l'      => 'required',
            'tanggal_l'     => 'required|unique:App\Models\Siswa,tanggal_l,'.$siswa->id,
            'alamat'        => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('dashboard.siswa.update',$siswa->id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $siswa = new Siswa(); 
            $image = $request->file('pas_photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage ::disk('local')->putFileAs('public/siswa', $image, $filename);
            
            $siswa->pas_photo = $filename; 
            $siswa->no_daftar = $request->input('no_daftar');
            $siswa->nama = $request->input('nama');
            $siswa->nisn = $request->input('nisn');
            $siswa->nik = $request->input('nik');
            $siswa->gender = $request->input('gender');
            $siswa->agama = $request->input('agama');
            $siswa->no_kk = $request->input('no_kk');
            $siswa->tempat_l = $request->input('tempat_l');
            $siswa->tanggal_l = $request->input('tanggal_l');
            $siswa->alamat = $request->input('alamat');
            $siswa->save();

            return redirect()->route('dashboard.siswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
