<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utility; 
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Business;
use App\Models\Businessqr;
use App\Models\CardRequest;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Mail;
use App\Mail\CardRequestMail;
use App\Models\ShippingModel;

class PhysicalController extends Controller
{
    public function index(Request $request){
        $data=$this->getBusin($request);
        return view('physical-cards.main_physical',$data);
    }


    public function view_request_order(Request $request){
        $user = \Auth::user();
        $users = User::find(\Auth::user()->creatorId());
        $data['card_request_deatails'] = CardRequest::where('user_id', '=', $users->id)->get();
        return view('physical-cards.view_orders',$data);
    }


    public function sadmin_view_request_order(Request $request){
        $user = \Auth::user();
        $users = User::find(\Auth::user()->creatorId());
        $data['card_request_deatails'] = CardRequest::get();
        return view('physical-cards.sadmin_view_orders',$data);
    }

    public function getCont(Request $request)
    {
        $template_folder_id=$request->card_design_id;
        $data=$this->getBusin($request);
    
        $htmlContent = view('physical-cards.'.$template_folder_id.'.index')->with($data)->render();
        return response()->json(['html' => $htmlContent]);
    }


    public function getBusin(Request $request){
        $user = \Auth::user();
        $business_id = $user->current_business;
        $business = Business::where('id', $business_id)->first();
        $qr_detail = Businessqr::where('business_id', $business_id)->first();
        $users = User::find(\Auth::user()->creatorId());
            $plan = Plan::find($users->plan);
            if ($plan->storage_limit > 0) {
                $storage_limit = ($users->storage_limit / $plan->storage_limit) * 100;
            } else {
                $storage_limit = 0;
            }
        $businessData = \App\Models\Business::where('id',$users->current_business)->where('created_by', \Auth::user()->creatorId())->first();
        if(!empty($businessData))
        {
            $qr_detail = \App\Models\Businessqr::where('business_id', $businessData->id)->first();
        }

        $SER=env('APP_URL');
        if (isset($business->logo)) {
            $logo_p=$SER."/storage/card_logo/$business->logo";
        } else {
            $logo_p=$SER."/assets/card-images/logo2.png";
        }
        $data = [
            'title' => isset($business->title) ? $business->title : null,
            'designation' => isset($business->designation) ? $business->designation : null,
            'qr_detail' => isset($qr_detail) ? $qr_detail : null,
            'businessData'=>isset($businessData) ? $businessData : null,
            'plan'=>isset($plan) ? $plan : null,
            'user'=>isset($user) ? $user : null,
            'logo_white'=>$logo_p,
            'logo_black'=>$logo_p

        ];
        return $data;
    }

    public function card_request(Request $request)
    {  
        $user = \Auth::user();
        $business_id = $user->current_business;
        $business = Business::where('id', $business_id)->first();
        $qr_detail = Businessqr::where('business_id', $business_id)->first();
        $users = User::find(\Auth::user()->creatorId());
        $plan = Plan::find($users->plan);
        if ($plan->storage_limit > 0) {
            $storage_limit = ($users->storage_limit / $plan->storage_limit) * 100;
        } else {
            $storage_limit = 0;
        }

        $businessData = \App\Models\Business::where('id',$users->current_business)->where('created_by', \Auth::user()->creatorId())->first();
        if(!empty($businessData))
        {
            $qr_detail = \App\Models\Businessqr::where('business_id', $businessData->id)->first();
        }

        $SER=env('APP_URL');
        if($business->logo==''){
            $logo_p=$SER."/assets/card-images/logo2.png";
        }else{
            $logo_p=$SER."/storage/card_logo/$business->logo";
        }

        $contactinfo = ContactInfo::where('business_id', $business->id)->first();
        $contactinfo_content = [];
        if (!empty($contactinfo->content)) {
            $contactinfo_content = json_decode($contactinfo->content);
        }
        $contacts = (array) $contactinfo_content;
        $c_phone='';
        $c_email='';
        $c_web_url='';
        $c_Address = '';

        foreach ($contacts as $item) {
            if (isset($item->Phone)) {
                $c_phone = $item->Phone;
            }
            if (isset($item->Email)) {
                $c_email = $item->Email;
            }
            if (isset($item->Web_url)) {
                $c_web_url = $item->Web_url;
            }
            if (isset($item->Address)) {
                if (isset($item->Address)) {
                $c_Address = $item->Address->Address;
                }
            }
        }

        $cardrequest = new CardRequest();
        $cardrequest->user_id = $request->uid;
        $cardrequest->business_id = $request->bid;
        $cardrequest->card_id = $request->cid;
        $cardrequest->logo_url = $logo_p;
        $cardrequest->qr_code = isset($qr_detail->id) ? $qr_detail->id : null;
        $cardrequest->name = $business->title;
        $cardrequest->designation = $business->designation;
        $cardrequest->phone = $c_phone;
        $cardrequest->email =  $c_email;
        $cardrequest->contact_address = $c_Address;
        $cardrequest->subtitle =  $business->sub_title;
        $cardrequest->website_url = $c_web_url;
        $cardrequest->status = 1;
        // $cardrequest->card_url = 1;
        $cardrequest->ordered_at = date('Y-m-d');
        $already_requested=$this->FindQtyPhyCard();
        //if($plan->qty_physical_card < $already_requested){
        if(1==1){  //condtion will be dynamically after approving Logic we have to add a column in user tables for physcail card
            $cardrequest->save();
            $cardArry = [
                'Business Name' => $business->title,
                'email' => $request->c_email,
                'contact_address' => $request->c_Address,
                'sub_title' => $business->sub_title,
                'message' => $request->message
            ];
            // $c_email="avinash@bastionex.net";
            Mail::to($users->email)->send(new CardRequestMail($cardArry));
            return redirect()->back()->with('success','Physical Card Request Successfully Added.');
        }else{
            return redirect()->back()->with('error', 'Physical Card could not be request |  Please Upgrade your plan');
        }
     }

