<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        
        $this->middleware('auth')->except('show','index');
     }

    public function index()
    {
        //
        $articles = Article::orderBy('id','DESC')->paginate(12);
        $categories = Category::orderBy('title','ASC')->get();

        return view('articles.index',compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::pluck('title','id');

        return view('articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'min:5|max:120|required',
            'content'=>'min:30|required',
            'image'=>'required|mimes:png,jpg,jpeg|max:5048',
            'categories'=>'required'
        ]);
        
        $title = htmlspecialchars(strip_tags($request->title));
        $content = htmlspecialchars($request->content);
        // $user = Auth::user();

            #تحسين الكود وتبسيطه
            $categories = array_values($request->categories);
            $slug = Str::slug($request->title , '-');
            $newImageName =  uniqid().'-'. $slug . '.'.$request->image->extension();
            $directory = 'uploads';
            $request->image->move(base_path($directory),$newImageName);

           
            $article = auth()->user()->articles()->create([
                'user_id' => auth()->user()->id,
                'slug' => $slug,
                'title' => $title,
                'content' => $content,
                'image_path' => $directory.'/'.$newImageName
            ] );

            $article->categories()->attach($categories);

        return redirect()->to('/my-articles')->with(['message' => 'The article has been created ' ]);
    }


    public function show($slug)
    {
        //
      $article = new Article;
     
      $article = $article->where('slug',$slug)->first();
  
        return view('articles.show',compact('article'));
    }


    public function edit($slug)
    {
        //
        $article = new Article;
        $article = $article->where('slug',$slug)->first();

        if(Auth::id() != $article->user_id){
            return abort(401);
        }

        $categories = Category::pluck('title','id');
        $articleCategories = $article->categories()->pluck('id')->toArray();
   
        return view('articles.edit',compact('categories','article','articleCategories'));
    }


    public function update(Request $request, Article $article)
    {
        if(Auth::id() != $article->user_id){
            return abort(401);
        }
        $request->validate([
            'title'=>'min:5|max:120|required',
            'content'=>'min:30|required',
            'image'=>'mimes:png,jpg,jpeg|max:5048',
            'categories'=>'required'
        ]);

        $slug = Str::slug($request->title, '-');
        $image_path = $article->image_path; // Default to the existing image path
    
        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
            $directory = 'uploads';
            $request->image->move(base_path($directory), $newImageName);
    
            $image_path = $directory . '/' . $newImageName;
    
            // Check if the new image path is different from the existing one
            if ($article->image_path !== $image_path) {
                // Delete the old image if it's different
                if (file_exists(public_path($article->image_path))) {
                    unlink(public_path($article->image_path));
                }
            }
        }
       
        $title = htmlspecialchars(strip_tags($request->title));
        $content = htmlspecialchars($request->content);

        $article->update([
                'slug' => $slug,
                'title' => $title ,
                'content' => $content,
                'image_path' => $image_path 
        ]);
        $article->categories()->sync($request->categories);
        
        return redirect()->to('articles/'.$article->slug);
    }


    public function destroy(Article $article)
    {
        //
        if(Auth::id() != $article->user_id){
            return abort(401);
        }
            $article->delete();

            return redirect()->back();

    }
}