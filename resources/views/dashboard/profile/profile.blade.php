@extends('layouts.adminPanel.app')
@section('styles')

<link href="{{ asset('admin_panel/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_panel/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_panel/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{ asset('admin_panel/assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
<!--- Internal Select2 css-->
<link href="{{asset('admin_panel/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{asset('admin_panel/assets/plugins/sumoselect/sumoselect.css')}}">
<style>

.upload-image input{

    width: 30% !important;
    height: 30px !important;
    opacity: 0 !important;
    overflow: hidden !important;
    cursor:pointer;
}
.upload-image {
  overflow:hidden;
  position: absolute;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  line-height: 30px;
  right: 0;
  background: #d5d4e0;
  margin: 0 auto;
  text-align: center;
  display:inline-block;
  /*background-color:#fff;*/
  background-repeat: no-repeat;
  background-image:
    url('http://icons.iconarchive.com/icons/martz90/circle/512/camera-icon.png');
 background-size:cover;
 cursor:pointer;
}
</style>
@endsection
@section('breadcrumb')
<!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style2">

                    <li class="breadcrumb-item">
                        <a href="#">Profile</a>
                    </li>
                    <li class="breadcrumb-item active">Editer Profile </li>
                </ol>
            </nav>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('dashboard.profile') }}" class="btn btn-info btn-icon mr-2"data-placement="top" data-toggle="tooltip-primary" title="Ajouter Profile"><i class="typcn typcn-document-add"></i></a>
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

@if (
Session('add'))
<script>
    window.onload = function() {
        notif({
            msg: "{{session('add') }}",
            type: "success",
            position:"center"
        })
    }
</script>
@endif

