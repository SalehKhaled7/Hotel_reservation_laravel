<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $faqList=Faq::all();
        $setting=Setting::first();
        $data=[
            'faqList'=>$faqList,
            'setting'=>$setting,
        ];

        //print_r($dataList);
        //exit();
        return view('admin.faqs.faqs',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.faq_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data= new Faq;
        $data->question =$request->input('question');
        $data->answer = $request->input('answer');
        $data->position = $request->input('position');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_faqs')->with('success','question added successfully ..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Faq $faq,$id)
    {
        $faq = Faq::find($id);
        return view('admin.faqs.faq_edit',['faq'=>$faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Faq $faq,$id)
    {
        $data=Faq::find($id);
        $data->question =$request->input('question');
        $data->answer = $request->input('answer');
        $data->position = $request->input('position');
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_faqs')->with('success','question updated successfully ..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Faq $faq,$id)
    {
        $data = Faq::find($id);
        $data->delete();
        return back()->with('info','question deleted successfully . ');
    }
}
