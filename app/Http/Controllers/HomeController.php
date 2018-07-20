<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use DB;
use \Carbon\Carbon;

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
        $now   = Carbon::now('Asia/Bangkok');
        $time  = $now->format('H:i');
        $pages = DB::table('pages')->where('start_time', '<=', $time)->where('end_time', '>=', $time)->orderBy('seq', 'asc')->limit(1)->get();
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
        
        $page = new Page();
        $page->seq = $data['seq'];
        $page->name = $data['name'];
        $page->url = $data['url'];
        $page->published = $data['published'];
        $page->start_time = $data['start_time'];
        $page->end_time = $data['end_time'];
        
        $page->save();
        if($page){
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
        $page->seq = $data['seq'];
        $page->name = $data['name'];
        $page->url = $data['url'];
        $page->published = $data['published'];
        $page->start_time = $data['start_time'];
        $page->end_time = $data['end_time'];
        
        $page->save();
        if($page){
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
