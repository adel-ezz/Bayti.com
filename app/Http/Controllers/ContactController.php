<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        $messages=ContactUs::all();
        return view('admin.contact.index',compact('messages'));
    }
    //
    public function store(ContactRequest $request , ContactUs $contactUs )
    {
        $contactUs->create($request->all());
        return Redirect::back()->withFlashMessage('تم إرسال رسالتك بنجاح');

    }

    public function edit($id,ContactUs $contactUs)
    {
        $contact=$contactUs->find($id);
        $contact->view=1;
        $contact->save();
        return view('admin.contact.edite',compact('contact'));

    }

    public function update($id,Request $request)
    {
        $contact=ContactUs::find($id);
        $contact->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم التعديل');
    }

    public function destroy($id , ContactUs $contact)
    {
        $contact->find($id)->delete();
        return redirect('/adminbannel/contact')->withFlashMessage('deleted');
    }
}
