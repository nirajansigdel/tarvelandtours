<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\WorkCategory;
use App\Models\Country;
use App\Models\Service;
use App\Models\Category;
use App\Models\CoverImage;
use App\Models\Company;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\DirectorMessage;
use App\Models\BlogPostsCategory;
use App\Models\ClientMessage;

use App\Models\WhyUs;
use App\Models\Product;
use App\Models\Event;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function render_about()
    {
       $about = About::first();
        $teams = Team::all();
        $posts = Post::with('category')->latest()->take(3)->get();
        $listservices = Service::latest()->take(5)->get();
        $dir = DirectorMessage::all();
        $siteSetting = SiteSetting::first();
        $faqs = Faq::latest()->get();

        return view('frontend.aboutus', compact('about', 'posts','faqs', 'listservices', 'dir', 'siteSetting', 'teams'));
    }

    public function render_team(Request $request)
    {
        $teams = Team::all();
        $page_title = 'Our Team';
        $services = Service::latest()->take(6)->get();
        $sitesetting = SiteSetting::first();
        $categories = Category::latest()->take(10)->get();
        $about = About::first();
        $posts = Post::with('category')->latest()->take(3)->get();

        return view('frontend.team', compact('teams', 'sitesetting', 'categories', 'about', 'page_title', 'services', 'posts'));
    }

    public function render_service()
    {
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $serviceHead = Service::latest()->take(1)->get();

        return view('frontend.services', compact('images', 'services', 'categories', 'sitesetting', 'about', 'serviceHead'));
    }

    public function render_whyus()
    {
        $clientMessages = ClientMessage::latest()->get();
        $whyUsItems = WhyUs::latest()->take(12)->get();
        $whyUsData = WhyUs::latest()->get();

        return view('frontend.whyus', compact('whyUsItems', 'clientMessages', 'whyUsData'));
    }

    public function render_testimonial()
    {
        $clientMessages = ClientMessage::latest()->get();
        $testimonials = Testimonial::latest()->take(12)->get();
        return view('frontend.testimonials', compact('testimonials', 'clientMessages'));
    }

    /**
     * ✅ Corrected render_faqs method
     */
    public function render_faqs()
    {
        $faqs = Faq::where('type', 'procurement')->latest()->get();

        return view('frontend.procurement', compact('faqs'));
    }

    public function render_blogpostcategory()
    {
        $blogpostcategories = BlogPostsCategory::all();

        return view('frontend.blogpostcategories', compact('blogpostcategories'));
    }

    public function render_singleBlogpostcategory($slug)
    {
        $blogpostcategory = BlogPostsCategory::where('slug', $slug)->firstOrFail();
        $listblogs = BlogPostsCategory::where('slug', '!=', $slug)->latest()->get()->take(5);
        return view('frontend.blogpostcategory', compact('blogpostcategory', 'listblogs'));
    }

    public function render_singleService($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();
        $listservices = Service::where('slug', '!=', $slug)->get();

        return view('frontend.service', compact('service', 'images', 'services', 'categories', 'sitesetting', 'about', 'listservices'));
    }

    public function render_Countries()
    {
        $countries = Country::all();
        return view('frontend.countries', compact('countries'));
    }

    public function render_singleCountry($slug)
    {
        $country = Country::where('slug', $slug)->firstOrFail();
        $recommendedCountries = Country::where('slug', '!=', $slug)->get();

        return view('frontend.single', compact('country', 'recommendedCountries'));
    }

    public function render_singleCompany($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();
        return view('frontend.company', compact('company'));
    }

    public function render_singleworkCategory($slug)
    {
        $work_category = WorkCategory::where('slug', $slug)->firstOrFail();
        $listwork_category = WorkCategory::latest()->take(4)->get();

        return view('frontend.work_category', compact('work_category', 'listwork_category'));
    }

    public function render_singleCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $relatedCategories = Category::where('id', '!=', $category->id)->get();
        $posts = $category->posts()->paginate(10);

        return view('frontend.category', compact('category', 'relatedCategories', 'posts'));
    }

    public function render_singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $category = $post->category;
        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->get();

        return view('frontend.post', compact('post', 'relatedPosts'));
    }

    public function render_gallery()
    {
        $images = PhotoGallery::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $videos = VideoGallery::latest()->get();

        $videos = $videos->map(function ($video) {
            $video->embed_url = 'https://www.youtube.com/embed/' . $video->url;
            return $video;
        });

        $about = About::first();

        return view('frontend.galleries', compact('images', 'videos', 'services', 'categories', 'sitesetting', 'about'));
    }

    public function render_singleImage($slug)
    {
        $image = PhotoGallery::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('frontend.singleImage', compact('image', 'services', 'categories', 'sitesetting', 'about'));
    }

    public function render_events(Request $request)
    {
        $query = Event::active()->latest();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('heading', 'like', "%{$searchTerm}%")
                    ->orWhere('subtitle', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('month')) {
            $query->whereMonth('created_at', $request->month);
        }

        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        $events = $query->paginate(9);
        $sitesetting = SiteSetting::first();

        $availableYears = Event::active()
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');

        $availableMonths = Event::active()
            ->selectRaw('MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('month');

        return view('frontend.event', compact('events', 'sitesetting', 'availableYears', 'availableMonths'));
    }

    public function render_singleEvent($slug)
    {
        $event = Event::where('slug', $slug)->active()->firstOrFail();
        $sitesetting = SiteSetting::first();

        $relatedEvents = Event::active()
            ->where('id', '!=', $event->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.singleevents', compact('event', 'sitesetting', 'relatedEvents'));
    }

    public function teams()
    {
        $teams = Team::latest()->get();
        $categories = Category::all();
        $services = Service::latest()->get();
        $sitesetting = SiteSetting::first();
        $about = About::first();

        return view('portal.team', compact('teams', 'services', 'categories', 'sitesetting', 'about'));
    }

    public function render_contact()
    {
        $page_title = 'Contact Us';
        $googleMapsLink = SiteSetting::first()->google_maps_link;

        return view('frontend.contactpage', compact('page_title', 'googleMapsLink'));
    }



    public function render_products()
    {
        $type = request()->query('type');
        
        if ($type) {
            // Filter products by the selected category type
            $products = Product::where('status', true)
                ->whereJsonContains('product_types', $type)
                ->latest()
                ->paginate(12);
        } else {
            // Show all products if no type is specified
            $products = Product::where('status', true)->latest()->paginate(12);
        }
        
        return view('frontend.product', compact('products', 'type'));
    }

    public function render_singleProduct($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $id)->latest()->take(5)->get();
        return view('frontend.layouts.productblade', compact('product', 'relatedProducts'));
    }
    

    public function showApplicationForm($id)
    {
        $product = Product::findOrFail($id);

        return view('frontend.apply', compact('product'));
    }




    public function indexproject(){
        $products = Product::latest()->get();
        return view('frontend.includes.indexproject', compact('products'));
    }



 public function render_career()
    {
        $careers = \App\Models\Career::where('status', true)->latest()->get();

        return view('frontend.career', compact('careers'));
    }
     public function render_volunteer()
    {
        $faqs = Faq::where('type', 'procurement')->latest()->get();

        return view('frontend.volunteer', compact('faqs'));
    }

     public function render_applycareer()
    {
        // Get the first active career for the application form
        $career = \App\Models\Career::where('status', true)->first();

        if (!$career) {
            return redirect()->route('career')->with('error', 'No career opportunities available at the moment.');
        }

        return view('frontend.apply-career', compact('career'));
    }

}
