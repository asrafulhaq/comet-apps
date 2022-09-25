<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    
    /**
     * Show Home Page 
     */
    public function showHomePage()
    {
        $sliders = Slider::where('status', true ) -> latest() -> get();
        return view('frontend.pages.home', [
            'sliders'       => $sliders
        ]);
    }

    /**
     * Show Home Page 
     */
    public function showContactPage()
    {
        
        return view('frontend.pages.contact');
    }

    /**
     * Show single portfolio 
     */
    public function showSinglePortfolioPage($slug)
    {

        $portfolio = Portfolio::where('slug', $slug) -> first();
        return view('frontend.pages.portfolio', [
            'portfolio'    => $portfolio
        ]);
   
    }

    /**
     * Show Blog Page
     */
    public function showBlogPage()
    {
        $posts = Post::latest() -> get();
        return view('frontend.pages.blog', [
            'posts'    => $posts
        ]);
    }

    

}
