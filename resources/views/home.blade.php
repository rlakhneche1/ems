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
        <li class="active">Dashboard</li>
    </ul>
    <!-- END BREADCRUMB -->                
                
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Dashboard</h2>
    </div>                   
                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap"> 
        @ifUserIs('admin')     
        <div class="row">
            <div class="col-md-3">
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ App\User::all()->count() }}</div>
                        <div class="widget-title">Registred users</div>
                    </div>                            
                </div>                            
                <!-- END WIDGET REGISTRED -->          
            </div>
            <div class="col-md-3">
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-circle-o"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ \YaroslavMolchan\Rbac\Models\Role::all()->count() }}</div>
                        <div class="widget-title">Registred Roles</div>
                    </div>                            
                </div>                            
                <!-- END WIDGET REGISTRED -->          
            </div>
            <div class="col-md-3">
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-circle-o"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ \YaroslavMolchan\Rbac\Models\Permission::all()->count() }}</div>
                        <div class="widget-title">Registred Permissions</div>
                    </div>                            
                </div>                            
                <!-- END WIDGET REGISTRED -->          
            </div>
            <div class="col-md-3">
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">                            
                </div>                            
                <!-- END WIDGET REGISTRED -->          
            </div>
            @endif
        </div>       
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                
</div>            
<!-- END PAGE CONTENT -->
@endsection
@section('script')
    @include('scripts.script_home')
@endsection