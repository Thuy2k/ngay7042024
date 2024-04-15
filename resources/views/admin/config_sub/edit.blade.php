@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="{{ asset('tagator/fm.tagator.jquery.min.css') }}">
    <style>
        .error-input-tag {
            display: block;
        }

        .label-image {
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    <section class="charts">
        {{-- @php if(count($errors)) var_dump($errors->first('username')) @endphp --}}
        <div class="container-fluid">
            <header>
                <h1 class="h3 display">Danh sách cần chỉnh sửa thông tin</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-product" class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('admin.config-sub.update', $row->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label class="label">Loại cấu hình</label>
                                        <input id="name" type="text" value="{{ $row->name_detail }}" name="name"
                                            placeholder="Tên cấu hình" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label class="label">Nội dung cần thay đổi</label>
                                        <input id="value" type="text" value="{{ $row->value_db }}" name="value_db"
                                            placeholder="Giá trị" class="form-control">
                                        <div class="error error-value"
                                            @if ($errors->has('value_db')) style="display:block" @endif>
                                            {{ $errors->first('value_db') }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button id="update" type="submit" class="btn btn-primary">Cập
                                            nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal bootstrap add tag  --}}
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/admin_product.js') }}"></script>
    <script src="{{ asset('tagator/fm.tagator.jquery.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute: "http://127.0.0.1:8000/",
            selector: "textarea",
            height: 300,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
@endsection
