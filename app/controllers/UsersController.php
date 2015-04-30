<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{
public function __construct(){
	
	App::setLocale('id');
	
}
    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
	
    public function create()
    {
		App::setLocale('id');
		$content= View::make("frontend.signup")->render();
        return View::make("layout.main",array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Sign Up"=>"")));    
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store()
    {
			App::setLocale('id');
        $repo = App::make('UserRepository');
        $user = $repo->signup(Input::all());

        if ($user->id) {
			
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject("Attack - Solusi Ibu Cerdas");
                    }
                );
            }

            return Redirect::action('UsersController@login')
                ->with('notice', Lang::get('confide::confide.alerts.account_created'));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::action('UsersController@create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login()
    {
        if (Confide::user()) {
			$profile=Profile::
			 where("id_user","=",Auth::id()) 
			   ->where("tipe","=","user")
			   ->selectRaw("profile.nama, count(*) as jumlah")->first();
			Session::put("isprofile",$profile->jumlah);
			if($profile->jumlah!=0)
			   Session::put("nama",$profile->nama);
		     
			return Redirect::to('/home');
			
        } else {
      
			   $content= View::make("frontend.signin")->render();
               return View::make("layout.main",array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Login"=>""))); 
        }
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();

        if ($repo->login($input)) {
			$profile=Profile::
			 where("id_user","=",Auth::id()) 
			   ->where("tipe","=","user")
			   ->selectRaw("profile.nama, count(*) as jumlah")->first();
			Session::put("isprofile",$profile->jumlah);
			if($profile->jumlah!=0)
			   Session::put("nama",$profile->nama);
            return Redirect::intended('/home');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UsersController@login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UsersController@login')
                ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword()
    {
		$content= View::make("layout.forgotpassword")->render();
               return View::make("layout.main",array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Forgot Password"=>""))); 
        
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UsersController@doForgotPassword')
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
       		$content= View::make("frontend.resetpassword")->render();
               return View::make("layout.main",array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Reset Password"=>"")))->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword()
    {
        $repo = App::make('UserRepository');
        $input = array(
            'token'                 =>Input::get('token'),
            'password'              =>Input::get('password'),
            'password_confirmation' =>Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UsersController@resetPassword', array('token'=>$input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout()
    {   
	    Session::flush();
        Confide::logout();
        return Redirect::to('/');
    }
	public static function getDate($str){
		$date=new DateTime($str);
		return $date->format("d-m-Y");
		
	}	
	public static function getDateTime($str){
		$date=new DateTime($str);
		return $date->format("d-m-Y H:i:s");
		
	}
	public static  function numhash($n) {
    return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
/* 	numhash(42);           ## 2752512
numhash(numhash(42);   ## 42 */
     }
}
