<?php

namespace App\Http\Controllers;

use App\FileModel;
use App\FileContact;
use App\FileGallery;
use Illuminate\Http\Request;
use File;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_dest()
    {
        $files = FileModel::where('type','Destination')->get();

        if(count($files) == 0){
            $type = "Destination";
            return view('empty',['type' => $type]);
        }

        return view('user.destination',compact('files'));
    }
    public function index_hotel()
    {
        $files = FileModel::where('type','Hotel')->get();

        if(count($files) == 0){
            $type = "Hotel";
            return view('empty',['type' => $type]);
        }

        return view('user.hotel',compact('files'));
    }
    public function index_cul()
    {
        $files = FileModel::where('type','Culinary')->get();

        if(count($files) == 0){
            $type = "Culinary";
            return view('empty',['type' => $type]);
        }

        return view('user.culinary',compact('files'));
    }

    public function index_editDest()
    {
        $files = FileModel::where('type','Destination')->get();
        return view('admin.editDestination',compact('files'));
    }
    public function index_editCul()
    {
        $files = FileModel::where('type','Culinary')->get();
        return view('admin.editCulinary',compact('files'));
    }
    public function index_editHotel()
    {
        $files = FileModel::where('type','Hotel')->get();
        return view('admin.editHotel',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'type' => 'required',
			'location' => 'required',
			'main_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'desc' => 'required|mimes:txt',
            'price' => 'required|mimes:txt',
            'phone' => 'required', 
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
        
        //menerima input dari form setelah lulus validasi
        $type = $request->type;
        $title = $request->title;
        $location = $request->location;
        $mainPic = $request->file('main_pic');
        $desc = $request->file('desc');
        $price = $request->file('price');
        $phone = $request->phone;
        $instagram = $request->instagram;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $google = $request->google;
        $linkedin = $request->linkedin;
        $pinterest = $request->pinterest;
        
        //membuat directory jika belum ada
        $mainDir = "Information\\$type\\$title";
        $dirGallery = "Information\\$type\\$title\\Gallery";
        if (!File::isDirectory($mainDir)) {
            File::makeDirectory($mainDir,0777, true, true);
            File::makeDirectory($dirGallery,0777, true, true);
        }else{
            return redirect('/admin/createData')->with('failed','Name already taken, use the another name');
        }
        
        //mendapatkan nama file/image
        $descFilename = $desc->getClientOriginalName();
        $picFilename = $mainPic->getClientOriginalName();
        $priceFilename = $price->getClientOriginalName();
        
        //upload file ke folder yang disediakan
        $targetUploadDesc = "$mainDir";
        $desc->move($targetUploadDesc,$descFilename);
        $mainPic->move($targetUploadDesc,$picFilename);
        $price->move($targetUploadDesc,$priceFilename);

        //membuat file path yang akan digunakan sebagai src html
        $pathDesc = $mainDir."\\".$descFilename;
        $pathMainPic = $mainDir."\\".$picFilename;
        $pathPrice = $mainDir."\\".$priceFilename;

        //membuat object untuk menyimpan data ke DB pada table Files
        $content = new FileModel;
        $content->title = $title;
        $content->type = $type;
        $content->location = $location;
        $content->main_pic = $pathMainPic;
        $content->desc = $pathDesc;
        $content->price = $pathPrice;
        $content->save();

        //menerima input multiple file untuk gallery, mendapatkan path, simpan path ke db, dan upload ke folder
        if($request->hasfile('filename')){
            foreach($request->file('filename') as $image){
                $name=$image->getClientOriginalName();
                $image->move($dirGallery,$name);
                $pathGallery = $dirGallery."\\".$name;
                
                $gallery = new FileGallery;
                $gallery->title = $title;
                $gallery->name = $name;
                $gallery->gallery = $pathGallery;
                $gallery->save();
            }
        }

        $contact = new FileContact;
        $contact->title = $title;
        $contact->phone = $phone;
        $contact->instagram = $instagram;
        $contact->twitter = $twitter;
        $contact->facebook = $facebook;
        $contact->google = $google;
        $contact->pinterest = $pinterest;
        $contact->linkedin = $linkedin;
        $contact->save();
        
        return redirect('/admin/createData')->with('success','File Uploaded Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(String $title)
    {
        $file = FileModel::where('title',$title)->get();
        $galleries = FileGallery::where('title',$title)->get();
        $contacts = FileContact::where('title',$title)->get();
        return view('user.detail',['file' => $file, 'galleries' => $galleries, 'contacts' => $contacts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit(String $title)
    {
        $file = FileModel::where('title',$title)->get();
        $contacts = FileContact::where('title',$title)->get();
        $galleries = FileGallery::where('title',$title)->get();
        return view('admin.edit',['file' => $file, 'galleries' => $galleries, 'contacts' => $contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $title, String $type)
    {
        $this->validate($request, [
			'main_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'desc' => 'mimes:txt',
            'price' => 'mimes:txt',
            'phone' => 'required|numeric',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
        
        $file = FileModel::where('title',$title)->get();
        $contacts = FileContact::where('title',$title)->get();
        $galleries = FileGallery::where('title',$title)->get();

        $mainPic = $request->file('main_pic');
        $desc = $request->file('desc');
        $price = $request->file('price');

        try{
            $targetUploadFiles = "Information\\$type\\$title";
            if($desc != null){
                $descFilename = $desc->getClientOriginalName();
                foreach ($file as $file){
                    File::delete($file->desc);
                }
                $desc->move($targetUploadFiles,$descFilename);
                $pathDesc = $targetUploadFiles."\\".$descFilename;
                
                FileModel::where('title',$title,'and')->where('type',$type)
                    ->update(['desc' => $pathDesc]);
            }
            if($price != null){
                $priceFilename = $price->getClientOriginalName();
                File::delete($file->price);
                $price->move($targetUploadFiles,$priceFilename);
                $pathPrice = $targetUploadFiles."\\".$priceFilename;
    
                FileModel::where('title',$title,'and')->where('type',$type)
                    ->update(['price' => $pathPrice]);
            }
            if($mainPic != null){
                $picFilename = $mainPic->getClientOriginalName();
    
                foreach ($file as $file){
                    File::delete($file->main_pic);
                }
    
                $mainPic->move($targetUploadFiles,$picFilename);
                $pathMainPic = $targetUploadFiles."\\".$picFilename;
                
                FileModel::where('title',$title)->where('type',$type)
                    ->update(['main_pic' => $pathMainPic]);
            }
    
            FileContact::where('title',$title)
                ->update([
                    'phone' => $request->phone,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'google' => $request->google,
                    'linkedin' => $request->linkedin,
                    'pinterest' => $request->pinterest
                ]);
    
            $dirGallery = "Information\\$type\\$title\\Gallery";
            if($request->hasfile('filename')){
                foreach($request->file('filename') as $image){
                    $name=$image->getClientOriginalName();
                    $image->move($dirGallery,$name);
                    $pathGallery = $dirGallery."\\".$name;
                    
                    $gallery = new FileGallery;
                    $gallery->title = $title;
                    $gallery->name = $name;
                    $gallery->gallery = $pathGallery;

                    $isExist = FileGallery::where('title',$title)->where('name',$name)->get();
                    if(count($isExist) != 0){
                        return redirect("/admin/edit$type")->with('failed',"Image name *$name* with title *$title* already exist");
                    }else{
                        $gallery->save();
                    }
                }
            }
        }catch(\Exception $e){
            return redirect("/admin/edit$type")->with('failed',"File Failed to Updated");
        }

        return redirect("/admin/edit$type")->with('success','File Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $type, String $title)
    {
        try{
            $file = FileModel::where('title',$title)->delete();
            $contact = FileContact::where('title',$title)->delete();
            $gallery = FileGallery::where('title',$title)->delete();
            File::deleteDirectory("Information/$type/$title");
        }catch(\Exception $e){
            return redirect("/admin/edit$type")->with('failed',"File $title gagal dihapus");
        }  

        return redirect("/admin/edit$type")->with('success',"File $title berhasil dihapus");
    }


    public function destroyGal(String $title, String $name)
    {
        try{
            $type = FileModel::where('title',$title)->first();
            $urlType = $type->type;
            $file = FileGallery::where('title',$title)->where('name',$name)->first();
            File::delete($file->gallery);
    
            FileGallery::where('title',$title)
                ->where('name',$name)
                ->delete();
        }catch(\Exception $e){
            return redirect("/admin/edit$urlType/$title")->with('failed',"Gallery $name gagal dihapus");
        }

        return redirect("/admin/edit$urlType/$title")->with('success',"Gallery $name berhasil dihapus");
    }
}
