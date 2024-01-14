<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\ContactInfoResource;
use App\Http\Resources\CounterResource;
use App\Http\Resources\HeroResource;
use App\Http\Resources\PersonalInfoAboutResource;
use App\Http\Resources\PortfolioResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\SocialIconResource;
use App\Http\Resources\TestimonialResource;
use App\Models\About;
use App\Models\Counter;
use App\Models\Hero;
use App\Models\PersonalInfo;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialIcon;
use App\Models\Testimonial;
use App\Models\User;

class FrontendController extends Controller
{
    public function main($user_name)
    {

        $user = User::where('user_name', $user_name)->first();

        $data = [];

        // Hero area data
        $data['hero'] = Hero::where('user_id', $user->id)->first();

        // return $data;

        //About area data
        $data['about'] = About::where('user_id', $user->id)->first();

        // Personal Information area
        $data['personal_info'] = PersonalInfo::where('user_id', $user->id)->first();

        // Skill area
        $data['skills'] = Skill::where('user_id', $user->id)->orderBy('id', 'ASC')->get();

        // Service area
        $data['services'] = Service::where('user_id', $user->id)->where('status', 1)->take(6)->get();

        //Achievement area
        $data['achievement_counter'] = Counter::where('user_id', $user->id)->take(4)->get();

        // Portfolio area
        $data['portfolios'] = Portfolio::where('user_id', $user->id)->where('status', 1)->take(6)->get();

        // Testimonial
        $data['testimonials'] = Testimonial::where('user_id', $user->id)->orderBy('id', 'DESC')->take(4)->get();

        //social media
        $data['social_media'] = SocialIcon::where('user_id', $user->id)->get();

        $data['user_id']= User::where('user_name', $user_name)->first();

        // return json_encode($data);

        return view('frontend.index')->with($data);
    }

    public function api($user_name)
    {

        $user = User::where('user_name', $user_name)->first();

        $data = [];

        // Hero area data
        $hero = Hero::where('user_id', $user->id)->first();

        $data['hero'] = new HeroResource($hero);

        return $data;

        //About area data
        $about = About::where('user_id', $user->id)->first();

        $data['about'] = new AboutResource($about);

        // Personal Information area
        $personal_info_about = PersonalInfo::where('user_id', $user->id)->first();

        $data['personal_info_about'] = new PersonalInfoAboutResource($personal_info_about);

        // Skill area
        $skills = Skill::orderBy('id', 'DESC')->get();

        $data['skills'] = SkillResource::collection($skills);

        // Service area
        $services = Service::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();

        $data['services'] = ServiceResource::collection($services);

        //Achievement area
        $achievement_counter = Counter::orderBy('id', 'DESC')->take(4)->get();

        $data['$achievement_counter'] = CounterResource::collection($achievement_counter);

        // Portfolio area
        $portfolios = Portfolio::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();

        $data['portfolios'] = PortfolioResource::collection($portfolios);

        // Testimonial
        $testimonials = Testimonial::orderBy('id', 'DESC')->take(4)->get();

        $data['testimonials'] = TestimonialResource::collection($testimonials);

        //contact information area
        $contact_info = PersonalInfo::where('id', 1)->limit(1)->get();

        $data['contact_info'] = ContactInfoResource::collection($contact_info);

        //social media
        $social_media = SocialIcon::all();

        $data['social_media'] = SocialIconResource::collection($social_media);

        return json_encode($data);
    }

}
