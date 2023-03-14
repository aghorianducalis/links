<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\Category;
use App\Models\Link;
use App\Services\BookmarkParserService;
use App\Services\NetscapeBookmarkParser;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
    {
        $categories = Category::query()->get();

        return view('welcome', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookmarkParserService $parserService)
    {
        /** @var \Illuminate\Database\Eloquent\Collection $categories */
        $categories = Category::query()->with(['parent', 'children'])->get();

        return view('tree', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLinkRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLinkRequest $request)
    {
        /** @var Link $link */
        $link = Link::create($request->validated());
        $link->categories()->sync([$request->category_id]);

        return back()->withInput()->with('status', 'Link created!');
//        return to_route('route.name', ['id' => $link->id]);
//        return redirect()->route('route.name', [$link])->with('status', 'Link created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLinkRequest  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
