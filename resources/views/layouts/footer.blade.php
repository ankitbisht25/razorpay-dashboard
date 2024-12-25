        
        <footer class="footer text-center text-sm-left">
            &copy; {{date('Y')}} <a href="">{{ env('APP_NAME') }}</a>
        </footer><!--end footer-->
    </div><!-- end page content -->
</div>

        <!-- jQuery  -->
        <script src="{{ asset('/theme/default/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/theme/default/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/theme/default/assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('/theme/default/assets/js/waves.js') }}"></script>
        <script src="{{ asset('/theme/default/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('/theme/default/assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('/theme/default/assets/js/moment.js') }}"></script>
        <script src="{{ asset('/theme/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('/theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/theme/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('/theme/default/assets/js/app.js') }}"></script>
        
        <script>
            $('#datatable').DataTable();           
        </script>
    </body>
</html>