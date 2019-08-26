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
        <li class="active">Add user</li>
    </ul>
    <!-- END BREADCRUMB -->        
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Add user</h2>
    </div>
    <!-- END PAGE TITLE -->                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">                
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="panel-body"> 
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Username :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="name" placeholder="Username..."/>
                                </div>
                                @if($errors->has('name'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
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
                            <label class="col-md-3 col-xs-12 control-label">Password :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password..."/>
                                </div>                                            
                                @if($errors->has('password'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Confirm :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm..."/>
                                </div>                                            
                                @if($errors->has('password_confirmation'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Roles :</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-certificate"></span></span>
                                    <select name="roles[]" multiple class="form-control select">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>                                            
                                @if($errors->has('roles'))                                            
                                    <span class="help-block" style="color: red">{{ $errors->first('roles') }}</span>
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