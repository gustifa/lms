<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class CategoryController extends Controller
{

    public function AllCategory(){
        $dataCategory = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('dataCategory'));
    } //End Method

    public function AddCategory(){
        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request){
        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $image_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);
            $img->toPng()->save(base_path('public/upload/category/'.$image_gen));
            $save_url = 'upload/category/'.$image_gen;


            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
                'image' => $save_url,
            ]);


            $notification = array(
                'message' => 'Catgeory Inserted Successfully',
                'alert-type' => 'success',


            );


            return redirect()->route('all.category')->with($notification);
         }
    }

    public function EditCategory($id){
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));

    }


    public function UpdateCategory(Request $request){
        $cat_id = $request->id;
        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $image_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);
            $img->toPng()->save(base_path('public/upload/category/'.$image_gen));
            $save_url = 'upload/category/'.$image_gen;


            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
                'image' => $save_url,
            ]);


            $notification = array(
                'message' => 'Category Update Successfully',
                'alert-type' => 'success',

            );


            return redirect()->route('all.category')->with($notification);

        }else{
            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            ]);


            $notification = array(
                'message' => 'Category Update Successfully',
                'alert-type' => 'success',

            );


            return redirect()->route('all.category')->with($notification);
        }


    }

    public function DeleteCategory($id){


    }


    // Sub Category
    public function AllSubCategory(){
        $dataSubCategory = SubCategory::latest()->get();
        return view('admin.backend.subcategory.all_subcategory', compact('dataSubCategory'));
    } //End Method

    public function AddSubCategory(){
        $dataCategory = Category::latest()->get();
        return view('admin.backend.subcategory.add_subcategory', compact('dataCategory'));
    }

    public function EditSubCategory($id){
        $category = Category::find($id);
        return view('admin.backend.subcategory.edit_subcategory', compact('category'));

    }


}
