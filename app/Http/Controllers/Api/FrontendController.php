<?php

namespace App\Http\Controllers\Api;

use App\Models\Hero;
use App\Models\About;
use App\Models\Skill;
use App\Models\Counter;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HeroResource;
use App\Http\Resources\AboutResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\CounterResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\PortfolioResource;
use App\Http\Resources\ContactInfoResource;
use App\Http\Resources\TestimonialResource;
use App\Http\Resources\PersonalInfoAboutResource;
use App\Http\Resources\SocialIconResource;
use App\Models\SocialIcon;

class FrontendController extends Controller
{
    public function api()
    {
        $data=[];

        $hero= Hero::where('id',1)->limit(1)->get();

        $data['hero']= HeroResource::collection($hero);

        $about = About::where('id',1)->limit(1)->get();

        $data['about']= AboutResource::collection($about);

        $personal_info_about = PersonalInfo::where('id',1)->limit(1)->get();

        $data['personal_info_about'] = PersonalInfoAboutResource::collection($personal_info_about);

        $skills = Skill::orderBy('id', 'DESC')->get();

        $data['skills']= SkillResource::collection($skills);

        $services = Service::where('status',1)->orderBy('id','DESC')->take(6)->get();

        $data['services']= ServiceResource::collection($services);

        $achievement_counter= Counter::orderBy('id','DESC')->take(4)->get();

        $data['$achievement_counter'] = CounterResource::collection($achievement_counter);

        $portfolios = Portfolio::where('status',1)->orderBy('id','DESC')->take(6)->get();

        $data['portfolios'] = PortfolioResource::collection($portfolios);

        $testimonials = Testimonial::orderBy('id','DESC')->take(4)->get();

        $data['testimonials'] = TestimonialResource::collection($testimonials);

        $contact_info = PersonalInfo::where('id',1)->limit(1)->get();

        $data['contact_info'] = ContactInfoResource::collection($contact_info);

        $social_media = SocialIcon::all();

        $data['social_media']= SocialIconResource::collection($social_media);

        return json_encode($data);
    }

}
