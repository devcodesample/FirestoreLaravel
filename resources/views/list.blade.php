
@extends('layouts.app')

@section('content')
  <!-- Begin Page Content -->
        <div class="container-fluid">
        	<div class="row pt-5">
	<div class="col-lg-9">
	<!-- 	<h3>Category</h3> -->
	</div>
	<div class="col-lg-3">
		<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal"> Add New File </button>
	</div>
</div><br>
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Document</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.no</th> 
                      <th>Name</th> 
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   
                   <tbody>
      	@php
      	$i=1;
      	@endphp 
        <tr>
          <td>{{$i}}</td> 
          <td> </td> 
          <td> </td>
          <td>
          	<a href="#"  data-toggle="modal" data-target="#edit" id=" "><i class="fa fa-edit" title="Edit"></i></a>
          	<a href="" onclick="return confirm('Are u sure ?')"><i class="fa fa-trash" title="Delete"></i> </a>
          </td>
        </tr>
        @php
        $i++;
        @endphp

        	<!------ for  update  Category model------->

  <!-- The Modal -->
  <div class="modal fade" id=" ">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Document</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action=" " method="post" enctype="multipart/form-data">
        	@csrf
		  <div class="row">
		  	<input type="hidden" name="id" value="">
		    <div class="col">
		       <input type="text" name="name" id="name" class="form-control" value=" " required="">

		    </div> 
		  </div><br> 
		  	<div class="row">
		    <div class="col">
		      <input type="submit" class="form-control btn btn-primary">
		    </div> 
		  </div> 
		</form>
        </div> 
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> 
  
      </tbody>
                </table>
              </div>
            </div>
          </div>

  		<!------ for add  Category model------->

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Add New Document</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{route('file.store')}}" method="post" enctype="multipart/form-data" name="form" onsubmit="return validation()" autocomplete="off">
        	@csrf
		  <div class="row">
		    <div class="col">
        <label>Document Name</label>
		       <input type="text" name="name" class="form-control" required="" id="name"  placeholder="Enter Document Name">
           
		    </div> 
		  </div><br>
      <div class="row">
		    <div class="col">
        <label>Upload File</label>
		       <input type="file" name="file" class="form-control" required="" id="file"> 
		    </div> 
		  </div><br>
		  	<div class="row">
		    <div class="col">
		      <input type="submit" class="form-control btn btn-primary" >
         
		    </div> 
		  </div>

		</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> 
  <script >
    function validation()
    {
      var category=document.getElementById('category').value; 
      if(!isNaN(category))
      {
        document.getElementById('checkcategory').innerHTML = "Please Enter Only Characters.";
        document.getElementById('checkcategory').style.color = "red";
        document.form.name.focus();
        return false;
      } 
    }
  </script>


   <script type="text/javascript">
     $(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
      </div>

         
@endsection