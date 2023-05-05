<?php

namespace App\Http\Controllers;

use App\Mail\LaravelEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        Mail::to("testing@example.com")->send(new LaravelEmail());
        return "Email telah dikirim";
    }
}
