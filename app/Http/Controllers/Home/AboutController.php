<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
    }

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(526, 605)->save('upload/home_about/' . $name_gen);
            $save_url = 'upload/home_about/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'about_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'description' => $request->description,
                'short_description' => $request->short_description,

            ]);

            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}