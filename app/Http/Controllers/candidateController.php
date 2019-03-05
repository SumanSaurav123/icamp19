<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Mail\sendVerificationMail;
use App\Mail\forgetPasswordMail;
use Mail;
use App\Candidate;
use Hash;
use Auth;
use Storage;
use Carbon\Carbon;
use App\Companies;
use App\Companies_list;

class candidateController extends Controller
{
    //
    
    function generateRandomString($length = 30) {
        if($length<10)
            $characters = '0123456789';
        else
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    ##########################################################
    #        FUNCTION FOR GETING LOGIN PAGE
    ##########################################################
    function getLoginPage() {
        if(Auth::user())
           return Redirect::to('/dashboard');
        return view('icamp19.candidatesPages.loginPage');
    }

    ##########################################################
    #        FUNCTION FOR GETING REGISTER PAGE
    ##########################################################
    function getRegisterPage(){
        if(Auth::user())
           return Redirect::to('/dashboard');
        return view('icamp19.candidatesPages.registerPage');
    }

    ##########################################################
    #        FUNCTION FOR REGISTRING A CANDIDATE
    ##########################################################
    function checkRegister(Request $request) {
    
        $data = $request->all();

        $rule=array(
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:candidates',
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        );
        $validator=Validator::make($data,$rule);
        if($validator->fails())
              return Redirect::back()->withErrors($validator);
        else
        {
            $check = Candidate::where('email',$data['email'])->get();
            if($check->count()>0)
            {
                return Redirect::back()->with('error','Already registered');
            }
            $icid =  'IC'.$this->generateRandomString(5);
            $token = $this->generateRandomString(40);
            $maildata = array(
                'name'=>$data['username'],
                'token'=>$token,
                'icamp_id'=>$icid,
            );
            //saving data into datbase
            $candidate = new Candidate;
            $candidate->icamp_id = $icid;
            $candidate->name = $data['username'];
            $candidate->email = $data['email'];
            $candidate->password = Hash::make($data['password']);
            $candidate->verified = 0;
            $candidate->verify_token = $token;
            $candidate->save();

            // //sending mail
            Mail::to($data['email'])->send(new sendVerificationMail($maildata));
            return Redirect::back()->with('success','We’ve sent you an email with link at the email address you provided.');
            
        }

    }

    ##########################################################
    #        FUNCTION FOR CHECKING LOGIN
    ##########################################################
    function checkLogin(Request $request) {
        
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
            $user = Candidate::where('email',$data['email'])->first();
            if(!$user || $user->count()==0)
                return Redirect::back()->with('error','This E-mail id is not registered');
            else
            {
                if($user && !Hash::check($request->input('password'),$user->password))
                    return Redirect::back()->with('error','Password is incorrect');
                else
                {
                    if($user->verified==0)
                       return Redirect::back()->with('error','Not verified');
                    $userdata=array(
                        'email' =>$request->input('email'), 
                        'password' => $request->input('password'),
                    );
                    if(Auth::attempt($userdata))
                        return Redirect::to('/dashboard');
                   else 
                    return Redirect::back()->with('error','This does not match with our credentials');
                }
            }
        }
    
    }

    ##########################################################
    #        FUNCTION FOR VERIFY E-MAIL
    ##########################################################
    function verifyAccount($t) {
        $token = $t;
       
        $candidate_token = Candidate::where('verify_token',$token)->get();
    
        if($candidate_token->count()>0)
        {
            Candidate::where('verify_token',$token)->update(['verified'=>1]);
            $msg=1;
        }
        else
           $msg=0;
        return view('icamp19.inc.mailVerificationPage')->with('msg',$msg);
    }

    ##########################################################
    #        FUNCTION FOR PASSSING VIEW TO DASHBOARD PAGE
    ##########################################################
    function showDashboard() {
        return view('icamp19.candidatesPages.dashboardPage');
    }

