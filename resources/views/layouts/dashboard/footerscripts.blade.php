<script src  ="{{asset('dashboard_files/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('dashboard_files/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dashboard_files/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('dashboard_files/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard_files/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Optional-->
<script src="{{asset('dashboard_files/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('dashboard_files/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<script src="{{asset('dashboard_files/assets/js/components/vendor/sweetalert2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   <script src="{{ asset('dashboard_files/assets/js/components/vendor/sweetalert2.min.js')}}"></script> 

<!-- Argon JS -->
<script src="{{asset('dashboard_files/assets/js/argon.js?v=1.1.0')}}"></script>
{{--  <!-- Demo JS - remove this in your project -->
<script src="../../assets/js/demo.min.js"></script> --}}
<script>
 console.log('imed');
</script>
<script>
 $(document).ready(function(){
    $('.delete').click(function (e) {
    console.log('azerty'); 
    //alert('azerty')
    var form=$(this).closest('form');
      var dataID=$(this).data('id');
        alert(dataID); 
      e.preventDefault();
        swal({
        title: 'Etes Vous sure?',
        text: "Les données supprimées sont irreversibles!",
        icon: 'warning',
        buttons: ["Annuler!", " Supprimer!"],
        dangerMode: true,
       
    }).then(function (result) {
        if (result) {
            form.submit();
            /* Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            ) */
        }
    });
});
});
</script>
@yield('scripts')