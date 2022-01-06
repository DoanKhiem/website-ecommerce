<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandAddRequest;
use App\Http\Requests\BrandEditRequest;
use App\Models\admin\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::orderBy('created_at','DESC')->search()->paginate(2);
        return view('admin.list-brand', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandAddRequest $request)
    {
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
            $request->merge(['logo'=>$file_name]);
        }
        else{
            $file_name='';
        }

        $brand = Brand::create($request->all());
        if ($brand){
            return redirect()->route('brand.index')->with('success',"Thêm thương hiệu $brand->name thành công");
        }else{
            return redirect()->route('brand.index')->with('success',"Thêm thương hiệu $brand->name thất bại");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.edit-brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandEditRequest $request, $id)
    {
        $brand = Brand::find($id);

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
            $request->merge(['logo'=>$file_name]);

        }
        $brand->update($request->all());
        if ($brand){
            return redirect()->route('brand.index')->with('success',"Sửa thành công thương hiệu $brand->name");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if ($brand->numberOfProducts->count() > 0){
            return redirect()->route('brand.index')->with('errors',"Không thể xóa thương hiệu này $brand->name");
        } else{
            $brand->delete();
            return redirect()->route('brand.index')->with('success',"Xóa thương hiệu $brand->name thành công");
        }


//        return redirect()->back();
    }
}
