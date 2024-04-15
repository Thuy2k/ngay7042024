<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductDetail;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\ImageProduct;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Page;

class InforWebController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    public function index(Request $request, $id)
    {
        $page = Page::find($id);
        $data = [
            'page' => $page,
            'isInfoWeb' => $id
        ];
        if (!empty($page)) {
            return view('admin.info_web.index', $data);
        }
        return redirect()->route('admin.product.index')->with('error', 'Không tìm thấy page');
    }
    public function update(Request $request, $id)
    {
        $rule = [
            'name' => 'required',
            'description_2' => 'required',
        ];
        $messages = [
            'name.required' => 'Nhập tên trang',
        ];
        $validator = Validator::make($request->all(), $rule, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $page = Page::find($id);
        if (!empty($page)) {
            $page->title = $request->name;
            $page->content = $request->description_2;
            $page->save();
            return redirect()->back()->with('success', 'Cập nhật trang thành công');
        }
        return redirect()->back()->with('error', 'Không tìm thấy trang cần sửa');
    }
}
