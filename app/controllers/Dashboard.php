<?php


class Dashboard extends Controller
{


    public function __construct()
    {
        $this->accountsModel = $this->model('Account');
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard',
        ];

        if (isset($_SESSION['user_id'])) {
            $this->view('Dashboard/dashboard', $data);
        } else {
            redirect('Accounts/login');
        }
    }

    public function userProfile(){
       
        if (isset($_SESSION['user_id'])) {

            $userinfo = $this->accountsModel->fetchUserInformation($_SESSION['user_id']);
          
            if(!empty($userinfo)){
                $data=[

                    'firstname'=>$userinfo->firstname,
                    'lastname'=>$userinfo->lastname,
                    'email'=>$userinfo->email,
                    'username'=>$userinfo->username,

                ];
                

                $this->view('Dashboard/userprofile', $data);
            }
            
        } else {
            redirect('Accounts/login');
        }


    }
}
