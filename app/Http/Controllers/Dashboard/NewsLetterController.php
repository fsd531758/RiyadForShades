<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsLetterController extends Controller
{
    private $news_letter;

    public function __construct(NewsLetter $news_letter)
    {
        $this->middleware(['permission:read-news_letters'])->only('index', 'show');
        $this->middleware(['permission:create-news_letters'])->only('create', 'store');
        $this->middleware(['permission:update-news_letters'])->only('edit', 'update');
        $this->middleware(['permission:delete-news_letters'])->only('destroy');
        $this->news_letter = $news_letter;
    }

    public function index()
    {
        try {
            $news_letters = $this->news_letter->latest('id')->get();
            return view('admin.news_letters.index', compact('news_letters'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.news_letters.create');
    }


    public function store(Request $request)
    {
        try {
            $requested_data = $request->except(['_token']);
            $this->news_letter->create($requested_data);

            return redirect()->route('news-letters.index')->with(['success' => __('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(NewsLetter $newsLetter)
    {
        return view('admin.news_letters.show', compact('newsLetter'));
    }

    public function edit(NewsLetter $newsLetter)
    {
        return view('admin.news_letters.edit', compact('newsLetter'));
    }

    public function update(Request $request, NewsLetter $newsLetter)
    {
        try {
            $requested_data = $request->except(['_token']);
            $requested_data['updated_at'] = Carbon::now();
            $newsLetter->update($requested_data);
            return redirect()->route('news-letters.index')->with(['success' => __('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function destroy(NewsLetter $newsLetter)
    {
        try {
            $newsLetter->delete();
            return redirect()->route('news-letters.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.deleted_successfully')]);
        }
    }
}
