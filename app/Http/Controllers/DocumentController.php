<?php

namespace App\Http\Controllers;

use App\Document;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Document as DocumentResources;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
//        $documents =  User::find($id)->documents()->get();

        $documents = User::find($id)->documents()->get();

        return DocumentResources::collection($documents);

//        return view('document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $document = new Document();
        return view('document.create',compact('document'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $document = new Document();
        $id = Auth::id();

        $document->name = request('name');
        $document->body = request('body');
        $document->user_id = $id;


        $document->save();

//        Document::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('document.show' , compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('document.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'body' => 'required',
        ]);

        $document->update($data);

        return redirect('document/' . $document->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect('document');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'body' => 'required',
        ]);
    }

}
