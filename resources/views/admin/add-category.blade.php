@extends('admin.layouts.master')

@section('main')


    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Thêm loại hàng</h5>
                    <form class="row" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="">Tên loại hàng</label>
                                <input name="name" placeholder="Nhập tên loại hàng" type="text"
                                       class="mb-2 form-control">
                                @if ($errors->has('name'))
                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="">Đường dẫn url</label>
                                <input name="slug" placeholder="Nhập đường dẫn url" type="text"
                                       class="mb-2 form-control">
                            </div>

                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary btn-submit" type="submit">Thêm loại hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
