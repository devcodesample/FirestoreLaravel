<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Collection;
use App\Models\FileList;
use Illuminate\Http\Request; 
use Kreait\Firebase; 
use Kreait\Firebase\Factory; 
use Kreait\Firebase\ServiceAccount; 
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/dream1-c1b91-firebase-adminsdk-8a907-6336ba58d8.json'); 
        $database = $factory->createDatabase();
         $ref = "dreamdb/documents/";
         $allFile = $database->getReference($ref)->getValue();
         //dd($allFile);
         return view('list', compact(['allFile']));
    }

     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
 
            $request->validate([
                'name' => 'required|string',
                'file'   => 'required'
            ]);
             
            $file=$request->file('file');
            $fileOriginalName = time()."_".$file->getClientOriginalName();
            $destinationPath = 'Files';
            $saveFile = FileList::create($request->all()); 
            $moved = $file->move($destinationPath,$fileOriginalName); 

            if($moved){
                $data= array();
                $data['title'] = $request->name;
                $data['file'] = $fileOriginalName;
                $this->firebaseInsert("documents", $data);
            }
            Toastr::success('File added successfully :)','Success');
            return back();
           
        } 
            // Store data in firebase

        public function firebaseInsert($table, $data){ 

            $data= json_encode($data); 
            $database = "dreamdb";            // DB name
            $table = "documents";            //table name

            $url = "https://dream1-c1b91.firebaseio.com/".$database."/".$table.".json";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
            $jsonResponse = curl_exec($ch);
            if(curl_errno($ch)){
            echo 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch); 
            return true;
           // var_dump($jsonResponse); exit; 
        }

        public function updatefile(Request $request)
        { 
          
            $id = $request->id;
            $title = $request->title; 

            $data= array();
            
            if($request->hasFile('file'))  {
                $file=$request->file('file'); 
                $fileOriginalName = time()."_".$file->getClientOriginalName();
                
                $destinationPath = 'Files'; 
                $moveFile = $file->move($destinationPath,$fileOriginalName);
                $data['file'] = $request->file('file')->getClientOriginalName();
           }  

           $data['title'] = $title; 

           $factory = (new Factory)->withServiceAccount(__DIR__.'/dream1-c1b91-firebase-adminsdk-8a907-6336ba58d8.json'); 
           $database = $factory->createDatabase();
           $ref = "dreamdb/documents/".$id;
           $updateFile = $database->getReference($ref)->update($data); 
           
           Toastr::success('File Updated successfully :)','Success');
            return  redirect('/');
           
        }

        public function destory($id)
        {
            $factory = (new Factory)->withServiceAccount(__DIR__.'/dream1-c1b91-firebase-adminsdk-8a907-6336ba58d8.json'); 
            $database = $factory->createDatabase();
             $ref = "dreamdb/documents/".$id;
             $deleteData = $database->getReference($ref)->remove();
             Toastr::success('File Deleted successfully :)','Success');
            return  redirect('/');
             
        }
}
