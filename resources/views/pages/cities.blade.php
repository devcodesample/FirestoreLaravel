@extends('layouts.app', [
'namePage' => 'Cities List',
'class' => 'sidebar-mini',
'activePage' => 'table',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title"> Cities</h4>
               <a class="btn btn-outline-danger action-add"  data-toggle="modal" data-target="#basicModal" ><i class="fa fa-plus mr-3"  aria-hidden="true"></i>Add</a>
            </div>
            <div class="card-body">
               <?php if(Session::has('message')):?>
               <div class="alert alert-success">  {{Session::get("message")}} </div>
               <?php endif; ?>
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead class="action-head">
                        <th>
                           Name
                        </th>
                        <th >
                           State
                        </th>
                        <th >
                           Country
                        </th>
                        <th class="text-center"> Delete</th>
                     </thead>
                     <tbody>
                        <?php foreach ($snapshot as $row) {?>
                        <tr>
                           <td>
                              {{$row['name']}}
                           </td>
                           <td >
                              {{$row['state']}}
                           </td>
                           <td >
                              {{$row['country']}}
                           </td>
                           <td class="text-center"><a class="action-delete"  href="javascript:;" rel="{{ url('deleteRecord/cities/'.$row->id()) }}"><i class="far fa-trash-alt action-trash"></i></a></td>
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
            <h3 >Manage Cities</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="POST" action="/save/cities">
            @csrf
            <div class="modal-body">
               <div class="signup-form">
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" class="form-control" name="Name" >
                  </div>
                  <div class="form-group">
                     <label for="name">State</label>
                     <select class="form-control" name="State" placeholder="State" >
                        <option>New York</option>
                        <option>California</option>
                        <option>Texas</option>
                        <option>Indiana</option>
                        <option>Other</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="name">Country</label>
                     <select class="form-control" name="Country" placeholder="Country" >
                        <option>USA.</option>
                        <option>Other.</option>
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
</script>
@endprepend