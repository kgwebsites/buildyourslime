<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AdminControllers extends Controller
{
  public function dashboard()
  {
    $orders = DB::table('slime_orders')->orderBy('date', 'desc')->paginate(15);
    return view('admin.dashboard', ['orders' => $orders]);
  }

  public function lab()
  {
    $premades = DB::table('premades')->get();
    $addins = DB::table('addins')->get();
    $colors = DB::table('colors')->get();
    $glitters = DB::table('glitters')->get();
    $sizes = DB::table('sizes')->get();
    return view('admin.lab', ['premades' => $premades, 'addins' => $addins, 'colors' => $colors, 'glitters' => $glitters, 'sizes' =>$sizes]);
  }

  public function updatePremade(Request $request)
  {
    if ($request->has('premade_id')):
      $premade_id = $request->input('premade_id');
    endif;
    /*if ($request->has('premade_image')):
      $premade_image = $request->input('premade_image');
    endif;*/
    if ($request->has('premade_name')):
      $premade_name = $request->input('premade_name');
    endif;
    if ($request->has('premade_description')):
      $premade_description = $request->input('premade_description');
    endif;
    if ($request->has('premade_slug')):
      $premade_slug = $request->input('premade_slug');
    endif;

    DB::table('premades')->where('id', $premade_id)->update(['slug' => $premade_slug, 'name' => $premade_name, /*'image' => $premade_image,*/ 'description' => $premade_description]);

    return redirect('/admin/lab');
  }
}
?>