    ##########################################################
    #        FUNCTION FOR CREATING PROFILE
    ##########################################################
    function updateProfile(Request $request)
    {

        $data = $request->all();

        if($request->hasFile('file'))
        {
            $fileNameWithExt=$request->file('file')->getClientOriginalName();
            //get only name
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get ext
            $fileNameExt=$request->file('file')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$fileNameExt;
            //checking for existing file
            if(Auth::user()->resume!=null)
                unlink(storage_path('app/public/resumes/'.Auth::user()->resume));
            $path=$request->file('file')->storeAs('public/resumes',$fileNameToStore);
        }
        else
        {
            $fileNameToStore=null;
        }
        $candidate = Auth::user();
        $candidate->phone_number = $data['number'];
        $candidate->wphone_number = $data['wnumber'];
        $candidate->gender = $data['custom-radio'];
        $candidate->university = $data['clg'];
        $candidate->year = (int)$data['year'];
        if($fileNameToStore)
            $candidate->resume = $fileNameToStore;
        $candidate->branch = null;
        $candidate->roll_num = $data['roll_num'];
        if(Auth::user()->profile_status==0)
            $candidate->profile_status = 1;
        $candidate->save();
        if(Auth::user()->profile_status>0)
            return Redirect::back()->with('success','Profile Updated');
        else
            return Redirect::back()->with('success','Profile Created');
    }

    ##########################################################
    #        Function for geting company view page
    ##########################################################
    function getCompanyPage()
    {
        if(Auth::user()->profile_status>1)
            return view('icamp19.candidatesPages.companyPage');
        else
        {
            return Redirect::to('/paynow');
        }
    }

