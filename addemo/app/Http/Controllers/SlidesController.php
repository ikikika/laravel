<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use \Redirect, \Session;
use App\Slides;

class SlidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slides::all();
        return view('slides.index', compact("slides"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('slides.create');
    }

    public function upload_image(Request $request)
    {

      $request->validate([
        'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]);



      //get filename with extension
      $filenamewithextension = $request->file('image_file')->getClientOriginalName();

      //get filename without extension
      $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

      //get file extension
      $extension = $request->file('image_file')->getClientOriginalExtension();

      //folder and filename to store
    //   $aws_url = "s3.ap-southeast-1.amazonaws.com/slides-img/";
      $filenametostore = "images/".$filename.'_'.time().'.'.$extension;

      //Upload File to s3
      Storage::disk('s3')->put($filenametostore, fopen($request->file('image_file'), 'r+'), 'public');

      //Store $filenametostore in the database
      $url = Storage::disk('s3')->url($filenametostore);

      try {

            DB::transaction(function () use ($request, $url) {
                 $slide = new Slides;
                 $slide->slide_url = $url;
                 $slide->save();
            });
               Session::flash('message', 'Slide added');
        } catch (\Illuminate\Database\QueryException $e) {
               Session::flash('errmsg', trans('sql error') );
        } catch (\Exception $e) {
            Session::flash('errmsg', trans('system error') );
        }

      return redirect('slides');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {

              $slide = Slides::find($id)->delete();

            });
            Session::flash('message', 'Slide deleted.');
          } catch (\Illuminate\Database\QueryException $e) {
            // dd($e);
            Session::flash('errmsg', trans('sql error') );
          } catch (\Exception $e) {
            Session::flash('errmsg', trans('system error') );
          }

          return back();
    }
}
