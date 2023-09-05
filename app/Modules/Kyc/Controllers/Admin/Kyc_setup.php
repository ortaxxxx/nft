<?php
namespace App\Modules\Kyc\Controllers\Admin;
class Kyc_setup extends BaseController {
    function __construct() {
    }

    /**
     * Setting Page
     *
     * @return view
     */
    public function setting() {

        if (!$this->session->get('isLogIn') && !$this->session->get('isAdmin')) {
            return redirect()->to('admin');
        }

        /**
         * Check If submit Form
         */

        if ($this->request->getMethod() == 'post') {
            $data = [
                'email_verify' => $this->request->getPost('email_verify', FILTER_SANITIZE_STRING) ? $this->request->getPost('email_verify', FILTER_SANITIZE_STRING) : 0,
                'phone_verify' => $this->request->getPost('phone_verify', FILTER_SANITIZE_STRING) ? $this->request->getPost('phone_verify', FILTER_SANITIZE_STRING) : 0,
                'kyc_verify'   => $this->request->getPost('kyc_verify', FILTER_SANITIZE_STRING) ? $this->request->getPost('kyc_verify', FILTER_SANITIZE_STRING) : 0,
            ];

            if (!empty($data)) {
                $this->db->table('setting')->update($data);
 


                $this->session->setFlashdata('message', display('update_successfully'));
            } else {
                $this->session->setFlashdata('exception', display('please_try_again'));
            }

            return redirect()->to(base_url('backend/kyc/setting'));
        }

        $data['title']   = display("Kyc Setting");
        $data['setting'] = $this->common_model->where_row('setting', []);
        $data['symbol']  = $this->symbol;
        $data['content'] = $this->BASE_VIEW . '\setting\index';
        return $this->template->admin_layout($data);
    }

    /**
     * User Page
     *
     * @return view
     */
    public function user() {

        if (!$this->session->get('isLogIn') && !$this->session->get('isAdmin')) {
            return redirect()->to('admin');
        }

        $data['title']   = display("Kyc User Setting");
        $data['setting'] = $this->common_model->where_row('setting', []);
        $data['symbol']  = $this->symbol;
        $data['content'] = $this->BASE_VIEW . '\user\list';
        return $this->template->admin_layout($data);
    }

