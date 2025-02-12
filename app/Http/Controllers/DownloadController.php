<?php

namespace App\Http\Controllers;


class DownloadController extends Controller
{
    public function downloadForms($name)
    {
        $headers    = ['Content-Type' => ' text/html; charset=utf-8'];
        $pathToFile = public_path('forms/') . $name;
        return response()->download($pathToFile, $name, $headers);
    }
}
