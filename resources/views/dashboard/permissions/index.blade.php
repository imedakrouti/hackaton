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
                    <li class="breadcrumb-item active">Liste Permission </li>
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

@if (
Session()->has('add'))
<script>
    window.onload = function() {
        notif({
            msg: "{{session('add') }}",
            type: "success"
        })
    }
</script>
@endif
@if (
Session()->has('edit'))
<script>
    window.onload = function() {
        notif({
            msg: " {{ session('edit') }} ",
            type: "success"
        })
    }
</script>
@endif

<div class="row">
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6 class="card-title mg-b-0"> Permissions</h6>
            </div>
            <div class="card-body">
               <table class="table text-md-nowrap mg-b-0 text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
					<thead>
					  <tr role="row">
                      <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 116px;">ID</th>
                      <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 116px;">Nom </th>
                      <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 167.984px;">Description</th>
{{--                        <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 167.984px;">Role</th>
  --}}                      <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 167.984px;">Date</th>
                      <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 115.984px;">Actions</th>
                    </tr>
					</thead>
					<tbody>
                     @foreach ($permissions as $index=>$permission )
                  <tr id={{ $permission->id }}>
                  <th scoop="row">{{ $index +1 }}</th>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->description }}</td>
                 {{--   <td>
                    <span class="badge badge-pill badge-light text-capitalize mr-2">Super Admin</span>
                      @foreach($permission->roles as $role)
                    <span class="badge badge-pill badge-light text-capitalize">{{ $role->name }}</span>
                    @endforeach
                 </td>  --}}
                 
                 <td>{{ $permission->created_at->format('d/m/Y') }}</td>
                  <td class="d-flex">
                    <a href="{{ route('dashboard.permission.edit',$permission->id) }}"class="btn btn-outline-warning btn-sm mr-2 "><i class="fas fa-user-edit"></i></a>
                   {{--  <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Supprimer permission">
                      <i class="fas fa-trash text-danger"></i>
                    </a> --}}
                    {{-- <form method="post" action="{{ route('dashboard.permission.destroy', $permission->id) }}"style="display: inline-block">
                        @csrf
                      @method('delete') --}}
                      <button class="btn btn-outline-danger btn-sm delete " data-id="{{$permission->id}}"><i class="fas fa-trash "></i></button>

                  {{--  </form> --}}
                  </td>
                </tr>

                @endforeach
					</tbody>
				</table>
            </div>
        </div>
    </div>
    <!--/div-->
</div>

        @stop
        @section('scripts')

<!-- Internal Data tables -->
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_panel/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>

<!--Internal  Datatable js -->
<script src="{{ asset('admin_panel/assets/js/table-data.js') }}"></script>

        <script>
            console.log('imed')
        </script>
         <script>
            $(document).ready(function(){
              $('.delete').click(function (e) {
              console.log('azerty');
                var dataID=$(this).data('id');
                 // alert(dataID);
                e.preventDefault();
               // url="permission/" + dataID;
               url="{{ route('dashboard.permission.destroy',':id') }}";
               url=url.replace(':id',dataID);
                console.log(url);
          swal({
             title: 'Etes Vous sure?',
             text: "Les données supprimées sont irreversibles!",
             type: "warning",
             showCancelButton: true,
             confirmButtonClass: "btn-danger",
             confirmButtonText: "Yes, Supprimer!",
             cancelButtonText: "No, Annuler!",
             closeOnConfirm: true,

           },
           function(isConfirm) {
             if (isConfirm) {
                 $.ajax({
                     type: "DELETE",
                     url: url,
                     data: {
                         id:dataID,
                         "_token":"{{ csrf_token() }}",
                     },

                     success: function (response) {
                         console.log(response.msg);
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        notif({
                            msg: "Données supprimées avec succes",
		                    type: "success",
                            position: "center"

                        });
                        $("#"+dataID ).remove();
                     }
                 });
             }
           });
           });
           });
          </script>
        @stop
