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
            <h1 class="page-header">All Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @php $routeName = \Request::route()->getName(); @endphp
                    List of {{ ($routeName == 'admin.user.index') ? 'Active' : 'Trashed' }} Users
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->count())
                                @foreach($users as $user)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="center">
                                        @if($routeName == 'admin.user.index')
                                            <a href="{{ route('admin.user.edit' , ['user' => $user->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                            <a href="javascript:;" onclick="deleteUser( {{ $user->id }} )"><i class="fa fa-trash"></i></a>
                                            <form action="{{ route('admin.user.destroy' , ['user' => $user->id]) }}" method="POST" id="delete-form{{ $user->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @else
                                            <a href="javascript:void(0)" onclick="backToList( {{ $user->id }} )"><i class="fa fa-recycle"></i></a>
                                            <form action="{{ route('user.trash-back') }}" method="POST" id="trash-form{{ $user->id }}" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                            </form>
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
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

            function deleteUser(id)
            {
                event.preventDefault();
                var x = confirm('Are you sure you wants to delete?');
                if(x)
                {
                    document.getElementById('delete-form'+id).submit();
                }
                else
                {
                    return false;
                }
            }

            function backToList(id)
            {
                event.preventDefault();
                var x = confirm('Are you sure?');
                if(x)
                {
                    document.getElementById('trash-form'+id).submit();
                }
                else
                {
                    return false;
                }
            }
        </script>
    @endpush

@endsection