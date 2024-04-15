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
use App\Models\ConfigSub;

class ConfigSubController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    public function index(Request $request)
    {
        $rows = ConfigSub::all();
        $data = [
            'isConfigSub' => 1,
            'rows' => $rows
        ];
        return view('admin.config_sub.index', $data);
    }
    public function edit(Request $request, $id)
    {
        $row = ConfigSub::find($id);
        $data = [
            'row' => $row,
            'isConfigSub' => 1
        ];
        if (!empty($row)) {
            return view('admin.config_sub.edit', $data);
        }
        return redirect()->back()->with('error', 'Không tìm thấy trang cần sửa');
    }
    public function update(Request $request, $id)
    {
        $rule = [
            'value_db' => 'required',
        ];
        $messages = [
            'value_db.required' => 'Không được để trống',
        ];
        $validator = Validator::make($request->all(), $rule, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $row = ConfigSub::find($id);
        if (!empty($row)) {
            $row->value_db = $request->value_db;
            $row->save();
            return redirect()->back()->with('success', 'Cập nhật cấu hình thành công');
        }
        return redirect()->back()->with('error', 'Không tìm thấy cấu hình cần sửa');
    }
}
