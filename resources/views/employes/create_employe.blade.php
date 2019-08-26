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
        <li class="active">Add an employee</li>
    </ul>
    <!-- END BREADCRUMB -->        
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Add an employee</h2>
    </div>
    <!-- END PAGE TITLE -->                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">                
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" method="POST" action="{{ route('employe.store') }}">
                    @csrf
                    <div class="panel-body"> 
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">First Name :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name..."/>
                                </div>
                                @if($errors->has('firstname'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Last Name :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name..."/>
                                </div>                                            
                                @if($errors->has('lastname'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Date of birth :</label>
                             <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" class="form-control datepicker" name="dateofbirth" placeholder="Date of birth..."/>
                                </div>
                                @if($errors->has('dateofbirth'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('dateofbirth') }}</span>
                                @endif
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Gender :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-female"></span></span>
                                    <select class="form-control" name="gender">
                                        <option value="">Choose option</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select> 
                                </div>                                            
                                @if($errors->has('gender'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Adresse :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                    <input type="text" class="form-control" name="adresse" placeholder="Adresse..."/>
                                </div>                                            
                                @if($errors->has('adresse'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Phone number :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone number..."/>
                                </div>                                            
                                @if($errors->has('phone'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email address :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lightbulb-o"></span></span>
                                    <input type="text" class="form-control" name="email" placeholder="Email address..."/>
                                </div>                                            
                                @if($errors->has('email'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Position :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                    <input type="text" class="form-control" name="position" placeholder="Position..."/>
                                </div>
                                @if($errors->has('position'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Office :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-institution"></span></span>
                                    <input type="text" class="form-control" name="office" placeholder="Office..."/>
                                </div>
                                @if($errors->has('office'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('office') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Start Date :</label>
                             <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" class="form-control datepicker" name="startdate" placeholder="Start Date..."/>
                                </div>
                                @if($errors->has('startdate'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('startdate') }}</span>
                                @endif
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Salary :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                    <input type="text" class="form-control" name="salary" placeholder="Salary..."/>
                                </div>
                                @if($errors->has('salary'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('salary') }}</span>
                                @endif
                            </div>
                        </div>
                    <div>
                    <div class="panel-footer">      
                        <button type="reset" class="btn btn-default">Clear Form</button>                              
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                
</div>            
<!-- END PAGE CONTENT -->
@endsection
@section('script')
    @include('scripts.script_form')
@endsection