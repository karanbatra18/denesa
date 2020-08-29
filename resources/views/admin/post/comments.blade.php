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
        <h1 class="page-header">BLOG POSTS</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Post Comments
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Comment</th>
                                    <th>User Email</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @forelse($post->comments as $comment)
                                <tr class="odd gradeX">
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->designation }}</td>
                                    <td>{{ $comment->is_approved == 0 ? 'Unapproved' : 'Approved'  }}</td>
                                    {{--<td>{!! $post->short_description !!}</td>--}}
                                    <td class="center">
                                        <form action="{{ route('admin.comment.destroy' , ['comment_id' => $comment->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="Submit" value="Delete" style="background: red; color: #fff; border: none;
    padding: 5px; margin: 5px;">
                                        </form>

                                        <form action="{{ route('admin.comment.update' , ['comment_id' => $comment->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="Submit" value="Approve" style="background: green; color: #fff; border: none;
    padding: 5px; margin: 5px;">
                                        </form>
                                  {{--  @if($routeName == 'admin.post.index')
                                        <a href="{{ route('admin.post.edit' , ['post' => $post->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                        <a href="" onclick="deletenews( {{ $post->id }} )"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('admin.post.destroy' , ['post' => $post->id]) }}" method="POST" id="delete-form{{ $post->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @else
                                        <a href="javascript:void(0)" onclick="backToList( {{ $post->id }} )"><i class="fa fa-recycle"></i></a>
                                        --}}{{--<form action="{{ route('post.trash-back') }}" method="POST" id="trash-form{{ $post->id }}" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                        </form>--}}{{--
                                    @endif--}}
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