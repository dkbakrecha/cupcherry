<?php

App::uses('AppModel', 'Model');

class EmailContent extends AppModel {

    public $name = 'EmailContent';
    public $validate = array();

    public function sendInvitation($name, $email, $key) {

        $mail_content = $this->getMailContent('INVITATION_MAIL');
        //prd($mail_content);

        if (is_array($mail_content) && !empty($mail_content)) {
            $userName = ucwords($name);
            $userEmail = strtolower($email);

            $link = Router::url(array('controller' => 'groups', 'action' => 'invitation_token', $key), true);
            // $link = 'http://localhost/education/groups/invitation_token/' . $key;

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{name}}', $name, $mail_refined_content);
            //  $mail_refined_content = str_replace('{{email}}', $email, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);

            //prd($mail_refined_content);
            // $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($userEmail);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Group Invitation");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            try {
                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function plus_request($organizationName, $contactPerson, $contactEmail, $contactNumber) {

        $mail_content = $this->getMailContent('PLUS_REQUEST');
        //prd($mail_content);

        if (is_array($mail_content) && !empty($mail_content)) {

            $organ_Name = ucwords($organizationName);
            $userEmail = strtolower($contactEmail);

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{organ_name}}', $organ_Name, $mail_refined_content);
            $mail_refined_content = str_replace('{{name}}', $contactPerson, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $contactEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{number}}', $contactNumber, $mail_refined_content);

            //  prd($mail_refined_content);
            // $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            $sent_to = 'cupcherry3@gmail.com';
            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($sent_to);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Plus Request");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            try {
                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function forgetPassword($name, $email, $key) {

        $mail_content = $this->getMailContent('FORGOT_PASSWORD');
        //prd($mail_content);

        if (is_array($mail_content) && !empty($mail_content)) {
            $userName = ucwords($name);
            $userEmail = strtolower($email);

            $link = Router::url(array('controller' => 'users', 'action' => 'recovery_token', $key), true);
            //  $link = 'http://localhost/education/users/recovery_token/' . $key;

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{receiver}}', $name, $mail_refined_content);
            //  $mail_refined_content = str_replace('{{email}}', $email, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);

            // prd($mail_refined_content);
            // $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($userEmail);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Password Reset Request");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            try {
                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function userEnquiryMail($type, $product_id, $pcode, $userName, $userEmail, $contactNo, $message) {
        $mail_content = $this->getMailContent('ENQUIRY');
        $user_content = $this->getMailContent('USER_MAIL');
        // prd($user_content);

        if (is_array($mail_content) && !empty($mail_content)) {
            $userName = ucwords($userName);
            $userEmail = strtolower($userEmail);

            $path = 'http://www.samrudhexim.com/products/view/';

            // Admin Mail Content
            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{product_id}}', $path . $product_id, $mail_refined_content);
            $mail_refined_content = str_replace('{{pcode}}', $pcode, $mail_refined_content);
            $mail_refined_content = str_replace('{{name}}', $userName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $userEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{contact}}', $contactNo, $mail_refined_content);
            $mail_refined_content = str_replace('{{message}}', $message, $mail_refined_content);
            //prd($mail_refined_content);
            // User Mail Content
            $userMail_refined_content = $user_content['content'];
            $userMail_refined_content = str_replace('{{product_id}}', $path . $product_id, $userMail_refined_content);
            $userMail_refined_content = str_replace('{{pcode}}', $pcode, $userMail_refined_content);
            $userMail_refined_content = str_replace('{{name}}', $userName, $userMail_refined_content);
            $userMail_refined_content = str_replace('{{email}}', $userEmail, $userMail_refined_content);
            $userMail_refined_content = str_replace('{{contact}}', $contactNo, $userMail_refined_content);
            $userMail_refined_content = str_replace('{{message}}', $message, $userMail_refined_content);
            //prd($userMail_refined_content);
            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            // Sending Mail to Admin
            $cake_email = new CakeEmail();
            $cake_email->config('default');
            $cake_email->to(array($admin_email => 'Samrudh Exports'));
            $cake_email->from(array($userEmail => $userName));
            $cake_email->replyTo('no-reply@samrudhexim.com', 'samrudhexim');
            $cake_email->subject('Enquiry For Product From ' . $userName);
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));

            // Sending Mail to User.
            $cake_client_mail = new CakeEmail;
            $cake_client_mail->config('default');
            $cake_client_mail->to(array($userEmail => 'Samrudh Exports'));
            $cake_client_mail->from(array($admin_email => 'Samrudh Exports'));
            $cake_client_mail->replyTo('no-reply@samrudhexim.com', 'samrudhexim');
            $cake_client_mail->subject('Greetings From Samrudh Exports');
            $cake_client_mail->template('default', 'default');
            $cake_client_mail->emailFormat('html');
            $cake_client_mail->viewVars(array(
                'content' => $userMail_refined_content,
            ));
            try {
                //if(CakeRequest::host()=='192.168.1.2'){
                //print_r ($cake_email);exit;
                //	return true;
                //}
                $cake_client_mail->send();
                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function add_member_request($organ_name, $name, $email, $temPassword, $key) {
        //prd($this->request);
        $mail_content = $this->getMailContent('ADD_MEMBER_REQUEST');

        $link = Router::url(array('plus' => false, 'controller' => 'users', 'action' => 'mem_verify', $key), true);

        // prd($mail_content);
        if (is_array($mail_content) && !empty($mail_content)) {

            $UserName = ucwords($name);
            $UserEmail = strtolower($email);

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{name}}', $UserName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $UserEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);
            $mail_refined_content = str_replace('{{organ_name}}', $organ_name, $mail_refined_content);
            $mail_refined_content = str_replace('{{password}}', $temPassword, $mail_refined_content);
            // prd($mail_refined_content);

            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($UserEmail);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Add as member request");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            //pr($this->request);
            //prd($mail_refined_content);
            //prd($cake_email->send());
            //print_r ($cake_email);exit;

            try {
                //if(CakeRequest::host()=='192.168.1.2'){
                //print_r ($cake_email);exit;
                //	return true;
                //}

                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function add_request($organ_name, $name, $email, $key) {
        //   prd($this->request);
        $mail_content = $this->getMailContent('ADD_REQUEST');

        $link = Router::url(array('plus' => false, 'controller' => 'users', 'action' => 'mem_verify', $key), true);

        //prd($mail_content);
        if (is_array($mail_content) && !empty($mail_content)) {

            $UserName = ucwords($name);
            $UserEmail = strtolower($email);

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{name}}', $UserName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $UserEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);
            $mail_refined_content = str_replace('{{organ_name}}', $organ_name, $mail_refined_content);
            //  prd($mail_refined_content);

            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($UserEmail);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Add as member request");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            //pr($this->request);
            //prd($mail_refined_content);
            //prd($cake_email->send());
            //print_r ($cake_email);exit;

            try {
                //if(CakeRequest::host()=='192.168.1.2'){
                //print_r ($cake_email);exit;
                //	return true;
                //}

                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function registration_mail($status, $userName, $userEmail, $key) {
        //prd($this->request);
        $mail_content = $this->getMailContent('REGISTRATION_MAIL');

        $link = Router::url(array('controller' => 'users', 'action' => 'verification', $key), true);
        // $link = 'http://localhost/education/users/verification/' . $key;
        //prd($mail_content);
        if (is_array($mail_content) && !empty($mail_content)) {

            $userName = ucwords($userName);
            $userEmail = strtolower($userEmail);

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{name}}', $userName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $userEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);
            //$mail_refined_content = str_replace('{{message}}',$message,$mail_refined_content);
            // prd($mail_refined_content);

            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($userEmail);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Confirm your email address");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            //pr($this->request);
            //prd($mail_refined_content);
            //prd($cake_email->send());
            //print_r ($cake_email);exit;

            try {
                //if(CakeRequest::host()=='192.168.1.2'){
                //print_r ($cake_email);exit;
                //	return true;
                //}

                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function registration_plus($userName, $userEmail, $key,$pass) {
        //prd($this->request);
        $mail_content = $this->getMailContent('REGISTRATION_PLUS');

        $link = Router::url(array('plus'=>false,'controller' => 'users', 'action' => 'verification', $key), true);

       // prd($mail_content);
        if (is_array($mail_content) && !empty($mail_content)) {

            $userName = ucwords($userName);
            $userEmail = strtolower($userEmail);

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{name}}', $userName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $userEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);
            $mail_refined_content = str_replace('{{pass}}',$pass,$mail_refined_content);
           // prd($mail_refined_content);

            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('gmail');
            $cake_email->to($userEmail);
            $cake_email->from(array('cupcherry2@gmail.com' => 'cupcherry'));
            $cake_email->replyTo("no-replay@cupcherry.com", "cupcherry");
            $cake_email->subject("Confirm your email address");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));

            try {

                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    public function contactUsMail($userName, $userEmail, $message, $contactNo) {
        //prd($this->request);
        $mail_content = $this->getMailContent('CONTACT_US');
        //prd($mail_content);
        if (is_array($mail_content) && !empty($mail_content)) {

            $userName = ucwords($userName);
            $userEmail = strtolower($userEmail);

            $mail_refined_content = $mail_content['content'];
            $mail_refined_content = str_replace('{{name}}', $userName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $userEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{contact}}', $contactNo, $mail_refined_content);
            $mail_refined_content = str_replace('{{message}}', $message, $mail_refined_content);
            prd($mail_refined_content);

            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            App::uses('CakeEmail', 'Network/Email');

            $cake_email = new CakeEmail();
            $cake_email->config('default');
            $cake_email->to($admin_email);
            $cake_email->from(array($userEmail => 'Samrudh Exports'));
            $cake_email->replyTo("no-replay@samrudhexim.com", "samrudhexim");
            $cake_email->subject("Contact Us Message");
            $cake_email->template('default', 'default');
            $cake_email->emailFormat('html');
            $cake_email->viewVars(array(
                'content' => $mail_refined_content,
            ));
            //pr($this->request);
            //prd($mail_refined_content);
            //prd($cake_email->send());
            //print_r ($cake_email);exit;

            try {
                //if(CakeRequest::host()=='192.168.1.2'){
                //print_r ($cake_email);exit;
                //	return true;
                //}

                $cake_email->send();
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
    }

    private function getMailContent($unique_name) {

        $conditions = array(
            'conditions' => array('EmailContent.unique_name LIKE' => $unique_name, 'EmailContent.status' => 1), //array of conditions
            'recursive' => -1 //int
        );

        $mail_content = $this->find('first', $conditions);

        if (is_array($mail_content) && !empty($mail_content)) {
            return $mail_content['EmailContent'];
        } else {
            return false;
        }
    }

    public function __SendMail($to, $subject, $content, $from) {
        if (empty($from)) {
            strtolower(Configure::read('ADMIN_MAIL'));
        }
        $to = strtolower($to);

        App::uses('CakeEmail', 'Network/Email');

        $cake_email = new CakeEmail();
        $cake_email->config('default');
        $cake_email->to($to);
        $cake_email->from($from);
        $cake_email->subject($subject);
        $cake_email->template('default', 'mail_content');
        $cake_email->emailFormat('html');
        $cake_email->viewVars(array(
            'mail_message' => $content,
        ));

        //print_r ($content);

        try {
            //if(CakeRequest::host()=='192.168.1.2'){
            //print_r ($cake_email);exit;
            //	return true;
            //}

            $cake_email->send();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function beforeSave($options = array()) {
        foreach ($this->data[$this->alias] as $key => $val) {
            $this->data[$this->alias][$key] = trim($val);
        }
        return true;
    }

}
