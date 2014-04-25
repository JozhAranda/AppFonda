<?php
class AuthController extends BaseController {
   
   public function getLogin() {
   
      return View::make('auth.login');
   
   }
   public function postLogin() {
      
      $user_data = array(
         'username' => Input::get('username'),
         'password' => Input::get('password')
      );

      //$validator = Validator::make($user_data);

      if(Auth::attempt($user_data)){
         $user = Auth::user();
         Session::put('id-user', $user->id);
         Session::put('name-user', $user->name);
         Session::put('type-user', $user->type_id);
         //return Redirect::to('/');
         return Redirect::to('home/index');
      }else{
         return $this->getLogin()->with('error', 'Usuario o contraseña incorrectos.');
      }
   } 
   public function getWelcome(){
      
      if(Auth::check()){
         $user = Auth::user();
          return Redirect::to('home/index');
      
      }else{
      
         return $this->getLogin();
      
      }
   }
   
   public function getLogout(){
      
      if(Auth::check()) Auth::logout();

      return Redirect::to('auth/login');
   }
}