<?php
namespace App\Modules\Kyc\Controllers\Admin;
class Kyc_Verification extends BaseController {
    function __construct() {
    }

 
    public function profile_verify(){
        $setting            = $this->common_model->where_row('setting', []);
        if(isset($setting) && $setting->kyc_verify == 0){
            $this->session->setFlashdata('exception', display('not_need_verification'));
            return redirect()->to(base_url('user/settings'));
        }

        if(empty($this->session->get('user_id')))
            return redirect()->to('login');


        $date           = new \DateTime();
        $submit_time    = $date->format('Y-m-d H:i:s');
        
        $this->validation->setRule('verify_type', 'verify_type','required|trim');
        $this->validation->setRule('first_name', display('firstname'),'required|max_length[20]|trim');
        $this->validation->setRule('last_name', display('lastname'),'required|max_length[20]|trim');
        $this->validation->setRule('gender', 'gender','required|trim');
        $this->validation->setRule('id_number', display('id_numder'),'required|max_length[20]|alpha_numeric|trim');
        
        
        //From Validation Check
        if($this->request->getMethod() == 'post'){
            
            $checkVerifyStatus  = $this->db->table('dbt_user')->where(['user_id' => $this->session->get('user_id')])->get()->getRow();
            

            if($checkVerifyStatus->kyc_verify == 1){ 
               $this->session->setFlashdata('exception', display('verification_processing'));
            } else {
                if(!empty($this->request->getFile('document1'))){
                    $this->validation->setRule('document1', display('image'), 'ext_in[document1,png,jpg,gif,ico]|is_image[document1]');
                }
                if(!empty($this->request->getFile('document2'))){
                    $this->validation->setRule('document2', display('image'), 'ext_in[document2,png,jpg,gif,ico]|is_image[document2]');
                }

                if($this->validation->withRequest($this->request)->run() && $this->request->getFile('document1')){
                    $document1 = $this->imagelibrary->Image($this->request->getFile('document1'), 'public/uploads/document/', $this->request->getPost('document1'), 500, 500);
                } else {
                    $document1 = "";
                }

                if($this->validation->withRequest($this->request)->run() && $this->request->getFile('document2')){
                    $document2 = $this->imagelibrary->Image($this->request->getFile('document2'), 'public/uploads/document/', $this->request->getPost('document2'), 500, 500);
                } else {
                    $document2 = "";
                }
                
                if ($this->validation->withRequest($this->request)->run()) 
                {

                    $verify_info = array(
                        'user_id'     => $this->session->get('user_id'),
                        'verify_type' => $this->request->getPost('verify_type', FILTER_SANITIZE_STRING), 
                        'first_name'  => $this->request->getPost('first_name', FILTER_SANITIZE_STRING),
                        'last_name'   => $this->request->getPost('last_name', FILTER_SANITIZE_STRING),
                        'gender'      => $this->request->getPost('gender', FILTER_SANITIZE_STRING),
                        'id_number'   => $this->request->getPost('id_number', FILTER_SANITIZE_STRING),
                        'document1'   => $document1,
                        'document2'   => $document2,
                        'date'        => $submit_time
                    );


                    if ($this->common_model->insert('dbt_user_verify_doc', $verify_info)) {
                        //Update User table for Verify Processing
                        $this->common_model->update('dbt_user', ['user_id' => $this->session->get('user_id')], ['kyc_verify' => 1]);
                        $this->session->setFlashdata('message', 'Verification is being processed!');
                    } else {
                        $this->session->setFlashdata('exception', display('please_try_again'));
                    }
                } else {
                    $this->session->setFlashdata("exception", $this->validation->listErrors());
                }
            }
        }


        return redirect()->to(base_url("user/settings"));
    }

