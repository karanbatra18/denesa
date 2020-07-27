@extends('admin.layouts.app')

@section('content')

@push('head')
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
@endpush

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ (Route::currentRouteName() == 'treatment.create') ? 'ADD' : 'EDIT' }} TREATMENT</h1>
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
                    <div class="row">
                        <div class="col-lg-6">


                            <form role="form" action="{{ (Route::currentRouteName() == 'treatment.create') ? route('treatment.store') : route('treatment.update', ['treatment' => isset($treatment->id)])  }}" method="post">
                                @csrf

                                @if(Route::currentRouteName() == 'treatment.edit')
                                <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Treatement Title</label>
                                    <input class="form-control" name="title" placeholder="Enter treatment title" value="{{ isset($treatment->title) ? $treatment->title : old('title') }}">
                                    @error('title')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                     <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control"  placeholder="Enter slug ">
                                   
                                </div>
                                
                                <div class="form-group">
                                    <label>Hospital</label><br>

                                    @foreach($hospitals as $hospital)

                                    <input type="checkbox" value="{{ $hospital->id }}"> {{ $hospital->name }} <br>

                                    @endforeach

                                    {{-- @error('hospital')
                                        <label class="error">{{ $message }}</label>
                                    @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label>Doctor</label><br>

                                    @foreach($doctors as $doctor)

                                    <input type="checkbox" value="{{ $doctor->id }}"> {{ $doctor->name }} <br>

                                    @endforeach

                                    {{-- @error('doctor')
                                        <label class="error">{{ $message }}</label>
                                    @enderror --}}
                                </div>
                            <div class="form-group">
                                <label>Introduction</label>
                                <!-- creating a text area for my editor in the form -->
                                <textarea class="form-control" id="" name="introduction">{{ (old('introduction') != null) ? old('introduction') : @$treatment->introduction }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Cost</label>
                                <!-- creating a text area for my editor in the form -->
                                <textarea class="form-control" id="myeditor1" name="cost">{{ (old('cost') != null) ? old('cost') : @$treatment->cost }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Specialization</label>
                                <!-- creating a text area for my editor in the form -->
                                <textarea class="form-control" id="myeditor2" name="specialization">{{ (old('specialization') != null) ? old('specialization') : @$treatment->specialization }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Faqs</label>
                                <!-- creating a text area for my editor in the form -->
                                <textarea class="form-control" id="myeditor2" name="faqs">{{ (old('faqs') != null) ? old('faqs') : @$treatment->faqs }}</textarea>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            
                            
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning">Submit</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.row (nested) -->
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
        CKEDITOR.replace('myeditor1');
        CKEDITOR.replace('myeditor2');
        CKEDITOR.replace('myeditor3');
        CKEDITOR.replace('myeditor4');
    </script>
@endpush

@endsection