<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public $db=null;
    public function __construct(){

        $this->db = app('firebase.firestore')->database();
    }
 
    public function index(string $page='users')
    {           
        
        $citiesRef = $this->db->collection($page);
        $snapshot = $citiesRef->documents();
        //print_r($snapshot);
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}")->with(array('snapshot'=>$snapshot));;
        }
        return abort(404);
    }

    public function save(Request $request,$type)
    {
       if($type=="users"){
        $docRef = $this->db->collection($type)->newDocument();
        $docId= $docRef->id();
        $data = [
            'id' => $docId,
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'phoneNumber' => $request->input('phoneNumber'),
            'city' => $request->input('City'),
            'state' => $request->input('State'),
        ];
        $docRef->set($data);
      }elseif($type=="cities"){
        $docRef = $this->db->collection($type)->newDocument();
        $docId= $docRef->id();
        $data = [
            'id' => $docId,
            'name' => $request->input('Name'),
            'state' => $request->input('State'),
            'country' => $request->input('Country'),
        ];
        $docRef->set($data);
      }elseif($type=="foods"){
          
      }elseif($type=="offices"){
        $docRef = $this->db->collection($type)->newDocument();
        $docId= $docRef->id();
        $data = [
            'id' => $docId,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'city' => $request->input('City'),
            'state' => $request->input('State'),
        ];
        $docRef->set($data);
    }
    return redirect()->back()->with(['message' => $type.' Data saved successfully']);

    }
}
