@extends('layouts.app')
@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
        </li>
         <!-- END TOGGLE NAVIGATION -->   
         <li class="xn-icon-button pull-right">
            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
        </li>                 
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                   
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">E - M</a></li>
        <li class="active">Show employee</li>
    </ul>
    <!-- END BREADCRUMB -->        
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Show employee</h2>
    </div>
    <!-- END PAGE TITLE -->                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">                
        <div class="row">
            <div class="col-md-12">
                <!-- START VALIDATIONENGINE PLUGIN -->
                <div class="block">  
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{ $employe->first_name }} {{ $employe->last_name }}</strong></h3>
                    </div>                             
                    <div class="panel-body">
                        <b>First Name :&nbsp;&nbsp;</b><span>{{ $employe->first_name }}</span> 
                        <br><br>
                        <b>Last Name :&nbsp;&nbsp;</b><span>{{ $employe->last_name }}</span>
                        <br><br>
                        <b>Date of birth :&nbsp;&nbsp;</b><span>{{ $employe->birth_date }}</span>
                        <br><br>
                        <b>Gender :&nbsp;&nbsp;</b><span>{{ $employe->gender == "M" ? "Male" : "Female" }}</span>
                        <br><br>
                        <b>Adresse :&nbsp;&nbsp;</b><span>{{ $employe->adresse }}</span>
                        <br><br>
                        <b>Phone number :&nbsp;&nbsp;</b><span>{{ $employe->phone }}</span>
                        <br><br>
                        <b>Email address :&nbsp;&nbsp;</b><span>{{ $employe->email_address }}</span>
                        <br><br>
                        <b>Position :&nbsp;&nbsp;</b><span>{{ $employe->position }}</span>
                        <br><br>
                        <b>Office :&nbsp;&nbsp;</b><span>{{ $employe->office }}</span>
                        <br><br>
                        <b>Start Date :&nbsp;&nbsp;</b><span>{{ $employe->start_date }}</span>
                        <br><br>
                        <b>Salary :&nbsp;&nbsp;</b><span>{{ $employe->salary }}</span>
                    </div>  
                    <div class="panel-footer">
                        @ifUserCan('employe.update')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span class="fa fa-pencil"></span>&nbsp;Update
                        </button> 
                        @endif
                        @ifUserCan('employe.destroy')
                        <a href="{{ route('employe.destroy', $employe) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
                            <span class="fa fa-trash-o"></span>&nbsp;Delete
                        </a> 
                        @endif
                    </div>                             
                </div>                                               
                <!-- END VALIDATIONENGINE PLUGIN -->
            </div>
        </div>      
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Employee</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="{{ route('employe.update', $employe) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="text" class="form-control" name="firstname" value="{{ $employe->first_name }}" placeholder="First Name..."/>
                            <br>
                            <input type="text" class="form-control" name="lastname" value="{{ $employe->last_name }}" placeholder="Last Name..."/>
                            <br>
                            <input type="text" class="form-control datepicker" name="dateofbirth" value="{{ $employe->birth_date }}" placeholder="Date of birth..."/>
                            <br>
                            <select class="form-control select" name="gender">
                                <option value="">Choose option</option>
                                <option value="M" {{ $employe->gender == "M" ? "selected" : "" }}>Male</option>
                                <option value="F" {{ $employe->gender == "F" ? "selected" : "" }}>Female</option>
                            </select>
                            <br><br>
                            <input type="text" class="form-control" name="adresse" value="{{ $employe->adresse }}" placeholder="Adresse..."/>
                            <br>
                            <input type="text" class="form-control" name="phone" value="{{ $employe->phone }}" placeholder="Phone number..."/>
                            <br>
                            <input type="text" class="form-control" name="email" value="{{ $employe->email_address }}" placeholder="Email address..."/>
                            <br>
                            <input type="text" class="form-control" name="position" value="{{ $employe->position }}" placeholder="Position..."/>
                            <br>
                            <input type="text" class="form-control" name="office" value="{{ $employe->office }}" placeholder="Office..."/>
                            <br>
                            <input type="text" class="form-control datepicker" name="startdate" value="{{ $employe->start_date }}" placeholder="Start Date..."/>
                            <br>
                            <input type="text" class="form-control" name="salary" value="{{ $employe->salary }}" placeholder="Salary..."/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>                
</div>            
<!-- END PAGE CONTENT -->
@endsection
@section('script')
    @include('scripts.script_form')
@endsection