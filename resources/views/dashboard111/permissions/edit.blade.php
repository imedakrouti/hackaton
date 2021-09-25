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
        <div class="card-header ">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Modifier Permission</h3>
            </div>
          </div>
        </div>
       
        <div class="card-body">
            <form action="{{ route('dashboard.permission.update',$permission->id) }}" method="post">
                @method('Put')
                @csrf
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlInput1">Permission</label>
                <input type="text" name="name"class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" value="{{ $permission->name }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <div class="form-grou">
                  <button class="btn btn-warning"type="submit">Modifier</button>
              </div>
              
              
            </form>
          </div>
      </div>
     
      <!-- Colors -->
     
      <!-- Outline -->
     
      <!-- Sizes -->
      
      <!-- Group -->
     
      <!-- Social -->
     
    </div>
  </div>
        
@endsection