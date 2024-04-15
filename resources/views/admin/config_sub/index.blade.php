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
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th class="cursor">Tên cấu hình</th>
                                            <th class="cursor">Giá trị đang cấu hình</th>
                                            <th>Thay đổi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rows as $row)
                                            <tr>
                                                <td>{{ $row->name_detail }}</td>
                                                <td>{{ $row->value_db }}</td>
                                                <td class="td-edit">
                                                    <span title="Edit" class="edit cursor"><a
                                                            href="{{ URL::to("admin/config-sub/edit/{$row->id}") }}"><i
                                                                class="fa fa-edit"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
@endsection
