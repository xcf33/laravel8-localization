<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Static page router
     */
    public function page($locale, $page) {
        // Views directory are structured with locales as sub directories
        $default_dir = 'pages.' . config('locale.default_locale'); // default locale
        if (in_array($locale, config('locale.locales'))) {
            $view_dir = 'pages.' . $locale;
        }
        // Return the default language page when there's no corresponding view found
        try {
            return view($view_dir . '.' . $page);
        } catch(\InvalidArgumentException $e) {
            return view($default_dir . '.' . $page);
        }
    }
}