    public function FindQtyPhyCard()
    {
        $users = User::find(\Auth::user()->creatorId());
        $Tcount=CardRequest::where('user_id', $users->id)->count();
        return $Tcount;
    }


    public function action_popup($p_id)
    {
        $data=array();
        //1-Pending 2-Printed 3-Dispacthed 4-Failed 5-Done
        $data['p_status']=array('Select','Process','Printed','Dispacthed','Failed','Done');
        $data['p_id']=$p_id;
        return view('physical-cards.action_popup',$data);
    }

    public function action_view_card($p_id)
    {
        $rs = CardRequest::where('id', '=', $p_id)->first();
        $SER=env('APP_URL');
        if (isset($rs->logo_url)) {
            $logo_p=$rs->logo_url;
        } else {
            $logo_p=$SER."/assets/card-images/logo2.png";
        }
        $user = \Auth::user();
        $business_id = $user->current_business;
        $business = Business::where('id', $rs->business_id)->first();
        $businessData = \App\Models\Business::where('id',$rs->business_id)->first();
        if(!empty($businessData))
        {
            $qr_detail = \App\Models\Businessqr::where('business_id', $businessData->id)->first();
        }
         $data = [
            'title' => $business->title,
            'designation' =>  $rs->designation,
            'business_id' => $rs->business_id,
            'business' => $rs->business,
            'user_id' => $rs->user_id,
            'card_id' => $rs->card_id,
            'logo_white'=>$logo_p,
            'logo_black'=>$logo_p,
            'qr_detail' => isset($qr_detail) ? $qr_detail : null,
            'businessData'=>isset($businessData) ? $businessData : null,
        ];
        return view('physical-cards.action_view_card',$data);
    }

    public function pstatus_store(Request $request)
    {
        $p_comment=$request->p_comment;
        $p_id=$request->p_id;
        $p_status=$request->p_status;
        \DB::table('card_requests')->where('id', $p_id)->update(['comment' => $p_comment,'status' =>$p_status]);
        return redirect()->back()->with('success', 'Status Change successfully');
    }

    public function add_shipping_address(Request $request){
        // $data=$this->getBusin($request);
        $data=array();
        return view('physical-cards.shipping_address',$data);
    }

    
    public function store_shipping_address(Request $request){
        $ShippingModel = new ShippingModel();
        $ShippingModel->user_id = 2;
        $ShippingModel->fullname = $request->fullname;
        $ShippingModel->mobile1 = $request->mobile1;
        $ShippingModel->mobile2 = $request->mobile2;
        $ShippingModel->email = $request->email;
        $ShippingModel->address1 = $request->address1;
        $ShippingModel->address2 = $request->address2;
        $ShippingModel->city = $request->city;
        $ShippingModel->state = $request->state;
        $ShippingModel->email = $request->email;
        $ShippingModel->country = $request->country?$request->country:'';
        $ShippingModel->pincode = $request->pincode?$request->pincode:'';
        $ShippingModel->location_url = $request->location_url?$request->location_url:'';
        $ShippingModel->landmark = $request->landmark;
        $ShippingModel->address_type = $request->address_type?$request->address_type:'';
        $ShippingModel->save();
        $data=array();
        return redirect()->back()->with('success', 'Address Change successfully');

        // return view('physical-cards.shipping_address',$data);


    }
}