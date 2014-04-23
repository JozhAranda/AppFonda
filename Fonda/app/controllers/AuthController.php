<?php
class AuthController extends BaseController {
   public function getLogin() {
      return View::make('auth.login');
   }
   public function postLogin() {
      //return md5(Input::get('password'));
      
      $user_data = array(
         'username' => Input::get('username'),
         'password' => Input::get('password')
      );

      if(Auth::attempt($user_data)){
         return Redirect::to('/');
      }else{
         return $this->getLogin()->with('error', 'Usuario o contraseña incorrectos.');
      }
   } 
   public function getWelcome(){
      if(Auth::check()){
         $user = Auth::user();
         return View::make('/');
      }else{
         return $this->getLogin();
      }
   }
   public function getLogout(){
      if(Auth::check()){
         Auth::logout();
      }
      return Redirect::to('auth/login');
   }
}
?>