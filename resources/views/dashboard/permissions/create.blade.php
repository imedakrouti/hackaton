@extends('layouts.adminPanel.app')
@section('styles')

<link href="{{ asset('admin_panel/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_panel/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@endsection
@section('breadcrumb')
<!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style2">

                    <li class="breadcrumb-item">
                        <a href="#">Permissions</a>
                    </li>
                    <li class="breadcrumb-item active">Ajouter Permission </li>
                </ol>
            </nav>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('dashboard.permission.create') }}" class="btn btn-info btn-icon mr-2"data-placement="top" data-toggle="tooltip-primary" title="Ajouter Permission"><i class="typcn typcn-document-add"></i></a>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-danger btn-icon mr-2" id="swal-warning"><i class="mdi mdi-star"></i></button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-warning  btn-icon mr-2"><i class="mdi mdi-refresh"></i></button>
                </div>
               {{--  <div class="mb-3 mb-xl-0">
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary">14 Aug 2019</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                            <a class="dropdown-item" href="#">2015</a>
                            <a class="dropdown-item" href="#">2016</a>
                            <a class="dropdown-item" href="#">2017</a>
                            <a class="dropdown-item" href="#">2018</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
<!-- /breadcrumb -->
@endsection

@section('content')

{{-- @if (
Session()->has('add'))
<script>
    window.onload = function() {
        notif({
            msg: "تم تحديث حالة الدفع بنجاح",
            type: "success"
        })
    }
</script>
@endif --}}

<div class="row">
    <!--div-->
    <div class="col-xl-10 mx-auto">
        <div class="card">
            <div class="card-header tx-medium bd-0 tx-white bg-primary-gradient">
                <i class="fas fa-plus mr-2"></i> Ajouter Permission
            </div>
            <div class="card-body">
                        <form class="form-horizontal" action="{{ route('dashboard.permission.store') }}" method="post">
                            @method('Post')
                             @csrf     
                             <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Permission</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name"class="form-control @error('name') parsley-error @enderror" placeholder="Nom Permission" value={{ old('name') }}>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea  name="description"class="form-control resize-none @error('description') parsley-error @enderror" placeholder=" Description"rows="3" style="resize: none">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>
                            </div>
                            
                           
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Roles</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="custom-controls-stacked ">
                                            @foreach($roles as $role)
                                            <label class="ckbox mg-b-10"><input  type="checkbox" name="roles[]" value="{{ $role->id }}" {{ (is_array(old('roles')) and in_array($role->id, old('roles'))) ? ' checked' : '' }}><span> {{ $role->name }}</span></label>
                                            @endforeach

                                        </div>
                                        @error('roles')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group my-2 ">
                                   <button class="btn btn-primary-gradient btn-with-icon pd-x-30 "><i class="typcn typcn-plus"></i>Ajouter</button>
                                </div>
                            </div>
                        </form>
              
             </div>
           
         </div>
    </div>
    <!--/div-->
</div>

        @stop
        @section('scripts')

        <!--Internal  Parsley.min js -->
        <script src="{{asset('admin_panel/assets/plugins/parsleyjs/parsley.min.js')}}"></script>

        @stop
