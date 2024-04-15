<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InforContact;
use App\Models\Category;
use App\Models\PostCate;
use App\Models\Page;

class InforWebController extends Controller
{
    public function index(Request $request, $id)
    {
        $categories = Category::whereNull('deleted_at')->get();
        $category_post = PostCate::where('status', 1)->get();
        $infor_contact = InforContact::all();
        $title = 'Thông tin của shop';
        $page = Page::find($id);
        if (!empty($page)) {
            return view('user.info_web.index', compact('title', 'infor_contact', 'categories', 'category_post', 'page'));
        }
        return redirect()->back()->with('error', 'Không tìm thấy trang hiện tại');
    }
}
