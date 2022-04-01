<!-- jQuery -->
<script src="{{asset('public/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('public/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('public/admin/assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('public/admin/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/chart.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('public/admin/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('public/admin/assets/js/app.js')}}"></script>

<!-- CKeditor-->
<script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/ckeditor/adapters/jquery.js')}}"></script>


<!-- Sweetalert -->
<script src="{{asset('public/admin/assets/js/jquery.sweet-alert.custom.js')}}"></script>
<script src="{{asset('public/admin/assets/js/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $( '.editor' ).ckeditor();
    } );
</script>

@yield('js')
