<?php

namespace App\Http\Controllers;

use App\Models\GlobalSeoSetting;

class RobotsController extends Controller
{
    public function index()
    {
        $robots = GlobalSeoSetting::first()?->robots_txt
            ?? "User-agent: *\nAllow: /\nSitemap: ".url('/admin/sitemap.xml');

        return response($robots, 200)->header('Content-Type', 'text/plain');
    }
}
