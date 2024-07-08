<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Geting all packages based no location.
        $USERTYPE = $request->session()->get('USERTYPE');
        $USERID = $request->session()->get('USERID');
        $CHILDOF = $request->session()->get('CHILDOF');

        $packages = location::query()
            ->where('child_of',$CHILDOF)
            ->where('user_id',$USERID)
            ->orderBy('created_at','desc')
            ->get();

        return view('dashboard', ['packages'=> $packages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //getting package data from form.
        $package_name=$request->input('name');
        $package_opened_as=$request->input('open_as');
        $package_type=$request->input('file_type');
        $rand = rand(10000,99999);
        $USERID = $request->session()->get('USERID');
        $CHILDOF = $request->session()->get('CHILDOF');

        $request->validate([
            'name'=>'required|string|min:3',
            'open_as'=>'required|string|min:3',
            'file_type'=>'required'
        ]);

        //Getting data from form.
        $data=array(

            'package_name'=>$request->input('name'),
            'package_opened_as'=>$request->input('open_as'),
            'package_type'=>$request->input('file_type'),
            'user_id'=>$USERID,
            'child_of'=>$CHILDOF,
            'package_location'=>null
        );

        if($request->hasfile('file_input')){

            $file=$request->file('file_input');
            $file_name=$package_name.$rand;

            if($package_type = 'word'){
                //$file->storeAs('/public/packages/word',$file);
                $file->move(public_path('/word'), $file_name); // to public
            }elseif($package_type = 'powerpoint'){
                //$file->storeAs('/public/packages/powerpoint',$file);
                $file->move(public_path('/powerpoint'), $file_name); // to public
            }elseif($package_type = 'excel'){
                //$file->storeAs('/public/packages/excel',$file);
                $file->move(public_path('/excel'), $file_name); // to public
            }elseif($package_type = 'pdf'){
                //$file->storeAs('/public/packages/pdf',$file);
                $file->move(public_path('/pdf'), $file_name); // to public
            }elseif($package_type = 'code'){
                //$file->storeAs('/public/packages/code',$file);
                $file->move(public_path('/code'), $file_name); // to public
            }elseif($package_type = 'image'){
                //$file->storeAs('/public/packages/image',$file);
                $file->move(public_path('/image'), $file_name); // to public
            }elseif($package_type = 'audio'){
                //$file->storeAs('/public/packages/audio',$file);
                $file->move(public_path('/audio'), $file_name); // to public
            }elseif($package_type = 'video'){
                //$file->storeAs('/public/packages/video',$file);
                $file->move(public_path('/video'), $file_name); // to public
            }elseif($package_type = 'archive'){
                //$file->storeAs('/public/packages/archive',$file);
                $file->move(public_path('/archive'), $file_name); // to public
            }else{
                //$file->storeAs('/public/packages/miscellaneous',$file);
                $file->move(public_path('/miscellaneous'), $file_name); // to public
            }

            $request->session()->put('FILENAME',$file_name);

            $data=array(

                'package_name'=>$request->input('name'),
                'package_opened_as'=>$request->input('open_as'),
                'package_type'=>$request->input('file_type'),
                'user_id'=>$USERID,
                'child_of'=>$CHILDOF,
                'package_location'=>$file_name
            );
            
        }

        //DB::table('table_name')->where('D_ID',$d_id)->update($data);
        //DB::table('table_name')->insert($data);
        location::query()->insert($data);

        return redirect('/dashboard');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(location $location)
    {
        //
    }
}
