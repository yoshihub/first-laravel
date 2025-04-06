<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();

        $category = Category::find($inputs['category_id']);
        $category_name = $category ? $category->content : '';

        return view('confirm', compact('inputs', 'category_name'));
    }

    public function thanks(Request $request)
    {
        $data = $request->except(['_token']);

        $data['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        unset($data['tel1'], $data['tel2'], $data['tel3']);

        Contact::create($data);

        return view('thanks');
    }
}
