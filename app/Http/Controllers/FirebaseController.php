<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Collection;
use App\Models\FileList;
use Illuminate\Http\Request; 

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'file'   => 'mimes:doc,pdf,docx,zip,txt'
            ]);
             
            $file=$request->file('file');
            $fileOriginalName = $file->getClientOriginalName();
            $destinationPath = 'Files';
            $saveFile = FileList::create($request->all()); 
            $insertfile = $file->move($destinationPath,$file->getClientOriginalName()); 

            if($insertfile){
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

        public function selectAlldata(Request $request)
        {
            $data = FileList::all();
            $database = "dreamdb";            // DB name
            $table = "documents";  
            $url = "https://dream1-c1b91.firebaseio.com/".$database."/".$table."/".$data.".json"; 
        }
}
