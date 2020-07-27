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
        <h1 class="page-header">KNOWLEDGE CENTER</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @php $routeName = \Request::route()->getName(); @endphp
                    List of {{ ($routeName == 'admin.knowledge_center.index') ? 'Active' : 'Trashed' }} News
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Title</th>
                                   {{-- <th>Description</th>--}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @forelse($knowledgeCenters as $knowledgeCenter)
                                <tr class="odd gradeX">
                                    <td>{{ $i }}</td>
                                    <td>{{ $knowledgeCenter->title }}</td>
                                  {{--  <td>{!! $knowledgeCenter->short_description !!}</td>--}}
                                    <td class="center">
                                    @if($routeName == 'admin.knowledge_center.index')
                                        <a href="{{ route('admin.knowledge_center.edit' , ['knowledge_center' => $knowledgeCenter->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                        <a href="" onclick="deletenews( {{ $knowledgeCenter->id }} )"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('admin.knowledge_center.destroy' , ['knowledge_center' => $knowledgeCenter->id]) }}" method="POST" id="delete-form{{ $knowledgeCenter->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @else
                                        <a href="javascript:void(0)" onclick="backToList( {{ $knowledgeCenter->id }} )"><i class="fa fa-recycle"></i></a>
                                        {{--<form action="{{ route('admin.knowledge_center.trash-back') }}" method="POST" id="trash-form{{ $knowledgeCenter->id }}" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $knowledgeCenter->id }}">
                                        </form>--}}
                                    @endif
                                    </td>
                                </tr>
                            @php $i++; @endphp
                            @empty
                                
                            @endforelse
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

        function deletenews(id)
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