<!-- row -->
<div class="row row-sm">
    <!-- Col -->
    <div class="col-lg-4">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            <img alt="" src="{{ $profile->path_image }}">{{--  <a class="fas fa-camera profile-edit" href="JavaScript:void(0);">  --}}</a>
                        </div>
                        <div class="d-flex justify-content-between mg-b-20">
                            <div>
                                <h5 class="main-profile-name">{{ $profile->name }}</h5>
                                @foreach($profile->roles as $role )
                                <p class="main-profile-name-text text-capitalize">{{ str_replace('_',' ',$role->name) }}</p>
                                @endforeach
                            </div>
                        </div>
                        <h6>Bio</h6>
                        <div class="main-profile-bio">
                            pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure.. <a href="">More</a>
                        </div><!-- main-profile-bio -->
                       {{--   <div class="row">
                            <div class="col-md-4 col mb20">
                                <h5>947</h5>
                                <h6 class="text-small text-muted mb-0">Followers</h6>
                            </div>
                            <div class="col-md-4 col mb20">
                                <h5>583</h5>
                                <h6 class="text-small text-muted mb-0">Tweets</h6>
                            </div>
                            <div class="col-md-4 col mb20">
                                <h5>48</h5>
                                <h6 class="text-small text-muted mb-0">Posts</h6>
                            </div>
                        </div>  --}}
                        {{--  <hr class="mg-y-30">  --}}
                       {{--   <label class="main-content-label tx-13 mg-b-20">Social</label>
                        <div class="main-profile-social-list">
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-logo-github"></i>
                                </div>
                                <div class="media-body">
                                    <span>Github</span> <a href="">github.com/spruko</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-success-transparent text-success">
                                    <i class="icon ion-logo-twitter"></i>
                                </div>
                                <div class="media-body">
                                    <span>Twitter</span> <a href="">twitter.com/spruko.me</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-info-transparent text-info">
                                    <i class="icon ion-logo-linkedin"></i>
                                </div>
                                <div class="media-body">
                                    <span>Linkedin</span> <a href="">linkedin.com/in/spruko</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-danger-transparent text-danger">
                                    <i class="icon ion-md-link"></i>
                                </div>
                                <div class="media-body">
                                    <span>My Portfolio</span> <a href="">spruko.com/</a>
                                </div>
                            </div>
                        </div>  --}}
                       {{--   <hr class="mg-y-30">  --}}
                      {{--    <h6>Skills</h6>
                        <div class="skill-bar mb-4 clearfix mt-3">
                            <span>HTML5 / CSS3</span>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                            </div>
                        </div>
                        <!--skill bar-->
                        <div class="skill-bar mb-4 clearfix">
                            <span>Javascript</span>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 89%"></div>
                            </div>
                        </div>
                        <!--skill bar-->
                        <div class="skill-bar mb-4 clearfix">
                            <span>Bootstrap</span>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                            </div>
                        </div>
                        <!--skill bar-->
                        <div class="skill-bar clearfix">
                            <span>Coffee</span>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                            </div>
                        </div>
                        <!--skill bar-->  --}}
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label tx-13 mg-b-25">
                    Conatct
                </div>
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-md-phone-portrait"></i>
                        </div>
                        <div class="media-body">
                            <span>Mobile</span>
                            <div>
                                {{ $profile->phone }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-slack"></i>
                        </div>
                        <div class="media-body">
                            <span>Email</span>
                            <div>
                                {{ $profile->email }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-md-locate"></i>
                        </div>
                        <div class="media-body">
                            <span> Addresse</span>
                            <div>
                              {{ $profile->address }}
                            </div>
                        </div>
                    </div>
                </div><!-- main-profile-contact-list -->
            </div>
        </div>
    </div>

    <!-- Col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs" id ="tabMenu">
                            <li class="active">
                                <a href="#home" data-toggle="tab" aria-expanded="true" class="active"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">Informations Personnelles</span> </a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class=""> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">Parametres</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="home">

                <form class="form-horizontal" method="POST" action="{{ route('dashboard.profile.update',$profile->id) }}" enctype="multipart/form-data">
                   @csrf

                    {{--  <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Language</label>
                            </div>
                            <div class="col-md-9">
                                <select name="language" class="form-control select2">
                                    <option></option>
                                    <option >Us English</option>
                                    <option >Arabic</option>
                                    <option >Korean</option>
                                </select>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="mb-4 main-content-label">Nom & Image</div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Nom</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('first_name') parsley-error @enderror" name="first_name" placeholder="Nom" value="{{ old('first_name',$profile->first_name )}}">
                                @error('first_name')
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
                                <label class="form-label">Prenom</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  name="last_name" placeholder="Prenom" value="{{old('last_name', $profile->last_name) }}">
                                @error('last_name')
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
                                <label class="form-label">Image</label>
                            </div>
                            <div class="col-md-9">
                             {{--     <div class="">
                                    <div class="upload-image">
                                        <input type='file' class="imgInp" data-id='img1' />
                                    </div>
                                    <br>
                                    <img id="img1" src="https://i.imgur.com/zAyt4lX.jpg" alt="your image" height="100" />

                                  </div>      --}}
                                  <div class="main-profile-overview">
                                    <div class="main-img-user profile-user ">
                                        <img alt="" id="img1" src="{{ $profile->path_image }}">
                                      {{--    <a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>  --}}
                                      <div class="upload-image">
                                        <input type='file' name="image" class="imgInp" data-id='img1' />
                                        @error('image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                  <!-- main-profile-bio -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 main-content-label">Contact Info</div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email"class="form-control @error('email') parsley-error @enderror"  placeholder="Email" value="{{ old('email', $profile->email) }}">
                                @error('email')
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
                                <label class="form-label">Telephone</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('phone') parsley-error @enderror" name="phone" placeholder="Numero Telephone" value="{{ old('phone',$profile->phone) }}">
                                @error('phone')
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
                                <label class="form-label">Addresse</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control @error('address') parsley-error @enderror" name="address" rows="2"  placeholder="Address">{{ old('address',$profile->address) }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 main-content-label">Email Preferences</div>
                    <div class="form-group mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Verified User</label>
                            </div>
                            <div class="col-md-9">
                                <div class="custom-controls-stacked">
                                    <label class="ckbox mg-b-10"><input checked="" type="checkbox"><span> Accept to receive post or page notification emails</span></label>
                                    <label class="ckbox"><input checked="" type="checkbox"><span> Accept to receive email sent to multiple recipients</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

                <button type="submit" class="btn btn-primary waves-effect waves-light">Editer Profile</button>

        </form>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form  action="{{ route('dashboard.changePassword') }}" method="POST"role="form">
                                @csrf
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Mot de passe</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" placeholder="*********" name="current_password" class="form-control  @error('current_password')parsley-error @enderror">
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Nouvelle mot de passe</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" placeholder="*********" name="new_password" class="form-control @error('new_password')parsley-error @enderror">
                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label"> Confirmation mot de passe</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" placeholder="*********" name="new_confirm_password" class="form-control  @error('new_confirm_password')parsley-error @enderror">
                                            @error('new_confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Editer mot de passe</button>
                            </form>
                        </div>
                    </div>


        </div>
    </div>
    <!-- /Col -->
</div>
<!-- row closed -->

        @stop
        @section('scripts')
        <!--Internal  Form-elements js-->
		<script src="{{asset('admin_panel/assets/js/advanced-form-elements.js')}}"></script>
		<!--Internal Sumoselect js-->
		<script src="{{asset('admin_panel/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
        <!-- Internal Select2 js-->
		<script src="{{ asset('admin_panel/assets/plugins/select2/js/select2.min.js') }}"></script>
        <!--Internal  Parsley.min js -->
        <script src="{{asset('admin_panel/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
        <!-- Internal Input tags js-->
		<script src="{{ asset('admin_panel/assets/plugins/inputtags/inputtags.js') }}"></script>
        <script>
      $(document).ready(function () {

            $('.select2').select2({
			placeholder: "Choisissez Language",
            allowClear: true
			});

        });
      $(document).ready(function () {

        $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show');
        console.log({{ old('tab') }})
        });
        </script>
        <script>
             function ImageSetter(input,target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                target.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".imgInp").change(function(){
      var imgDiv=$(this).data('id');
           imgDiv=$('#' + imgDiv);
        ImageSetter(this,imgDiv);
    });
        </script>
        @stop
