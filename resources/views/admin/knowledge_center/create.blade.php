@extends('admin.layouts.app')

@section('content')

@push('head')
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">


@endpush

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ (Route::currentRouteName() == 'admin.knowledge_center.create') ? 'ADD' : 'EDIT' }} NEWS</h1>
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
                        <form role="form" action="{{ (Route::currentRouteName() == 'admin.knowledge_center.create') ? route('admin.knowledge_center.store') : route('admin.knowledge_center.update', ['knowledge_center' => $knowledgeCenter->id ])  }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                        <div class="col-lg-6">


                                @if(Route::currentRouteName() == 'admin.knowledge_center.edit')
                                <input type="hidden" name="_method" value="PUT">
                                @endif

                                @if(Route::currentRouteName() == 'admin.knowledge_center.create')
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                @endif
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" placeholder="Enter the title" value="{{ isset($knowledgeCenter->title) ? $knowledgeCenter->title : old('title') }}">
                                    @error('title')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control" id="myeditor1" rows="3">{{ (old('short_description') != null) ? old('short_description') : (isset($knowledgeCenter) ? $knowledgeCenter->short_description : null) }}</textarea>
                                    @error('short_description')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" id="myeditor" rows="3">{{ (old('description') != null) ? old('description') : (!empty($knowledgeCenter) ? $knowledgeCenter->description : null) }}</textarea>
                                        @error('description')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>


                            </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Seo URL</label>
                                <input class="form-control" name="slug" placeholder="Enter the Slug" value="{{ isset($knowledgeCenter->slug) ? $knowledgeCenter->slug : old('slug') }}">
                                @error('slug')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input class="form-control" name="meta_title" placeholder="Enter the Seo Title" value="{{ isset($knowledgeCenter->meta_title) ? $knowledgeCenter->meta_title : old('meta_title') }}">
                                @error('meta_title')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="meta_description" class="form-control" id="myeditor2" rows="3">{{ (old('meta_description') != null) ? old('meta_description') : (!empty($knowledgeCenter) ? $knowledgeCenter->meta_description : null) }}</textarea>
                                @error('meta_description')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>




                            <div class="form-group">
                                <label>Status</label>
                                <?php $status = isset($knowledgeCenter->status) ? $knowledgeCenter->status : old('status') ;?>
                                <select class="form-control" name="status">
                                    <option {{ !empty($status) && $status == 'publish' ? 'selected' : '' }} value="publish">Publish</option>
                                    <option {{ !empty($status) && $status == 'draft' ? 'selected' : '' }} value="draft">Draft</option>
                                </select>
                                @error('status')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Publish Date</label>
                                <input class="form-control" name="published_at" placeholder="Enter Publish Date" value="{{ isset($knowledgeCenter->published_at) ? date('Y-m-d',strtotime($knowledgeCenter->published_at)) : old('published_at') }}" readonly>
                                @error('published_at')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Featured</label>
                                <select name="is_featured" class="form-control">
                                    <option @if((isset($knowledgeCenter) && $knowledgeCenter->is_featured) == 1) selected
                                            @endif value="1">Yes</option>
                                    <option @if((isset($knowledgeCenter) && $knowledgeCenter->is_featured) == 0) selected
                                            @endif value="0">No</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label>Categories</label>
                                <select name="category_id[]" class="boot-multiselect-demo" multiple="multiple" style="display:none">
                                    @forelse($categories as $category)
                                        <option @if( $category->id == old('category_id') || (isset($categoryKnowledgeCenters) && in_array($category->id,$categoryKnowledgeCenters))) selected  @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Topics</label>
                                <select name="topic_id[]" class="boot-multiselect-topic" multiple="multiple"
                                        style="display:none">
                                    @forelse($topics as $topic)
                                        <option @if( $topic->id == old('topic_id') || (isset($topicTestimonials) && in_array($topic->id,$topicTestimonials))) selected
                                                @endif value="{{ $topic->id }}">{{ $topic->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Featured Image </label><br>
                                <button type="button" class="image-upload btn btn-info"
                                        data-toggle="modal" data-target="#myModal"
                                        data-id="feature_type">Upload /
                                    Replace Image
                                </button>
                                <input id="hidden-image-feature_type"
                                       type="hidden"
                                       name="featured_image"
                                       value="{{ $knowledgeCenter->featured_image ?? null }}">
                                <div id="hidden-feature_type"
                                     style="padding:25px">
                                    @if(!empty($knowledgeCenter->featured_image))
                                        <img class="img-thumbnail" style="width:150px"
                                             src="{{ asset($knowledgeCenter->featured_image) }}">
                                    @endif
                                </div>
                                @error('featured_image')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>


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
<!-- Modal -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Please Select An Image To Upload</h4>
            </div>
            <input type="hidden" id="image_type" value="">
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#menu1">Upload Image</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu2">ALl Images</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">
                        <h3></h3>
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Name/Description fields, irrelevant for this article --}}
                            <div class="form-group">
                                <div class="needsclick dropzone" id="document-dropzone">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div id="image-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('foot')
    <style>
        .treat {
            margin-bottom: 5px;
        }

        .treat, .treat label {
            cursor: pointer;
        }

        .treat label {
            margin-bottom: 0px;
        }

        span.multiselect-native-select {
            display: block;
        }

    </style>
    <!-- creating a CKEditor instance called myeditor -->
    <script type="text/javascript">
        CKEDITOR.replace('myeditor');
        CKEDITOR.replace('myeditor1');
    </script>
    <script>
        var uploadedDocumentMap = {}

        Dropzone.options.documentDropzone = {

            url: '{{ route('image-upload.upload') }}',

            maxFilesize: 2, // MB

            addRemoveLinks: true,

            headers: {

                'X-CSRF-TOKEN': "{{ csrf_token() }}"

            },

            success: function (file, response) {

                /* $('form').append('<input type="hidden" name="document[]" value="' + file.name + '">')*/
                addImageToHidden(response.name);

                uploadedDocumentMap[file.name] = response.name

            },

            removedfile: function (file) {

                file.previewElement.remove()

                var name = ''

                if (typeof file.name !== 'undefined') {

                    name = file.name

                } else {

                    name = uploadedDocumentMap[file.name]

                }

                console.log(name);

                $('form').find('input[name="document[]"][value="' + name + '"]').remove()

            },

            init: function () {

                        @if(isset($project) && $project->document)

                var files =

                {!! json_encode($project->document) !!}

                    for (var i in files) {

                    var file = files[i]

                    this.options.addedfile.call(this, file)

                    file.previewElement.classList.add('dz-complete')

                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')

                }

                @endif

            }

        }

        $(document).ready(function(){

            $('.boot-multiselect-demo').multiselect({
                includeSelectAllOption: true,
                buttonWidth: 250,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: 'categories...'
            });

            $('.boot-multiselect-topic').multiselect({
                includeSelectAllOption: true,
                buttonWidth: 250,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: 'Topics...'
            });

            $('input[name="published_at"]').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '0d',
                autoclose: true
            });

        $('.image-upload').on('click', function () {

            $('#image_type').val($(this).data('id'));

            $.ajax({

                type: "get",

                url: "{{ route('image-upload.all') }}",

                data: '',

                headers: {

                    'X-CSRF-TOKEN': "{{ csrf_token() }}"

                },

                success: function (data) {

                    $("#image-content").html(data);

                }

            });

        });


        $('.image-upload1').on('click', function () {

            $('#image_type').val($(this).data('id'));

            $.ajax({

                type: "get",

                url: "{{ route('image-upload.all') }}",

                data: '',

                headers: {

                    'X-CSRF-TOKEN': "{{ csrf_token() }}"

                },

                success: function (data) {

                    $("#image-content").html(data);

                }

            });

        });

        });

        function addImageToHidden(image_path) {

            var image_full_path = "{{ asset('') }}/" + image_path;

            var hidden_type = $('#image_type').val();

            setTimeout(function () {

                $("#hidden-image-" + hidden_type).val(image_path);

                $("#hidden-" + hidden_type).html('<img class="img-thumbnail" width="150px" src="' + image_full_path + '">');

                $("#close-model").click();

            }, 300);

        }


    </script>
@endpush

@endsection