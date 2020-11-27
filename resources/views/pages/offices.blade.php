@extends('layouts.app', [
    'namePage' => 'Offices List',
    'class' => 'sidebar-mini',
    'activePage' => 'table',
  ])
  <style type="text/css">
   /* .card-header {
   display: flex;
   } */
   .action-add {
   float: right;
   position: relative;
   bottom: 56px;
  background-color:transparent;
   }
   .action-add:hover{
     background-color:transparent;
   }

   .form-control {
   height: 40px;
   box-shadow: none;
   color: #969fa4;
   }
   .form-control, .btn {        
   border-radius: 3px;
   }
   .signup-form .hint-text {
   color: #999;
   margin-bottom: 30px;
   text-align: center;
   }
   .signup-form .form-group {
   margin-bottom: 20px;
   }
   .signup-form .btn {        
   font-size: 16px;
   font-weight: bold;		
   min-width: 140px;
   outline: none !important;
   }
   .signup-form .row div:first-child {
   padding-right: 10px;
   }
   .signup-form .row div:last-child {
   padding-left: 10px;
   }    	
   .signup-form a {
   color: #fff;
   text-decoration: underline;
   }
   .signup-form a:hover {
   text-decoration: none;
   }
   .signup-form form a {
   color: #5cb85c;
   text-decoration: none;
   }	
   .signup-form form a:hover {
   text-decoration: underline;
   }
   btn-outline-danger{
     color:#f96332;
   }
</style>

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Offices</h4>
            <a class="btn btn-outline-danger action-add"  data-toggle="modal" data-target="#basicModal" ><i class="fa fa-plus mr-3"  aria-hidden="true"></i>Add</a>
          </div>
          <div class="card-body">
        <?php if(Session::has('message')):?>
              <div class="alert alert-success">  {{Session::get("message")}} </div>
        <?php endif; ?>
            <div class="table-responsive">
            <table  class="table">
            <thead class=" text-primary">
                  <th>
                  Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th >
                    Phone
                  </th>
                  <th >
                    City
                  </th>
                  <th >
                    State
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($snapshot as $row) {?>
                  <tr>
                    <td>
                    {{$row['name']}}
                    </td>
                    <td>{{$row['email']}}
                    </td>
                    <td >
                    {{$row['phoneNumber']}}
                    </td>
                    <td >
                    {{$row['city']}}
                    </td>
                    <td >
                    {{$row['state']}}
                    </td>
                  </tr>
                  <?php } ?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   
    </div>
  </div>
  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 >Manage Office</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="POST" action="/save/offices">
         @csrf
         <div class="modal-body">
            <div class="signup-form">
                
                  <div class="form-group">
                  <label for="name">Name</label>
                     <input type="text" class="form-control" name="name" >
                  </div>
                  <div class="form-group">
                  <label for="name">Phone No</label>
                     <input type="text" class="form-control" name="phoneNumber" >
                  </div>
                  <div class="form-group">
                  <label for="name">Email</label>
                     <input type="text" class="form-control" name="email" >
                  </div>
                  <!-- <div class="form-group">
                     <input type="text" class="form-control" name="name"  placeholder="State>
                  </div> -->
                  <div class="form-group">
                  <label for="name">City</label>
                  <select class="form-control" name="City" placeholder="City" >
                    <option>New York.</option>
                    <option>Los Angeles.</option>
                    <option>Chicago</option>
                    <option>Houston</option>
                    <option>San Jose</option>
                  </select>
                </div>
                  <div class="form-group">
                  <label for="name">State</label>
                  <select class="form-control" name="State" placeholder="State" >
                    <option>New York</option>
                    <option>California</option>
                    <option>Texas</option>
                    <option>Indiana</option>
                    <option>Arizona</option>
                  </select>
                </div>
               
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
         </div>
         </form>
      </div>
   </div>
</div>
@endsection