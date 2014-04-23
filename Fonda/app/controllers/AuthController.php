<?php
	class AuthController extends BaseController{

		public function getLogin(){
			return View::make('auth.login');
		}

		public function postLogin(){

			$user_data = array(
					'nick' => Input::get('nick'),
				   	'password' => Input::get('password')
				);
			
			if (Auth::attempt($user_data)) {
				return Redirect::to('auth/panel');
			}else{
				return $this->getLogin()->with('error', 'Usuario o contraseña incorrecta!');
			}
		}

		public function getPanel(){
			if (Auth::check()) {
				$date = date('Y-m-d');
				$user = Auth::user();
				$name_user = explode(' ',trim($user->name));
				Session::put('user-name', $name_user[0]);
				Session::put('name-photo', $user->photographic);
				Session::put('user-id', $user->id);
				$lines = Line::all();
				$shifts = Shift::all();
				$posts = Post::with('user')->orderBy('id', 'DESC')->take(10)->get();
				$rowsUsers = User::all();
				$production = Production::with('model.mold', 'line', 'user', 'arduino')->select('*' ,DB::raw('count(line_id) as quantity'))->groupBy('plan_id', 'line_id','model_id')->where('created_at', 'LIKE', '%'.$date.'%')->get();		
				
				$plan = Plan::with('line', 'user', 'model.mold', 'shift')->where('production_date', $date)->get();
				$def_production = DefectiveProduction::with('model.mold', 'line', 'user', 'defect')->select('*' ,DB::raw('count(defect_id) as quantity'))->groupBy('line_id', 'model_id')->get();

				return View::make('panel.index')->with('user', $user)->with('rowsUsers', $rowsUsers)->with('plan', $plan)->with('def_production', $def_production)->with('production', $production)->with('posts', $posts)->with('lines', $lines)->with('shifts', $shifts);
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