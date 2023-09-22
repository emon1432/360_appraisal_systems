<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets') }}/images/ist_logo_mini.gif" type="image/gif" />
    <!-- Styles -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--plugins-->
    <link href="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />

    <!-- loader-->
    <link href="{{ asset('assets') }}/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('assets') }}/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/bootstrap-extended.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/app.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/dark-theme.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/semi-dark.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/header-colors.css" />
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    @stack('css')
    <title>360 Appraisal System</title>
</head>

<body>
    <div class="wrapper">
        @include('backend.layouts.includes.sidebar')
        @include('backend.layouts.includes.header')
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        @include('backend.layouts.includes.footer')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/input-tags/js/tagsinput.js"></script>

    <script src="{{ asset('assets') }}/js/index.js"></script>
    <!--app JS-->
    <script src="{{ asset('assets') }}/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')

    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            $('.multiple-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });
        });



        function deleteData(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + id).submit();
                }
            });
        }
    </script>
    @stack('js')
</body>

</html>
