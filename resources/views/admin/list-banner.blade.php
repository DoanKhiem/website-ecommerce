@extends('admin.layouts.master')

@section('main')

    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div style="margin-bottom: 20px; display: flex;
                    justify-content: space-between; flex-direction: row; align-items: flex-end;">
                        <h5 class="card-title" style="">Danh sách banner</h5>
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
                            <th>Tên banner</th>
                            <th>Hình ảnh</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <button class="mb-2 mr-2 btn btn-warning">Sửa</button>
                                <button class="mb-2 mr-2 btn btn-danger">Xóa</button>
                            <!-- <button class="mb-2 mr-2 btn btn-light"><a target="_blank" href="{{ route('user.products') }}">View</a></button> -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
