<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages =  Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePageRequest $request)
    {
        Page::create($request->validated() + ['slug' => $this->prepareSlug($request->name)]);
        return to_route('admin.pages.index');
    }

    private function prepareSlug(string $str) {
        return Str::slug($str);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated() + ['slug' => $this->prepareSlug($request->name)]);
        return to_route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return to_route('admin.pages.index');
    }
}
