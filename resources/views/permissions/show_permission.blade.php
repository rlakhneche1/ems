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
        <li class="active">Show permission</li>
    </ul>
    <!-- END BREADCRUMB -->        
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Show permission</h2>
    </div>
    <!-- END PAGE TITLE -->                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">                
        <div class="row">
            <div class="col-md-12">
                <!-- START VALIDATIONENGINE PLUGIN -->
                <div class="block">  
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{ $permission->name }}</strong></h3>
                    </div>                             
                    <div class="panel-body">
                        <b>Name :&nbsp;&nbsp;</b><span>{{ $permission->name }}</span> 
                        <br><br>
                        <b>Slug :&nbsp;&nbsp;</b><span>{{ $permission->slug }}</span>
                        <br><br>
                        <b>Created at :&nbsp;&nbsp;</b><span>{{ $permission->created_at }}</span>
                        <br><br>
                        <b>Updated at :&nbsp;&nbsp;</b><span>{{ $permission->updated_at }}</span>
                    </div>  
                    <div class="panel-footer">
                        @ifUserCan('permission.update')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span class="fa fa-pencil"></span>&nbsp;Update
                        </button> 
                        @endif
                        @ifUserCan('permission.destroy')
                        <a href="{{ route('permission.destroy', $permission) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Etes Vous Sur ?">
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
                    <h4 class="modal-title">Update permission</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="{{ route('permission.update', $permission) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="text" class="form-control" name="name" value="{{ $permission->name }}" placeholder="Name..."/>
                            <br>
                            <input type="text" class="form-control" name="slug" value="{{ $permission->slug }}" placeholder="Slug..."/>
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
</div>            
<!-- END PAGE CONTENT -->
@endsection
@section('script')
    @include('scripts.script_form')
@endsection