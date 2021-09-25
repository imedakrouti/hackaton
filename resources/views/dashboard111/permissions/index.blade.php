@extends('layouts.dashboard.app')
@section('header')

    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Liste Permission</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">  <i class="ni ni-shop "></i></a></li>
                <li class="breadcrumb-item"><a href="">Permissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liste Permissions</li>
              </ol>
            </nav>
          </div>
         {{--  <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">New</a>
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          </div> --}}
        </div>
 
      </div>
    </div>
  
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 card-wrapper ct-example">
      <!-- Styles -->
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Liste Permission</h3>
            </div>
            <div class="col ">
                <form class="navbar-search  form-inline mr-sm-3" id="">
                    <div class="form-group mb-0 ">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control " name="search" autofocus placeholder="Search" type="text"  value="{{ request()->search }}">
                      </div>
                    </div>
                   
                  </form>
                <!-- end of form -->
            </div>
            <div class="col text-right">
              <a href="{{ route('dashboard.permission.create') }}" class="btn btn-sm btn-primary">Ajouter permission </a>
            </div>
            
          </div>
        </div>
       
        <div class="table-responsive">
          <!-- Projects table -->
          @if($permissions->count())
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Roles</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $index=>$permission )
                  <tr>
                  <th scoop="row">{{ $index +1 }}</th>
                  <td>{{ $permission->name }}</td>
                  <td>@foreach($permission->roles as $role)
                    <span class="badge  badge-success text-dark text-capitalize">{{ $role->name }}</span>
                    @endforeach
                 </td>
                  <td class="table-actions">
                    <a href="{{ route('dashboard.permission.edit',$permission->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Modifier permission">
                      <i class="fas fa-user-edit text-warning"></i>
                    </a>
                   {{--  <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Supprimer permission">
                      <i class="fas fa-trash text-danger"></i>
                    </a> --}}
                    <form method="post" action="{{ route('dashboard.permission.destroy', $permission->id) }}"style="display: inline-block">
                        @csrf
                      @method('delete')
                        <i class="fas fa-trash text-danger delete "style="cursor:pointer" data-id="{{$permission->id}}"></i>         
                   </form>
                  </td>
                </tr>

                @endforeach
            </tbody>
        </table>
                @else
                  <div class="d-flex justify-content-center align-items-center py-3">
                      @include('dashboard.partials.no_informations')
                  </div>
                 @endif
        </div>
      </div>
     
    </div>
  </div>
        
@endsection