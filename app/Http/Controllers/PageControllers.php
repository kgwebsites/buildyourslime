<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageControllers extends Controller
{

    public function welcome()
    {
        $premades = DB::table('buildyourslime_premades')->get();

        return view('welcome', ['premades' => $premades]);
    }

    public function order($premade_select = null)
    {
        $premade = DB::table('buildyourslime_premades')->where('slug', $premade_select)->first();

        return view('order', ['premade' => $premade]);
    }

    public function checkout($premade_select = null)
    {
      $premade = DB::table('buildyourslime_premades')->where('slug', $premade_select)->first();
      return view('checkout', ['premade' => $premade]);
    }

    public function build($build_step = 'step-1', $selection = null)
    {
        $colors = DB::table('buildyourslime_colors')->get();
        $glitters = DB::table('buildyourslime_glitters')->get();
        $addins = DB::table('buildyourslime_addins')->get();
        $sizes = DB::table('buildyourslime_sizes')->get();
        return view('build', ['build_step' => $build_step, 'selection' => $selection, 'colors' => $colors, 'glitters' => $glitters, 'addins' => $addins, 'sizes' => $sizes ]);
    }

    public function thankyou()
    {
      return view('thank-you');
    }
}
