<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Mail;

class PageController extends Controller
{
    public function getContact(){
//        $fname = "Rubel";
//        $lname = "Sarker";
//        $fullname = $fname." ".$lname;
//        $email = "rubelsarker459@gmail.com";
//        $data = [];
//        $data["full_name"] = $fullname;
//        $data["mail"] = $email;
        return view("pages.contact");
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:5'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,

        );
        Mail::send('emails.contact',$data,function ($message) use($data){
            $message ->from($data['email']);
            $message ->subject($data['subject']);
            $message ->to(['rodelaruhi143@gmail.com']);

        });
    }
    public function getAbout(){
        $fname = "Rubel";
        $lname = "Sarker";
        $fullname = $fname." ".$lname;
        $email = "rubelsarker459@gmail.com";
//        return view("pages/about")->with("full_name",$fullname);
        return view("pages/about")->with("full_name",$fullname)->with("mail",$email);
    }
    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view("pages.welcome")->withPosts($posts);
    }
}
