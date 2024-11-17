<?php

namespace App\Http\Controllers;

use App\Mail\NewsEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class MailController extends Controller
{
    public function viewAllUsers()
    {
        $userCount = User::whereHas('roles', function (Builder $query) {
            $query->where('role_name', 'user');
        })->get()->count();
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('role_name', 'user');
        })->get();
        return view('admin.users', compact('users', 'userCount'));
    }

    public function emailForm()
    {
        return view('emails.news_form');
    }

    public function confirmNewsEmail(Request $request)
    {
        $subject = $request->subject;
        $content = $request->content;

        return view('emails.news_form_confirm', compact('subject', 'content'));
    }

    public function sendNewsEmail(Request $request)
    {
        $subject = $request->subject;
        $content = $request->content;

        if ($request->input('back') == 'back') {
            return redirect()->route('admin.email.form')->withInput();
        } else {

            $users = User::whereHas('roles', function (Builder $query) {
                $query->where('role_name', 'user');
            })->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NewsEmail($subject, $content));
            }

            return redirect()->route('admin.get.users');
        }
    }
}
