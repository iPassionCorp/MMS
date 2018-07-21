<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use DB;
use \Carbon\Carbon;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $pages = DB::table('pages')->where('published', '=', 1)->orderBy('seq', 'asc')->get();
        return view('welcome', compact('pages'));
    }

    public function index()
    {
        $pages = DB::table('pages')->orderBy('seq', 'asc')->get();
        return view('home', compact('pages'));
    }

    public function create()
    {
        return view('create_page');
    }

    public function store(Request $req)
    {
        $data = $req->all();

        $validator = Validator::make($data, [
            'seq' => 'required|unique:pages'
        ]);

        $minutes = $data['minutes'] * 60000;
        $seconds = $data['seconds'] * 1000;
        $duration = $minutes + $seconds;
        
        $page = new Page();
        $page->seq = $data['seq'];
        $page->name = $data['name'];
        $page->url = $data['url'];
        $page->published = $data['published'];
        $page->minutes = $data['minutes'];
        $page->seconds = $data['seconds'];
        $page->duration = $duration;

        if($validator->fails()){
            return redirect('create')->with('error','Seq No. Existing');
        }else{
            $page->save();
            return redirect('home');
        }
    }

    public function edit($id)
    {
    	$page = Page::find($id);
    	return view('edit_page',compact('page'));
    }

    public function update(Request $req)
    {
        $data = $req->all();

        $page = Page::find($data['id']);

        $validator = Validator::make($data, [
            'seq' => 'required|unique:pages,seq,'.$page->id
        ]);

        $minutes = $data['minutes'] * 60000;
        $seconds = $data['seconds'] * 1000;
        $duration = $minutes + $seconds;

        $page->seq = $data['seq'];
        $page->name = $data['name'];
        $page->url = $data['url'];
        $page->published = $data['published'];
        $page->minutes = $data['minutes'];
        $page->seconds = $data['seconds'];
        $page->duration = $duration;
        
        if($validator->fails()){
            return redirect()->back()->with('error','Seq No. Existing');
        }else{
            $page->save();
            return redirect('home');
        }
    }

    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
        if ($page) {
            return response()->json(['success'=>'Successfully.']);
        }
    }
}
