<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\UserModel;
class User extends BaseController
{

	public function __construct()
	{
		helper('form');
		
		helper('date');
	}

    public function index()
    {
        return view("users/view");
    }
    public function create()
    {

		$data=[];
					if ($this->request->getMethod()=='post')
							{
								$rules=
										[
											'firstname'=> 'required|min_length[3]|max_length[20]',
											'lastname'=> 'required|min_length[3]|max_length[100]',
											'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
											'password'=> 'required|min_length[8]|max_length[255]',
											'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]|is_unique[users.mobile]',
											'cpassword'=>[
												'label' => "Confirm Password",
												'rules'=> 'matches[password]',
												'errors'=> [
												'matches'=>" Confirm password should be match with password"
												 ]
												]
												];


								 if (! $this->validate($rules))
														{
																				$data['validation']= $this->validator;
														}

								else
										{
											$newdata =
														[
																			'email' => $this->request->getVar('email'),
																			'password' => $this->request->getVar('password'),
																			'role' => $this->request->getVar('role'),
																			'firstname' => $this->request->getVar('firstname'),
																			'lastname' => $this->request->getVar('lastname'),
																			'mobile' => $this->request->getVar('mobile'),
																			'slug' => url_title($this->request->getVar('email')),
																		];
								$myTime = new Time('now');
								
														$time = Time::parse($myTime);
														$preregid = $time->getYear();
														$gmail =$newdata['email'];
														
														$message = "You areSucessfuly registred your Pre Registration Id is"." ".$preregid." ";
														$session= session();
														$session->setFlashdata('sucess', $message);
														return redirect()->to('/');
												}
							}
                             return view('users/create',$data);
						
			}
        






    
    public function edit()
    {
        return view('users/edit');
    }
    
     public function activate()
    {
        return view('users/activate');
    }
    public function deactivate()
    {
        return view('users/deactivate');
    }
}
