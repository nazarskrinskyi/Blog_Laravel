<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class ContactsController extends Controller
{
    public function __invoke(): View
    {

        return view('contacts');
    }


}
