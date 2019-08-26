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
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{ $user->name }}</strong></h3>
                    </div>                             
                    <div class="panel-body">
                        <b>Name :&nbsp;&nbsp;</b><span>{{ $user->name }}</span> 
                        <br><br>
                        <b>E-Mail :&nbsp;&nbsp;</b><span>{{ $user->email }}</span>
                        <br><br>
                        <b>Created at :&nbsp;&nbsp;</b><span>{{$user->created_at }}</span>
                        <br><br>
                        <b>Updated at :&nbsp;&nbsp;</b><span>{{ $user->updated_at }}</span>
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
                                @foreach($user->roles as $role)
                                    <tr>
                                        <td style="width: 20%">{{ $role->name }}</td>
                                        <td style="width: 20%">{{ $role->slug }}</td>
                                        <td style="width: 10%; text-align: center;">
                                            <a href="/detacherrole/{{ $user->id }}/{{ $role->id }}" style="color: red;">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                    <div class="panel-footer">
                        <button class="btn btn-default" data-toggle="modal" data-target="#Modal">
                            <span class="fa fa-plus"></span>&nbsp;Add new roles
                        </button>
                        @ifUserCan('user.update') 
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span class="fa fa-pencil"></span>&nbsp;Update
                        </button> 
                        @endif
                        @ifUserCan('user.destroy')
                        <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
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
                    <h4 class="modal-title">Update user</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="{{ route('user.update', $user) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name..."/>
                            <br>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Slug..."/>
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
                    <h4 class="modal-title">Add new roles</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="/affecterrole">
                            @csrf
                            <input type="text" name="id_user" value="{{ $user->id }}" hidden>
                            <select name="roles[]" multiple class="form-control select">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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