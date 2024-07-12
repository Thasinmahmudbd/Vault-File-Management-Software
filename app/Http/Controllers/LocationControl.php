<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LocationControl extends Controller
{
    /**
     * Set session to pass data to form [locking].
     */
    public function setSession(Request $request, $id)
    {
        $USERID = $request->session()->get('USERID');

        $node = location::query()
            ->where('package_id',$id)
            ->where('user_id',$USERID)
            ->first();

        $package_name = $node->package_name;
        $package_status = $node->package_status;

        //Setting session
        $request->session()->put('IDPASSER',$id);
        $request->session()->put('NAMEPASSER',$package_name);
        $request->session()->put('STATUSPASSER',$package_status);
        $request->session()->put('REASON','locking');

        return redirect('/dash');
    }

    /**
     * Set session to pass data to form [moving].
     */
    public function setSession2(Request $request, $id)
    {
        $USERID = $request->session()->get('USERID');

        $node = location::query()
            ->where('package_id',$id)
            ->where('user_id',$USERID)
            ->first();

        $package_name = $node->package_name;
        $package_status = $node->package_status;

        //Setting session
        $request->session()->put('IDPASSER',$id);
        $request->session()->put('NAMEPASSER',$package_name);
        $request->session()->put('STATUSPASSER',$package_status);
        $request->session()->put('REASON','moving');

        return redirect('/dash');
    }

    /**
     * Set session to pass data to form.
     */
    public function resetSession(Request $request)
    {
        //resetting session
        $request->session()->forget('IDPASSER');
        $request->session()->forget('NAMEPASSER');
        $request->session()->forget('STATUSPASSER');
        $request->session()->forget('REASON');
        return redirect('/dash');
    }

    /**
     * Set node to root.
     */
    public function index(Request $request)
    {
        //changing child of
        $request->session()->put('CHILDOF','ROOT');
        $request->session()->put('NOTE','Welcome');
        return redirect('/dash');
    }

    /**
     * Set node to child.
     */
    public function indexChild(Request $request, $id)
    {
        //changing child of
        $request->session()->put('CHILDOF',$id);
        $request->session()->put('NOTE','Welcome');
        return redirect('/dash');
    }

    /**
     * Go back to previous node.
     */
    public function goBack(Request $request)
    {
        $CHILDOF = $request->session()->get('CHILDOF');
        $USERID = $request->session()->get('USERID');
        $request->session()->put('NOTE','Welcome');

        if($CHILDOF == 'ROOT'){
            $id = $CHILDOF;
        }else{
            $node = location::query()
            ->where('package_id',$CHILDOF)
            ->where('user_id',$USERID)
            ->first();

            $id = $node->child_of;
        }

        //changing child of
        $request->session()->put('CHILDOF',$id);
        return redirect('/dash');
    }

     /**
     * Display resource in dashboard.
     */
    public function dash(Request $request)
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

        $folders = location::query()
            ->where('package_type','folder')
            ->where('package_opened_as','folder')
            ->where('user_id',$USERID)
            ->orderBy('created_at','desc')
            ->get();

        return view('dashboard', ['packages'=> $packages], ['folders'=> $folders]);

    }

    /**
     * Lock file.
     */
    public function lockFile(Request $request, $id)
    {
        $USERID = $request->session()->get('USERID');
        $NAMEPASSER = $request->session()->get('NAMEPASSER');

        $request->validate([
            'confirmCode'=>'required|string|min:4',
            'code'=>'required|string|min:4',
        ]);

        $code = $request->input('code');
        $confirmCode = $request->input('confirmCode');

        if($code == $confirmCode){

            //Getting data from form.
            $data=array(
                'package_code'=>$code,
                'package_status'=>'locked'
            );

            //lock specific file
            $packages = location::query()
                ->where('package_id',$id)
                ->where('user_id',$USERID)
                ->update($data);

            $request->session()->put('NOTE',$NAMEPASSER.' - Locked');

            return redirect('/session/delete');

        }else{

            $request->session()->put('NOTE','Failed: Passwords not matching, try again.');

        }

        return redirect('/dash');
    }

    /**
     * Unlock file.
     */
    public function unlockFile(Request $request, $id)
    {
        $USERID = $request->session()->get('USERID');
        $NAMEPASSER = $request->session()->get('NAMEPASSER');

        $request->validate([
            'confirmCode'=>'required|string|min:4',
            'code'=>'required|string|min:4',
        ]);

        $code = $request->input('code');
        $confirmCode = $request->input('confirmCode');

        if($code == $confirmCode){

            //Unlock specific file
            $checkCode = location::query()
                ->where('package_id',$id)
                ->where('user_id',$USERID)
                ->first();

            if($checkCode->package_code == $code){

                //Getting data from form.
                $data=array(
                    'package_code'=>null,
                    'package_status'=>'unlocked'
                );

                //Unlock specific file
                $packages = location::query()
                    ->where('package_id',$id)
                    ->where('user_id',$USERID)
                    ->update($data);

                $request->session()->put('NOTE',$NAMEPASSER.' - Unlocked');

            }else{

                $request->session()->put('NOTE','Failed: Wrong password, try again.');

            }

            return redirect('/session/delete');

        }else{

            $request->session()->put('NOTE','Failed: Passwords not matching, try again.');

        }

        return redirect('/dash');
    }

    /**
     * Move file.
     */
    public function moveFile(Request $request, $id)
    {
        $USERID = $request->session()->get('USERID');
        $IDPASSER = $request->session()->get('IDPASSER');
        $NAMEPASSER = $request->session()->get('NAMEPASSER');

        //move specific file
        $data=array(
            'child_of'=>$id
        );

        $packages = location::query()
            ->where('package_id',$IDPASSER)
            ->where('user_id',$USERID)
            ->update($data);

        if($id != 'ROOT'){

            //get folder info
            $folder = location::query()
                ->where('package_id',$id)
                ->where('user_id',$USERID)
                ->first();

            $request->session()->put('NOTE','File ['.$NAMEPASSER.'] moved to folder ['.$folder->package_name.'].');

        }else{

            $request->session()->put('NOTE','File ['.$NAMEPASSER.'] moved to Dashboard [ROOT].');

        }

        return redirect('/session/delete');
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
            $ext=$file->extension();
            $file_name=$package_name.$rand.'.'.$ext;

            $file_size = $file->getSize();

            if($package_type == 'word'){
                //$file->storeAs('/public/packages/word',$file);
                $file->move(public_path('/Files/Word'), $file_name); // to public
            }elseif($package_type == 'powerpoint'){
                //$file->storeAs('/public/packages/powerpoint',$file);
                $file->move(public_path('/Files/Powerpoint'), $file_name); // to public
            }elseif($package_type == 'excel'){
                //$file->storeAs('/public/packages/excel',$file);
                $file->move(public_path('/Files/Excel'), $file_name); // to public
            }elseif($package_type == 'pdf'){
                //$file->storeAs('/public/packages/pdf',$file);
                $file->move(public_path('/Files/PDF'), $file_name); // to public
            }elseif($package_type == 'code'){
                //$file->storeAs('/public/packages/code',$file);
                $file->move(public_path('/Files/Code'), $file_name); // to public
            }elseif($package_type == 'image'){
                //$file->storeAs('/public/packages/image',$file);
                $file->move(public_path('/Files/Image'), $file_name); // to public
            }elseif($package_type == 'audio'){
                //$file->storeAs('/public/packages/audio',$file);
                $file->move(public_path('/Files/Audio'), $file_name); // to public
            }elseif($package_type == 'video'){
                //$file->storeAs('/public/packages/video',$file);
                $file->move(public_path('/Files/Video'), $file_name); // to public
            }elseif($package_type == 'archive'){
                //$file->storeAs('/public/packages/archive',$file);
                $file->move(public_path('/Files/Archive'), $file_name); // to public
            }else{
                //$file->storeAs('/public/packages/miscellaneous',$file);
                $file->move(public_path('/Files/Miscellaneous'), $file_name); // to public
            }

            $request->session()->put('FILENAME',$file_name);

            $data=array(

                'package_name'=>$request->input('name'),
                'package_opened_as'=>$request->input('open_as'),
                'package_type'=>$request->input('file_type'),
                'user_id'=>$USERID,
                'child_of'=>$CHILDOF,
                'package_location'=>$file_name,
                'package_size'=>$file_size

            );

        }

        //DB::table('table_name')->where('D_ID',$d_id)->update($data);
        //DB::table('table_name')->insert($data);
        location::query()->insert($data);

        return redirect('/dash');

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
    public function destroy(Request $request, location $location, $id)
    {
        $USERID = $request->session()->get('USERID');

        $file = location::query()
            ->where('package_id',$id)
            ->where('user_id',$USERID)
            ->first();

        $package_type = $file->package_type;
        $file_name = $file->package_location;

        //checking if folder has any child.
        $anyChild = location::query()
            ->where('child_of',$id)
            ->where('user_id',$USERID)
            ->first();

        if(!empty($anyChild->package_id)){

            $request->session()->put('NOTE','Delete -'.$anyChild->package_name.'- first.');

        }else{

        //checking if the file exists before attempting to delete it

            if($package_type == 'word'){
                $file_path = public_path('/Files/Word') . '/' . $file_name;
            }elseif($package_type == 'powerpoint'){
                $file_path = public_path('/Files/Powerpoint') . '/' . $file_name;
            }elseif($package_type == 'excel'){
                $file_path = public_path('/Files/Excel') . '/' . $file_name;
            }elseif($package_type == 'pdf'){
                $file_path = public_path('/Files/PDF') . '/' . $file_name;
            }elseif($package_type == 'code'){
                $file_path = public_path('/Files/Code') . '/' . $file_name;
            }elseif($package_type == 'image'){
                $file_path = public_path('/Files/Image') . '/' . $file_name;
            }elseif($package_type == 'audio'){
                $file_path = public_path('/Files/Audio') . '/' . $file_name;
            }elseif($package_type == 'video'){
                $file_path = public_path('/Files/Video') . '/' . $file_name;
            }elseif($package_type == 'archive'){
                $file_path = public_path('/Files/Archive') . '/' . $file_name;
            }else{
                $file_path = public_path('/Files/Miscellaneous') . '/' . $file_name;
            }

            $FILEADD = $request->session()->put('FILEADD',$file_path);

            if (File::exists($file_path)) {
                File::delete($file_path); // to public
            }

        //deleting package
        location::query()
            ->where('package_id',$id)
            ->where('user_id',$USERID)
            ->delete();

        }

        return redirect('/dash');
    }
}
