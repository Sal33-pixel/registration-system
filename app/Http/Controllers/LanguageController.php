<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage($locale)
    {
        if (! in_array($locale, [1, 2])) {
            abort(400);
        }

        $locale = ($locale == 1)? 'en':'hu';

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
