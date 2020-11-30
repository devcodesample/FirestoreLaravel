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
 
    public function index(string $page='users',string $type="")
    {          // echo $page."#".$type;
        if($page!="office"){
            $citiesRef = $this->db->collection($page);
            $snapshot = $citiesRef->documents();
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}")->with(array('snapshot'=>$snapshot));;
            }
        }else{
            $data=[];
            $officeRef = $this->db->collection("office");
            $data["officeList"] = (!empty($officeRef->documents()))?$officeRef->documents():array();
            $data["type"]=$type;
            if(!empty($type)){
                $typeRef = $this->db->collection('office')->document($type)->collection('officeList');
                $data["snapshot"] = $typeRef->documents();
            }
            //print_r($data);
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}")->with($data);;
            }
        }

        //print_r($snapshot);
        
        return abort(404);
    }
    public function deleteRecord($type,$id)
    {
        if($type!="office"){
            $this->db->collection($type)->document($id)->delete();
        }
        else{
            $this->db->collection('office')->document('taxService')->collection('officeList')->document($id)->delete();
        }    
        return redirect()->back()->with(['message' =>'Record Deleted successfully']);
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
      }elseif($type=="officetype"){
       $name=$request->input('type');
        $docRef = $this->db->collection("office")->document($name);
        $data = [
            'name' => $name,
        ];
        $docRef->set($data);
      }elseif($type=="office"){
        $fileName = null;
        $path="";
        if ($request->hasFile('photoUrl')!=null) {
            $file = $request->file('photoUrl');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            //$destinationPath = public_path('/uploads');
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);
            //$path = $file->storeAs(public_path('/uploads'), $fileName);
        }
        $officeType=$request->input('officeType');
        $docRef = $this->db->collection('office')->document($officeType)->collection('officeList')->newDocument();
        $docId= $docRef->id();
        $data = [
            'id' => $docId,
            'name' => $request->input('name'),
            'photoUrl' => $fileName ,
            'state' => $request->input('states'),
        ];
        $docRef->set($data);
    }
    return redirect()->back()->with(['message' => $type.' Data saved successfully']);

    }
}
