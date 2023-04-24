<?php
namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\UserModel;
$pager = \Config\Services::pager();

class Users extends BaseController
{

	private $model ;
	protected $logger;
	
	
	public function __construct()
	{
		helper('form');
		$this->model = new UserModel();
		helper('date');
		
        
	}

    public function index()
    {
       // $data['users']= $this->model->findAll()->paginate(5);
	   // $this->orderBy('id','DESC')->findAll()
		
		$data['users'] = $this->model->orderBy('id','DESC')->paginate(5);
		$data['pager'] = $this->model->pager;
        $data['title']="Users";
		$this->logger->info('Retrieved all users from the database.', $data['users']);
        return view("users/view",$data);
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
							'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]',
							'cpassword'=>[
									'label' => "Confirm Password",
									'rules'=> 'matches[password]',
									'errors'=> [
										'matches'=>" Confirm password should be match with password"
											 ]
									],
							'username'=>'required|min_length[8]|max_length[20]',
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
								'username'=> $this->request->getVar('username'),
							];
							$myTime = new Time('now');
							$this->model->save($newdata);
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
        




	public function edit_user($id=null)
	{
					$data=[];
					if ($this->request->getMethod()=='post')
					{
						$rules=[
							'firstname'=> 'required|min_length[3]|max_length[20]',
							'lastname'=> 'required|min_length[3]|max_length[20]',
								'email'=> 'required|min_length[5]|max_length[50]|valid_email',
						];
						if ($this->request->getPost('password')!=''){
							$rules['password']= 'required|min_length[3]|max_length[20]';
							$rules['cpassword']= 'matches[password]';
						}
					 if (! $this->validate($rules)){
						$data['validation']= $this->validator;
					}
					 else
						{
						$newdata =
						[
									'id' => $id,
									'role' => $this->request->getPost('role'),
									'username'=>$this->request->getPost('username'),
									'firstname' => $this->request->getPost('firstname'),
									'lastname' => $this->request->getPost('lastname'),
									'email' => $this->request->getVar('email'),
									'slug' => url_title($this->request->getVar('email')),
									'update' => date('Y-m-d H:i:s',now()),
						];
			if ($this->request->getPost('password')!=''){
				$newdata['password']= $this->request->getPost('password');
			}
						$this->model->save($newdata);
						session()->setFlashdata('success', 'Sucessfully Updated');
						return redirect()->to('/user');
					 }
					}
					$data['user']=$this->model->where('id',$id)->first();
					return view("/users/edit",$data);
}


	public function activate_user($id)
			{
					session()->setFlashdata('success', 'Sucessfully activated');
					printf("hi it was came");
					$this->model->change_status($id,$status=0,);
					return redirect()->to('/user');
				}
	public function deactivate_user($id)
			{
				session()->setFlashdata('success', 'Sucessfully deactivated');
				$this->model->change_status($id,$status=1);
				return redirect()->to('/user');
			}
}
