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
      <div class="col-md-3">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title"> Office Type</h4>
                  <a class="btn btn-outline-danger action-add"  data-toggle="modal" data-target="#secondModal" ><i class="fa fa-plus mr-3"  aria-hidden="true"></i>Add</a>
              </div>   
              <div class="card-body">
              <ul class="list-group">
              <?php foreach ($officeList as $row) { ?>
                  <li class="list-group-item <?php echo $row->id()==$type?'active':'';?>"><a href="{{ url('offices/'.$row->id()) }}">{{$row->id()}}</li>
              <?php } ?>    
                </ul>
              </div> 
          </div>    
       </div>    
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Offices</h4>
            <!-- <select name="office_list" class>
              <option value=""></option>
            </select> -->
            <a class="btn btn-outline-danger action-add"  data-toggle="modal" data-target="#basicModal" ><i class="fa fa-plus mr-3"  aria-hidden="true"></i>Add</a>
          </div>
          <div class="card-body">
        <?php if(Session::has('message')):?>
              <div class="alert alert-success">  {{Session::get("message")}} </div>
        <?php endif; ?>
        <?php if(!empty($snapshot)): 
        foreach ($snapshot as $row) {?>
        <div class="card office-card" style="width: 12rem;">
        <a class="action-delete"  href="javascript:;" rel="{{ url('deleteRecord/offices/'.$row->id()) }}"><i class="far fa-trash-alt action-trash"></i></a>
          <img src="{{asset('images/'.$row['photoUrl'])}}" height="100" class="card-img-top" src="..." alt="Card image cap"/>
          <div class="card-body">
            <h6 class="card-title">{{$row['name']}}</h6>
            <p class="card-text">{{ is_array($row['state'])?implode(", ",$row['state']):''}}</p>
          </div>
        </div>
        <?php }
        else:
           ?>
           <div class="alert alert-warning"> No Category Selected</div>
           <?php 
      endif;?>
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
         <form method="POST" action="/save/offices" enctype="multipart/form-data" >
         @csrf
         <div class="modal-body">
            <div class="signup-form">
                
                  <div class="form-group">
                  <label for="name">Name</label>
                     <input type="text" class="form-control" name="name" >
                     <input type="hidden" class="form-control" name="officeType" value="{{ $type }}" >
                  </div>
                  <div class="form-group">
                  <label for="name">Image URL</label>
                     <input type="file" class="form-control" name="photoUrl" >
                  </div>
                  <!-- <div class="form-group">
                     <input type="text" class="form-control" name="name"  placeholder="State>
                  </div> -->
                  <label for="name">State</label>
                  <div class="form-check">
                    
                    <label class="form-check-label">  
                    <input class="form-check-input" type="checkbox" value="New York" name="states[]">
                        New York
                    </label>
                    <label class="form-check-label">
                      
                    <input class="form-check-input" type="checkbox" value="California" name="states[]">
                    California
                    </label>
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="Texas" name="states[]">
                      Texas
                    </label>
                    
                  </div>
                  <!-- <div class="form-group">
                    
                  
                  <select class="form-control" name="State" placeholder="State" >
                    <option>New York</option>
                    <option></option>
                    <option></option>
                    <option>Indiana</option>
                    <option>Arizona</option>
                  </select>
                </div> -->
               
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
<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="secondModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 >Manage Office Type</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="POST" action="/save/officetype" enctype="multipart/form-data" >
         @csrf
         <div class="modal-body">
            <div class="signup-form">         
                  <div class="form-group">
                  <label for="name">Office Type</label>
                     <input type="text" class="form-control no-blank" name="type" >
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
@prepend('js')
<script type="text/javascript">
    $(document).on('click','.action-delete',function() {
        var url = $(this).attr('rel');
        if(confirm("Are you sure you want to delete this?")){
           window.location.href = url
        }
        else{
            return false;
        }
    })
    $("input.no-blank").on({
        keydown: function(e) {
          if (e.which === 32)
            return false;
        },
        change: function() {
          this.value = this.value.replace(/\s/g, "");
        }
      });
</script>
@endprepend