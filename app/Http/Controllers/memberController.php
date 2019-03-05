<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use App\Members;
use App\Candidate;
use App\Idcard_distribution;
use Redirect;
use Hash;

class memberController extends Controller
{
    //

    function getLoginPage()
    {
        return view('icamp19.ecellMemberPages.memberLoginPage');
    }

    function login(Request $request)
    {
        $data = $request->all();

        $rule=array(
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        );
        $validator=Validator::make($data,$rule);
        if($validator->fails())
              return Redirect::back()->withErrors($validator);
        else
        {
            $user = Members::where('email',$data['email'])->first();
            if(!$user || $user->count()==0)
                return Redirect::back()->with('error','This E-mail id is not registered');
            else
            {
                if($user && !Hash::check($request->input('password'),$user->password))
                    return Redirect::back()->with('error','Password is incorrect');
                else
                {
                    Session::put('MemberEmail',$data['email']);
                    if(Session::has('MemberEmail'))
                        return Redirect::to('/member/dashboard');
                   else 
                    return Redirect::back()->with('error','This does not match with our credentials');
                }
            }
        }
    }

    function getMemberDashboard()
    {
        return view('icamp19.ecellMemberPages.memberDashboardPage');
    }

    function logout()
    {
        Session::forget('MemberEmail');
        return Redirect::to('/member/login');
    }

    function getIdCardDistributionPage()
    {
        return view('icamp19.ecellMemberPages.IdCardDistributionPage');
    }

    function getCandidateDetails(Request $request)
    {
        $data = $request->all();
        $candidate = Candidate::where('email',$data['email'])->where('icamp_id',$data['icampid'])->first();
        if($candidate!=null)
        {
            $check = Idcard_distribution::where('icamp_id',$data['icampid'])->first();
            if($check!=null)
                return Redirect::back()->with('error','Id Card already issued');
            $name = $candidate->name;
            $companies = $candidate->companies_list;
            $idcard = new Idcard_distribution;
            $idcard->member_email = Session::get('MemberEmail');
            $idcard->icamp_id = $data['icampid'];
            $idcard->save();
            return Redirect::back()->with('success','Id card alloted')->with('name',$name)->with('companies',$companies);
        }
        else
           return Redirect::back()->with('error','Result not found');
    }
}
