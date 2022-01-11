@extends('admin.layouts.master')

@section('main')
    @if(Session::has('errors'))
        <div class="mb-2 mr-2 badge badge-danger">{{Session::get('errors')}}</div>
    @endif
    @if(Session::has('success'))
        <div class="mb-2 mr-2 badge badge-success">{{Session::get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div style="margin-bottom: 20px; display: flex;
                    justify-content: space-between; flex-direction: row; align-items: flex-end;">
                        <h5 class="card-title" style="">Danh sách thương hiệu</h5>
                        <form action="" style="">
                            <div class="search-wrapper active">
                                <div class="input-holder">
                                    <input name="key" type="text" class="search-input" placeholder="Type to search">
                                    <button type="submit" class="search-icon"><span></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên thương hiệu</th>
{{--                            <th>Đường dẫn</th>--}}
                            <th>Số sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Logo</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($brand as $value)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$value->name}}</td>
{{--                                <td>{{$value->slug}}</td>--}}
                                <td>{{$value->numberOfProducts->count()}}</td>
                                <td>{{$value->status == 1 ? 'Hien' : 'An'}}</td>
                                <td>
                                    <img style="width: 100px;" src="{{url('uploads')}}/{{$value->logo}}" alt="">
                                </td>
                                <td>
                                    <a href="{{route('brand.edit', $value->id)}}" class="mb-2 mr-2 btn btn-warning">Sửa</a>
                                    <a href="{{route('brand.destroy', $value->id)}}" class="mb-2 mr-2 btn btn-danger btDelete">Xóa</a>
                                <!-- <button class="mb-2 mr-2 btn btn-light"><a target="_blank" href="{{ route('user.products') }}">View</a></button> -->
                                </td>
                            </tr>
                        @empty
                            <tr><th colspan="7" style="text-align: center">Không có thương hiệu nào</th></tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{$brand->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="form-delete" method="post">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('js')
    <script>
        $('.btDelete').click(function (ev) {
            //ko load lại page
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);
            if (confirm('Bạn có muốn xóa thương hiệu này không?')) {
                $('form#form-delete').submit();
            }

        });
    </script>

@endsection
