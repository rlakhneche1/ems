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
        <li class="active">Show user</li>
    </ul>
    <!-- END BREADCRUMB -->        
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Show user</h2>
    </div>
    <!-- END PAGE TITLE -->                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">                
        <div class="row">
            <div class="col-md-12">
                <!-- START VALIDATIONENGINE PLUGIN -->
                <div class="block">
                    @if($message = Session::get('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif 
                    @if($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @endif
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{ Auth::user()->name }}</strong></h3>
                    </div>                             
                    <div class="panel-body">
                        <b>Name :&nbsp;&nbsp;</b><span>{{ Auth::user()->name }}</span> 
                        <br><br>
                        <b>E-Mail :&nbsp;&nbsp;</b><span>{{ Auth::user()->email }}</span>
                        <br><br>
                        <b>Created at :&nbsp;&nbsp;</b><span>{{ Auth::user()->created_at }}</span>
                        <br><br>
                        <b>Updated at :&nbsp;&nbsp;</b><span>{{ Auth::user()->updated_at }}</span>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->roles as $role)
                                    <tr>
                                        <td style="width: 20%">{{ $role->name }}</td>
                                        <td style="width: 20%">{{ $role->slug }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                    <div class="panel-footer">
                        <button class="btn btn-default" data-toggle="modal" data-target="#Modal">
                            <span class="fa fa-pencil"></span>&nbsp;Change Password
                        </button> 
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span class="fa fa-pencil"></span>&nbsp;Update
                        </button> 
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
                    <h4 class="modal-title">Update user</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="/updateuser/{{ Auth::user()->id }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Name..."/>
                            <br>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Slug..."/>
                            <br>
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
     <!-- Modal -->  
    <div id="Modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="/updatepassword/{{ Auth::user()->id }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="password" class="form-control" name="current" placeholder="Current Password..."/>
                            <br>
                            <input type="password" class="form-control" name="newpassword" placeholder="New Password..."/>
                            <br>
                            <input type="password" class="form-control" name="confirmnewpassword" placeholder="Confirm New Password..."/>
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