    /**
     * User List Page
     *
     * @return json
     */
    public function user_list() {

        $setting        = $this->common_model->where_row('setting', []);


        $table         = 'user';
        $column_order  = [null, 'f_name', 'l_name', 'email', 'phone', 'status', 'created']; //set column field database for datatable orderable
        $column_search = ['f_name', 'l_name', 'email', 'phone', 'status', 'created']; //set column field database for datatable searchable
        $order         = ['uid' => 'DESC']; // default order
        $list          = $this->db->table('dbt_user')->get()->getResult();

        $data = [];
        $no   = $this->request->getvar('start');

        foreach ($list as $users) {

            if ($setting->email_verify == 0 || $users->email_verify == 2) {
                $status = ($setting->email_verify == 0 ) ? "Not Require" : "Verified";
                $emailVerify = '<span class="btn btn-success btn-sm" title=" '.$status.'"> <span> <i class="fas fa-check-square"></i></span> '.$status.' </span>';
            }  else {
                if($users->email_verify == 1) {
                    $status = "Processing";  $btn = "btn-warning";
                } else{
                    $status = "Verify Now"; $btn = "btn-danger";
                }
                $emailVerify = '<button verify-type="email" data-id = "' . $users->uid . '" data-message="' . display('are_you_sure') . '" class="btn '.$btn.' btn-sm manualVerify" data-toggle="tooltip" data-placement="left" title="Verify Now">'.$status.'</button>';
            }

            if ($setting->phone_verify == 0 || $users->phone_verify == 2) {
                $status = ($setting->phone_verify == 0) ? "Not Require" : "Verified";
                $mobileVerify = '<span class="btn btn-success btn-sm" title=" '.$status.'"> <span> <i class="fas fa-check-square"></i></span> '.$status.'</span>';
            } else {
                if($users->phone_verify == 1) {
                    $status = "Processing";  $btn = "btn-warning";
                } else{
                    $status = "Verify Now"; $btn = "btn-danger";
                }
                $mobileVerify = '<button verify-type="mobile" data-id = "' . $users->uid . '" data-message="' . display('are_you_sure') . '" class="btn  '.$btn.'  btn-sm manualVerify" data-toggle="tooltip" data-placement="left" title="Verify Now">'.$status.'</button>';
            }


            if ($setting->kyc_verify == 0 || $users->kyc_verify == 2) {
                $status = ($setting->kyc_verify == 0) ? "Not Require" : "Verified";
                $kycVerify = '<span class="btn btn-success btn-sm"  title=" '.$status.'"> <span> <i class="fas fa-check-square"></i></span> '.$status.'</span>';
            } else {
                if($users->kyc_verify == 1){
                    $kycVerify = '<a href= "' . base_url('/backend/kyc/kyc-verify/'.$users->uid) . '" data-message="' . display('are_you_sure') . '" class="btn btn-warning btn-sm"  title="Processing">Processing</a>';
                }
                else{
                    $kycVerify = '<button verify-type="kyc" data-id = "' . $users->uid . '" data-message="' . display('are_you_sure') . '" class="btn btn-danger btn-sm manualVerify" data-toggle="tooltip" data-placement="left" title="Verify">Verify Now</button>';
                }
            }


            if($users->status == 1) {
                $status = '<span class="btn btn-success btn-sm">Active</span>';
            }
            elseif($users->status == 2){
                $status = '<span class="btn btn-waring btn-sm">Deactivate</span>';
            }
            elseif($users->status == 3){
                $status = '<span class="btn btn-danger btn-sm">Suspend</span>';
            }
            else{
                $status = '<span class="btn btn-danger btn-sm">Not Verify</span>';
            } 


            $no++;
            $row    = [];
            $row[]  = $no;
            $row[]  = '<a href="' . base_url("backend/customer/details/$users->uid") . '">' . $users->user_id . '</a>';
            $row[]  = '<a href="' . base_url("backend/customer/details/$users->uid") . '">' . $users->f_name . " " . $users->l_name . '</a>';
            $row[]  = $users->email;
            $row[]  = $users->phone;
            $row[]  = $status;
            $row[]  = $emailVerify;
            $row[]  = $mobileVerify;
            $row[]  = $kycVerify;
            $data[] = $row;
        }

        $output = [
            "draw"            => intval($this->request->getvar('draw')),
            "recordsTotal"    => $this->common_model->countRow('dbt_user', []),
            "recordsFiltered" => $this->user_model->count_filtered($table, $column_order, $column_search, $order),
            "data"            => $data,
        ];
        //output to json format
        echo json_encode($output);
    }


    /**
     * User Manual Verify
     *
     * @return view
     */
    public function user_manual_verify() {

        $id          = $this->request->getPost('id', FILTER_SANITIZE_STRING);
        $verify_type = $this->request->getPost('verify_type', FILTER_SANITIZE_STRING);

        $userInfo = $this->common_model->where_row('dbt_user', ['uid' => $id]);

        $updateData = [];

        if($verify_type == "email"){
            $updateData = ['email_verify' => 2];
        }
        elseif($verify_type == "kyc"){
            $updateData = ['kyc_verify' => 2];
        }
        elseif($verify_type == "mobile"){
            $updateData = ['phone_verify' => 2];
        }

        $restult = $this->common_model->update('dbt_user', ['uid' => $id], $updateData);

        if ($restult) {

            echo json_encode(['status' => 'success', 'msg' => 'Your Verification successfully done']);
        } else {

            echo json_encode(['status' => 'fail', 'msg' => 'Something went wrong, please try again.']);
        }

    }

    

    public function kyc_verify($uid = null){ 
        
        $data['title']  = display('KYC Verification');

        if(!empty($uid)) {
            $data['user']       = $this->common_model->read('user',['uid' => $uid]); 
            $data['user_verify_doc'] = $this->common_model->read('user_verify_doc',['user_id' => $data['user']->user_id]);  
        }
 
        $data['content'] = $this->BASE_VIEW . '\user\kyc_information';
        return $this->template->admin_layout($data);

    }


    public function kyc_verify_confirm($uid = null){

        if(!empty($uid)) {
            $user       = $this->common_model->read('user',['uid' => $uid]); 
            $result     = $this->common_model->update('dbt_user', ['uid' => $uid], ['kyc_verify' => 2]);
            if ($user && $result) {
                $this->session->setFlashdata('message', display('verification_successfully'));
                return redirect()->to(base_url('backend/kyc/user')); 
            } 
        }

        $this->session->setFlashdata('exception', display('please_try_again'));
        return redirect()->to(base_url('backend/kyc/kyc-verify/'.$uid)); 
    }

}