    ##########################################################
    #        Function for returning all companies
    ##########################################################
    function getAllCompany(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query == 'web' || $query == 'app' || $query == 'sales' || $query == 'software' || $query == 'marketing' || $query == 'design' || $query == 'content' || $query == 'business')
            {
                $data = Companies::where('Domains', 'like', '%'.$query.'%')->get();
            }
            else if($query != '')
            {
                $data = Companies::where('Company_name', 'like', '%'.$query.'%')->get();
            }
            else
            {
                $data = Companies::all();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
            foreach($data as $user)
            {
                if(Auth::user()->checkAlreadySelected($user->id))
                    continue;
                
                $output .= '
                <div class="col-md-4">
                <div class="wrapper">
                    <div class="clash-card wizard">
                        <a href="/companyAddToList/'.$user->id.'"><div class="clash-card__image clash-card__image--wizard">
                            <span style="color:white;">Add to list</span>
                        </div></a>
                       
                        <div class="clash-card__unit-name">'.$user->Company_name.'</div>
                        <div style="text-align:center;" class="clash-card__unit-description">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Company Location :</b> .'.$user->Company_loc.'</li>
                            <li class="list-group-item"><b>Domains : </b>'.$user->Domains.'</li>
                            <li class="list-group-item"><b>Additional Perks : </b>'.$user->Added_perks.'</li>
                        </ul>
                        </div>
          
                        <div class="clash-card__unit-stats clash-card__unit-stats--wizard clearfix">
                            <div class="one-third">
                            <div class="stat">'.$user->Stipend.'</div>
                            <div class="stat-value">Stipend</div>
                        </div>

                        <div class="one-third">
                            <div style="font-size:18px;" class="stat">'.$user->Duration_Max.' weeks</div>
                            <div class="stat-value">Time period</div>
                        </div>
          
                        <div class="one-third no-border">
                        <div style="font-size:18px;" class="stat">'.$user->Interview_Mode.'</div>
                        <div class="stat-value">Interview mode</div>
                        </div>
                        </div>
          
                    </div><!-- end clash-card wizard-->
                </div><!-- end wrapper -->  
                </div>        
                ';
            }
         }
        else
        {
            $output = '<div>No match found</div>';
        }
        $data = array('card_data'  => $output,);
        echo json_encode($data);
        }
    }

    ##########################################################
    #        Function for adding company to the list
    ##########################################################
    function addToList($id)
    {
        $cid = $id;
        if(count(Auth::user()->companies_list)>3)
            return Redirect::back()->with('error','You can choose only 4 companies');
        $company = new Companies_list;
        $company->icamp_id = Auth::user()->icamp_id;
        $company->companies_id = $cid;
        $company->save();
        if(count(Auth::user()->companies_list)==3)
        {
            $candidate = Auth::user();
            $candidate->profile_status = 3;
            $candidate->save();
        }
        return Redirect::back()->with('success','Company add to the list');

    }

    ##########################################################
    #        Function for geting view of company page
    ##########################################################
    function getSelectedCompanyPage()
    {
        $companies = Auth::user()->companies_list;
        
        return view('icamp19.candidatesPages.selectedCompanyPage')->with('companies',$companies);
    }

    ##########################################################
    #        Function for removing company from list
    ##########################################################
    function removeCompany($id)
    {
        Companies_list::where('icamp_id',Auth::user()->icamp_id)->where('companies_id',$id)->delete();
        $data = Auth::user()->companies_lists;
        if(count(Auth::user()->companies_list)<2)
        {
            $candidate = Auth::user();
            $candidate->profile_status = 2;
            $candidate->save();
        }
        return Redirect::back()->with('success','Successfully Deleted');
    }
   
    ##########################################################
    #        Function for returning view to forgetpassword
    ##########################################################
    function getForgetPasswordPage()
    {
       return view('icamp19.candidatesPages.forgetPasswordPage');
    }

    function forgetPassword(Request $request)
    {
        $data = Candidate::where('email',$request->input('email'))->first();
        if($data==null)
        {
            return Redirect::back()->with('error','This E-mail ID is not registered');
        }
        else
        {
            $token = $this->generateRandomString(40);
            Candidate::where('email',$request->input('email'))->update(['verify_token'=>$token]);
            $maildata = array(
                'name'=>$data['name'],
                'token'=>$token,
            );
             // //sending mail
             Mail::to($data['email'])->send(new forgetPasswordMail($maildata));
             return Redirect::back()->with('success','We’ve sent you an email with reset password link at the email address you provided.');
        }
    }

    function resetPasswordPage($token)
    {
        $data = Candidate::where('verify_token',$token)->first();
        if($data==null)
        {
            $emsg = 'Something went wrong.Try again';
            return view('icamp19.candidatesPages.resetPasswordPage')->with('emsg',$emsg);
        }
        else if (Carbon::now()->greaterThan($data->updated_at->addDay()))
        {
            $emsg = 'Link is expired.Please try again';
            return view('icamp19.candidatesPages.resetPasswordPage')->with('emsg',$emsg);
        }
        else
        {
            $emsg='';
            return view('icamp19.candidatesPages.resetPasswordPage')->with('token',$token)->with('emsg',$emsg);
        }
    }

    function resetPassword(Request $request)
    {
        $data = $request->all();

        $rule = array(
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'cpassword' => 'required|same:password',
        );

        $message = array(
            'cpassword.same' => 'the confirm password and password must be same',
        );
        
        $validator=Validator::make($data,$rule,$message);
        if($validator->fails())
              return Redirect::back()->withErrors($validator);
        else
        {
            Candidate::where('verify_token',$data['token'])->update(['password'=>Hash::make($data['password'])]);
            return Redirect::back()->with('success','Password changed');
        }


    }

    function getPaymentPage()
    {
        return view('icamp19.candidatesPages.paymentPage');
    }

    function checkout() {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        //
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_c10c242d09fa6d2792deed0c82a",
                "X-Auth-Token:test_984665af47a659c0a4af0eef5a2"));
        $payload = Array(
            'purpose' => 'ICAMP 19',
            'amount' => '432',
            'phone' => Auth::user()->phone_number,
            'buyer_name' => Auth::user()->name,
            'redirect_url' => 'http://www.example.com/redirect/',
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => Auth::user()->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch); 

       // return $response;

        if ($err) {
            return Redirect::back()->with('error','Payment Failed, Try Again!!');
        } else {
            $data = json_decode($response);
        }


        if($data->success == true) {
            return redirect($data->payment_request->longurl);
        } else {
            return Redirect::back()->with('error','Payment Failed, Try Again!!');
        }
    }
    function redirect(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        //
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key:test_c10c242d09fa6d2792deed0c82a",
                        "X-Auth-Token:test_984665af47a659c0a4af0eef5a2"));

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch); 

        if ($err) {
            return $err;
            // return Redirect::to('/payment')->with('error','Payment Failed, Try Again!!');
        } else {
            $data = json_decode($response);

        }
        
        if($data->success == true) {
            if($data->payment->status == 'Credit')
            {
                $candidate = Auth::user();
                $candidate->payment_id = $data->payment->payment_id;
                $candidate->payment_complete = 1;
                $candidate->profile_status=2;
                $candidate->save();
                return Redirect::to('/payment')->with('success','Your payment has been pay successfully, Enjoy!!');

            } else {
                return Redirect::to('/payment')->with('error','Payment Failed, Try Again!!');
            }
        } else {
            return Redirect::to('/payment')->with('error','Payment Failed, Try Again!!');
        }
  
    }

}