    public function email_verify() { 

        $setting            = $this->common_model->where_row('setting', []);
        if(isset($setting) && $setting->email_verify == 0){
            $this->session->setFlashdata('exception', display('not_need_verification'));
            return redirect()->to(base_url('user/settings'));
        }

        //From Validation Check
        if ($this->request->getMethod() == 'post') {

            $this->validation->setRule('verify_code', display('verify_code'), 'required|trim');
            
            if ($this->validation->withRequest($this->request)->run()) {
                $checkUser          = $this->common_model->read('dbt_user', ['user_id' => $this->session->get('user_id')]);

                /**
                 * Check Verification Employee 
                 */
                if($checkUser && $checkUser->email_verify != 2){
                
                    $verifyCode = $this->common_model->read('dbt_verify_tbl', ['user_id' => $this->session->get('user_id'), 'verify_code' => $this->request->getPost('verify_code', FILTER_SANITIZE_STRING), 'status' => 1]);
                    if ($verifyCode) {
                        $verifyUser = $this->common_model->update('dbt_user',['user_id' => $this->session->get('user_id')], ['email_verify' => 2]);
                        if ($verifyUser) {
                            $this->common_model->update('dbt_verify_tbl', ['id' => $verifyCode->id],['status' => 0]);
                            $this->session->setFlashdata('message', display('verify_successfully'));
                            return redirect()->to(base_url('user/settings'));
                        } else {
                            $this->session->setFlashdata('exception', display('please_try_again'));
                            return redirect()->to(base_url("email-verify"));
                        }
    
                    } else {
                        $this->session->setFlashdata('exception', display('code_didnot_match'));
                        return redirect()->to(base_url("email-verify"));
                    }
                }
                else{
                    $this->session->setFlashdata('exception', display('user_information_not_found'));
                    return redirect()->to(base_url("email-verify"));
                } 
            

            } else {
                $this->session->setFlashdata("exception", $this->validation->listErrors());
                return redirect()->to(base_url("email-verify"));
            }
        }

        $check = $this->send_verify_code('email');

        if($check == 0){
            return redirect()->to(base_url('user/settings'));
        }

        $data['frontendAssets'] = base_url('public/assets/website');
        $data['content']        = view($this->BASE_VIEW . '\user\email_verify',$data);
        return $this->template->website_layout($data);

    }

    public function phone_verify() { 

        $setting            = $this->common_model->where_row('setting', []);
        if(isset($setting) && $setting->phone_verify == 0){
            $this->session->setFlashdata('exception', display('not_need_verification'));
            return redirect()->to(base_url('user/settings'));
        }


        //From Validation Check
        if ($this->request->getMethod() == 'post') {

            $this->validation->setRule('verify_code', display('verify_code'), 'required|trim');
            
            if ($this->validation->withRequest($this->request)->run()) {
                $checkUser = $this->common_model->read('dbt_user', ['user_id' => $this->session->get('user_id')]);

                /**
                 * Check Verification Employee 
                 */
                if($checkUser && $checkUser->email_verify != 2){
                
                    $verifyCode = $this->common_model->read('dbt_verify_tbl', ['user_id' => $this->session->get('user_id'), 'verify_code' => $this->request->getPost('verify_code', FILTER_SANITIZE_STRING), 'status' => 1]);
                    if ($verifyCode) {
                        $verifyUser = $this->common_model->update('dbt_user',['user_id' => $this->session->get('user_id')], ['phone_verify' => 2]);
                        if ($verifyUser) {
                            $this->common_model->update('dbt_verify_tbl', ['id' => $verifyCode->id],['status' => 0]);
                            $this->session->setFlashdata('message', display('verify_successfully'));
                            return redirect()->to(base_url('user/settings'));
                        } else {
                            $this->session->setFlashdata('exception', display('please_try_again'));
                            return redirect()->to(base_url("phone-verify"));
                        }
    
                    } else {
                        $this->session->setFlashdata('exception', display('code_didnot_match'));
                        return redirect()->to(base_url("phone-verify"));
                    }
                }
                else{
                    $this->session->setFlashdata('exception', display('user_information_not_found'));
                    return redirect()->to(base_url("phone-verify"));
                }  
            } else {
                $this->session->setFlashdata("exception", $this->validation->listErrors());
                return redirect()->to(base_url("phone-verify"));
            }

        }

        $check = $this->send_verify_code('phone');

        if($check == 0){
            return redirect()->to(base_url('user/settings'));
        }

        $data['frontendAssets'] = base_url('public/assets/website');
        $data['content']        = view($this->BASE_VIEW . '\user\phone_verify',$data);
        return $this->template->website_layout($data);

    }


