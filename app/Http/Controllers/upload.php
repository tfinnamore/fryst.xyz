<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Input;
use App\Files;

class upload extends Controller
{

  public function formatFileSize($size)
  {
    $units = array(' B', ' KB', ' MB', ' GB', ' TB');
    for ($i = 0; $size > 1024; $i++) { $size /= 1024; }
    return round($size, 2).$units[$i];
  }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $destination = env('FILE_STORE_PATH');
        $filename = str_random(3) . ' - ' . Input::file('file')->getClientOriginalName();
        $token = str_random(8);
        $filesize = $this->formatFileSize(Input::file('file')->getSize());
        $file = Input::file('file')->move($destination,$filename);
        \Log::info(Input::file());
        Files::create([
          'filename' => $filename,
          'owner' => $request->user()->username,
          'token' => $token
        ]);
        Mail::send('upload.notify', ['filename' => $filename, 'user' => $request->user()->name, 'token' => $token, 'filesize' => $filesize], function ($m) {
          $m->from('DoNotReply@fryst.xyz', 'Fryst.xyz');
          $m->to('tfinnamore@gmail.com', 'Tim');
          $m->subject('A New File Has Been Uploaded');
        });

        return \Response::json('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
