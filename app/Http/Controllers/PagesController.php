<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use	Illuminate\Validation\Factory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\UrlGenerator;
use \Validator;
use DB; 
use Session;
use Auth; 
use Illuminate\Support\Facades\Input;
use Hash;
use File;
use Response;
use App\users;
use App\product;
use App\booking;
use Cart;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function Home()
    {
    	return view("Home");
    }
     public function Login()
    {
    	return view("login");
    }

    public function Signup(){

    	return view("signup");
    }

    public function postlogin(Request $request){


		$input= Input::get('formData');
		// $formFields =$request->all();
		parse_str($input, $formFields);  
    $userData = array(
      'email'      => $formFields['email'],
      'password' =>$formFields['password']
    );

	 $validator = Validator::make($userData,[
           'email' => 'required',
           'password' => 'required',
       ]);

	 if ($validator->fails()) {
			        return Response::json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray(),
            'message'=>'Check your fields above please'
        ));
	    }
	    else
	    {
	    	$url= url();
	    	//$password = Hash::make($formFields['password']);
	    	 if (Auth::attempt(['Email' => $formFields['email'], 'password' => $formFields['password'] ]))  
        { 
        	 $query=DB::table('users')->where('Email', $formFields['email'])->first();
        	 $count = DB::table('users')->where('Email', $formFields['email'])->count();
        	  if($count<1)
        	  {
        	  	 return Response::json(array(
            'fail' => true,
            'message'=>'Sorry the email does not exist please go and signup'
        ));
        	  }
        	  else
        	  {
        	 $request->session()->put('fname',$query->FName);
        	 $request->session()->put('lname',$query->LName);
        	 $request->session()->put('email',$query->Email);
        	 $request->session()->put('user_id',$query->user_id);
          if($query->AdminLevel==1)
          {
            $request->session()->put('is_admin',true);
          }        	 
           return Response::json(array(
            'success' => true,
            'url'=>$url
        ));
           }
        }  
        else{
        	return Response::json(array(
             'fail' => true,
            'errors' => 'Wrong email and password combination', 
            'cred'=>'wrong'
        ));
        }
	    }

		//return view("pages.Signup");
	}
		public function postsignup(Request $request){
			$input= Input::get('formData');
		
		parse_str($input, $formFields);  
    $userData = array(
      'firstname'      => $formFields['firstname'],
      'lastname' =>$formFields['lastname'],
      'middlename' => $formFields['middlename'],
      'mobile'=>$formFields['mobile'],
           'email' =>$formFields['email'],
           'password' => $formFields['password'],
           'password_confirmation'=>$formFields['password_confirmation']
    );


	 $validator = Validator::make($userData,[
           'firstname' => 'required|max:255',
           'lastname' => 'required|max:255',
           'middlename' => 'required|max:255',
           'mobile'=>'required|numeric|digits_between:3,17',
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|confirmed|min:8|alpha_num',
           'password_confirmation' => 'required|min:8|alpha_num'
       ]);
	//  return $input['firstname'];

		if ($validator->fails()) {
			        return Response::json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
        ));
    	// return redirect()->back()->withErrors($validator->errors());
		}
		else{
			$user = new users;
			$user->FName=$formFields['firstname'];
			$user->MName=$formFields['middlename'];
			$user->LName=$formFields['lastname'];
			$user->mobileNo=$formFields['mobile'];
			$user->Email=$formFields['email'];
			$user->password=Hash::make($formFields['password']);
			$user->save();
			        return Response::json(array(
         			 'success' => true
        			));
		}
		}

    public function productcreate()
    {
          return view("productcreate");
    }
      public function seeproduct()
    {
          return view("seeproduct");
    }

     public function seeproduct2($class)
    {
      $classes=$class;
          return view("seeproduct2",compact('class'));
    }

     public function editproduct($id)
    {
       $product=DB::table('products')->where('product_id', $id)->get();
        return view("editproduct",compact('product'));
    }

    public function posteditproduct()
    {
        $data= Input::get();
      // $turn= Input::get('turn');
      // $cat= Input::get('cat');
      $validator = Validator::make($data,[
             'price'=>'required',
             'discount'=>'required',
             'id'=>'required',
         ]);

      if ($validator->fails()) {
        
        Session::flash('messageerr', $validator->getMessageBag());

        return redirect('productcreate');
        // return redirect()->back()->withErrors($validator->errors());Session::get('user_id')
      }
      else
      {
       
       $table= product::where('product_id', "=",$data['id'])->first();;
      $table->price = $data['price'];
        $table->discount = $data['discount'];
      $table->save();

       Session::flash('messagesuccess', "changed the package successfully");

        return redirect('editproduct/'.$data['id']);
      }
    }

    public function reducecartitem($id)
    {
      
      $rowId = Cart::search(array('id' => $id));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 1);


        return redirect('seecart');

    }

     public function removecartitem($id)
    {

      $rowId = Cart::search(array('id' => $id));
      Cart::remove($rowId[0]);

      return redirect('seecart');
    }

      public function seeproduct3($class,$subject)
    {
      $classes=$class;
     $product=DB::table('products')->where('Subject', $subject)->where('Form', $class)->get();
          return view("seeproduct3",compact('class','product'));
    }

     public function addcart()
    {
      $data= Input::get();
      // $turn= Input::get('turn');
      // $cat= Input::get('cat');
      $validator = Validator::make($data,[
             'name'=>'required',
             'id'=>'required',
             'price'=>'required',
             'discount'=>'required'
         ]);

      if ($validator->fails()) {
        
        Session::flash('messagesuccess', $validator->getMessageBag());

        return redirect('productcreate');
        // return redirect()->back()->withErrors($validator->errors());Session::get('user_id')
      }
      else
      {
        $total= (int)$data['price'];
        $price = 0;
         $count = DB::table('booking')->where('product_id',$data['id'])->where('User_Id',Session::get('user_id'))->count();

         if($count>0)
         {
          $price= $total-((((int)$data['discount'])*$total)/100);

           Cart::add(array('id' => $data['id'], 'name' => $data['name'], 'price' =>  $price, 'qty'=>1, 'options'=>array('discount' => 0)));
      
         }

         else
         {
       Cart::add(array('id' => $data['id'], 'name' => $data['name'], 'price' =>  $data['price'], 'qty'=>1, 'options'=>array('discount' => $data['discount'])));
      
      }
      Session::flash('messagesuccess', $validator->getMessageBag());

        return redirect('seecart');

      }
    }

    public function CheckOut(){

      // $data= Input::get();
      // // $turn= Input::get('turn');
      // // $cat= Input::get('cat');
      // $validator = Validator::make($data,[
      //        'total'=>'required',
      //        'discount'=>'required',
            
      //    ]);

    $cart = Cart::content();
     foreach ($cart as $c) {
       $q= DB::table('booking')->where('product_id', $c->id)->where('User_Id', session::get('user_id'))->count();
       
       $datetoday = Carbon::now();

       if($q>0)
       {

        $table= booking::where('product_id', "=",$c->id)->where("User_Id",Session::get('user_id'))->first();
       $table->prices = $c->price;
      $table->expirydate = ($datetoday->addYears($c->qty));
      $table->save();

       }
       else
       {

         $table= new booking;
      $table->prices =  $c->price;
       $table->product_id = $c->id;
        $table->User_Id = Session::get('user_id');
      $table->expirydate = ($datetoday->addYears($c->qty));
      $table->save();

       }
     }

     Cart::destroy();
     Session::flash('messagesucess', 'successfully paid KSH for your packages thank you thank you');

     return redirect('seecart');
    }

     public function seecart()
     {
         $cart = Cart::content();

         return view("seecart",compact('cart'));
     }

    public function create()
    {
      $data= Input::get();
      // $turn= Input::get('turn');
      // $cat= Input::get('cat');
      $validator = Validator::make($data,[
             'price'=>'required',
             'discount'=>'required',
             'category'=>'required',
             'subject'=>'required',
             'class'=>'required'
         ]);

      if ($validator->fails()) {
        
        Session::flash('messageerr', $validator->getMessageBag());

        return redirect('productcreate');
        // return redirect()->back()->withErrors($validator->errors());Session::get('user_id')
      }
      else
      {
       
       $table= new product;
      $table->product_name = "School_Product";
      $table->price = $data['price'];
      $table->product_description = $data['category'];
      $table->Subject = $data['subject'];
        $table->discount = $data['discount'];
        $table->Form = $data['class'];
      $table->save();

      Session::flash('messagesuccess', "successfully created a new package");

      return redirect('productcreate');
      }
    }


      public function packagebought()
    {

        $product = DB::select('SELECT * FROM products, booking WHERE booking.product_id in (
      SELECT product_id FROM booking where User_Id ="'.Session::get('user_id').'"
      ) Order By booking.updated_at desc');  

        return view('packagebought',compact('product'));

    }
    
  public function logout(Request $request)
  {
    $request->session()->flush();
    return redirect('Home');
  }


}