    public function send_verify_code($varify_media) {
        $appSetting     = $this->common_model->read('setting', array());
        $varify_code    = $this->randomID();            
        $userinfo       = $this->common_model->read('dbt_user', array('user_id' => $this->session->get('user_id')));
        $delete_old     = $this->common_model->deleteRow('dbt_verify_tbl', array('user_id' => $this->session->get('user_id'), 'verify_type' => $varify_media ));
        
        if($varify_media == "email"){
            if($userinfo->email_verify == 2){
                $this->session->setFlashdata('exception', display('already_verified'));
                return redirect()->to(base_url('user/settings'));
            }

            /***************************
            *      Email Verify SMTP
            ***************************/
            $post = array(
                'title'        => $appSetting->title,
                'to'           => $userinfo->email,
                'varify_code'  => $varify_code
            );
        
            $config_var = array( 
                'template_name' => 'profile_verification',
                'template_lang' => 'en',
            );
            $message    = $this->common_model->email_msg_generate($config_var, $post);
            $send_email = array(
                'title'         => $appSetting->title,
                'to'            => $userinfo->email,
                'subject'       => $message['subject'],
                'message'       => $message['message'],
            );
            $code_send = $this->common_model->send_email($send_email);

            $this->common_model->update('dbt_user', array('user_id' => $this->session->get('user_id')), ['email_verify' => 3]);

        }
        else if($varify_media == "phone") { 
            if($userinfo->phone_verify == 2){
                $this->session->setFlashdata('exception', display('already_verified'));
                return redirect()->to(base_url('user/settings'));
            }

        
            /***************************
            *      SMS Verify
            ***************************/ 

            $template = array(                
                'varify_code'   => $varify_code
            );

            $config_var = array( 
                'template_name' => 'profile_verification',
                'template_lang' => 'en',
            );
            $message    = $this->common_model->sms_msg_generate($config_var, $template);

            
            $send_sms = array(
                'to'        => $userinfo->phone,
                'template'  => $message['message'],
            );
            
            
            if ($userinfo->phone) {
                $code_send = $this->sms_lib->send_sms($send_sms);
            } else {
                $this->session->setFlashdata('exception', display('there_is_no_phone_number'));
            }

            $this->common_model->update('dbt_user', array('user_id' => $this->session->get('user_id')), ['phone_verify' => 3]);
            
        }
        $vtype = array(
            'verify_type'   => $varify_media,
            'email'         => $userinfo->email,
            'phone'         => $userinfo->phone,
            'verify_code'   => $varify_code,
        );

        $varify_data = array(
                'ip_address'    => $this->request->getIPAddress(),
                'user_id'       => $this->session->get('user_id'),
                'session_id'    => $this->session->get('isLogIn'),
                'verify_code'   => $varify_code,
                'data'          => json_encode($vtype),
                'verify_type'   => $varify_media,
                'status'        => 1
            );


        $result = $this->common_model->save_return_id('dbt_verify_tbl', $varify_data);  
        
        return 1;

    }     

    public function randomID($mode = 2, $len = 6){
        $result = "";

        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);

        for($i = 0; $i < $len; $i++) {

            $randItem = array_rand($charArray);
            $result .="".$charArray[$randItem];
        }
        return $result;
    }



}
