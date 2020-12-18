@extends('admin.layouts.app')

@section('content')

    @push('head')
        <!-- DataTables CSS -->
        <link href="{{ asset('admin-theme/startmin-master') }}/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{ asset('admin-theme/startmin-master') }}/css/dataTables/dataTables.responsive.css" rel="stylesheet">
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Permissions</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @php $routeName = \Request::route()->getName(); @endphp
                    List of {{ ($routeName == 'treatment.index') ? 'Active' : 'Trashed' }} treatments
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Treatment Title</th>
                                <th>Introduction</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    @push('foot')
        <!-- DataTables JavaScript -->
        <script src="{{ asset('admin-theme/startmin-master') }}/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('admin-theme/startmin-master') }}/js/dataTables/dataTables.bootstrap.min.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
    @endpush

@endsection