<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        return view('notebook/index')->with(['notebooks' => Notebook::all()]);
    }
}
