@extends('layouts.app', [
'namePage' => 'Table List',
'class' => 'sidebar-mini',
'activePage' => 'table',
])
@section('content')
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
<div class="panel-header panel-header-sm">
</div>
<div class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title"> Foods</h4>
               <a class="btn btn-outline-danger action-add"  data-toggle="modal" data-target="#basicModal" ><i class="fa fa-plus mr-3"  aria-hidden="true"></i>Add</a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table">
                     <thead class=" text-primary">
                        <th>
                           Name
                        </th>
                        <th>
                           Country
                        </th>
                        <th>
                           City
                        </th>
                        <th class="text-right">
                           Salary
                        </th>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              Dakota Rice
                           </td>
                           <td>
                              Niger
                           </td>
                           <td>
                              Oud-Turnhout
                           </td>
                           <td class="text-right">
                              $36,738
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Minerva Hooper
                           </td>
                           <td>
                              Curaçao
                           </td>
                           <td>
                              Sinaai-Waas
                           </td>
                           <td class="text-right">
                              $23,789
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Sage Rodriguez
                           </td>
                           <td>
                              Netherlands
                           </td>
                           <td>
                              Baileux
                           </td>
                           <td class="text-right">
                              $56,142
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Philip Chaney
                           </td>
                           <td>
                              Korea, South
                           </td>
                           <td>
                              Overland Park
                           </td>
                           <td class="text-right">
                              $38,735
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Doris Greene
                           </td>
                           <td>
                              Malawi
                           </td>
                           <td>
                              Feldkirchen in Kärnten
                           </td>
                           <td class="text-right">
                              $63,542
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Mason Porter
                           </td>
                           <td>
                              Chile
                           </td>
                           <td>
                              Gloucester
                           </td>
                           <td class="text-right">
                              $78,615
                           </td>
                        </tr>
                        <tr>
                           <td>
                              Jon Porter
                           </td>
                           <td>
                              Portugal
                           </td>
                           <td>
                              Gloucester
                           </td>
                           <td class="text-right">
                              $98,615
                           </td>
                        </tr>
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
            <h3 >Manage Foods</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="signup-form">
               <form >
                  <div class="form-group">
                     <input type="text" class="form-control"  placeholder="Name" required="required">
                  </div>
                  <div class="form-group">
                     <select class="form-control" placeholder="Country" >
                        <option>Afghanistan.</option>
                        <option>Algeria.</option>
                        <option>Afghanistan</option>
                        <option>Afghanistan</option>
                        <option>Afghanistan</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control" placeholder="City" >
                        <option>Afghanistan.</option>
                        <option>Algeria.</option>
                        <option>Afghanistan</option>
                        <option>Afghanistan</option>
                        <option>Afghanistan</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control"  placeholder="Salary" required="required">
                  </div>
               </form>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>
@endsection