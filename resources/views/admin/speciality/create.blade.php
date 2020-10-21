@extends('admin.layouts.app')

@section('content')

@push('head')
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
@endpush

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ (Route::currentRouteName() == 'speciality.create.type') ? 'ADD '.strtoupper($type).' ' : 'EDIT '.strtoupper($category->type).' ' }} Speciality</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    * Please fill all the required details.
                </div>
                <div class="panel-body">
                <form role="form" action="{{ (Route::currentRouteName() == 'speciality.create.type') ? route('speciality.store') : route('speciality.update', ['speciality' => $category->id])  }}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            
                                @csrf

                                @if(Route::currentRouteName() == 'speciality.edit')
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="type" value="{{ $category->type }}">
                                @endif
                                @if(Route::currentRouteName() == 'speciality.create.type')
                                <input type="hidden" name="type" value="{{ $type }}">
                                @endif
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Category Name" value="{{ isset($category->name) ? $category->name : old('name') }}">
                                    @error('name')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                            
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning">Submit</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>
                    
                    </div>
                    <!-- /.row (nested) -->
                </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
<!-- /.row -->

@push('foot')
    <!-- creating a CKEditor instance called myeditor -->
    <script type="text/javascript">
        CKEDITOR.replace('myeditor');
    </script>
@endpush

@endsection