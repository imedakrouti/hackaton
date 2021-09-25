	<!-- JQuery min js -->
    <script src="{{ asset('admin_panel/assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('admin_panel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('admin_panel/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Ionicons js -->
    <script src="{{ asset('admin_panel/assets/plugins/ionicons/ionicons.js')}}"></script>

    <!-- Moment js -->
    <script src="{{ asset('admin_panel/assets/plugins/moment/moment.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('admin_panel/assets/plugins/raphael/raphael.min.js') }}"></script>

    <!-- Custom Scroll bar Js-->
    <script src="{{ asset('admin_panel/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

  
    <!-- Rating js-->
    <script src="{{ asset('admin_panel/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('admin_panel/assets/plugins/rating/jquery.barrating.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('admin_panel/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin_panel/assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!-- Eva-icons js -->
    <script src="{{ asset('admin_panel/assets/js/eva-icons.min.js') }}"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('admin_panel/assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('admin_panel/assets/plugins/sidebar/sidebar-custom.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('admin_panel/assets/js/sticky.js') }}"></script>
    <script src="{{ asset('admin_panel/assets/js/modal-popup.js') }}"></script>

    <!-- Left-menu js-->
    <script src="{{ asset('admin_panel/assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!--Internal  Sweet-Alert js-->
		<script src="{{ asset('admin_panel/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
		<script src="{{ asset('admin_panel/assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>
    <!-- Sweet-alert js  -->
		<script src="{{ asset('admin_panel/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
		<script src="{{ asset('admin_panel/assets/js/sweet-alert.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ asset('admin_panel/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ asset('admin_panel/assets/plugins/notify/js/notifit-custom.js') }}"></script>

 @yield('scripts')
    <!-- custom js -->
    <script src="{{ asset('admin_panel/assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin_panel/assets/js/jquery.vmap.sampledata.js') }}"></script>

   {{--  <script>
         $(document).ready(function(){
           $('.delete').click(function (e) {
           console.log('azerty');
           //alert('azerty')
           var form=$(this).closest('form');
             var dataID=$(this).data('id');
              
             e.preventDefault();
             
       swal({
          title: 'Etes Vous sure?',
          text: "Les données supprimées sont irreversibles!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes, Supprimer!",
		  cancelButtonText: "No, Annuler!",
		  closeOnConfirm: false,
		
		},
		function(isConfirm) {
		  if (isConfirm) {
              
            form.submit();
		  }
		});
		});
		});
       </script> --}}

