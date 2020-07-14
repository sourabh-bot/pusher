<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;
use Predis\Command\StringStrlen;

class RegisterAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */

     private $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }


    private function getDetails()
    {
        $details['name'] = $this->getAdminName();
        $details['email'] = $this->getAdminEmail();
        $details['password'] = Hash::make($this->getPassword());
        

        return $details;

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $information = $this->user->create_admin_user($this->getDetails());
        if($information['result'])
            $this->info($information['msg']);
        else
            $this->error($information['msg']);
        
        // return 0;
    }

    // Validation functions

    private function checkRequiredField($field){
        if($field == '' || $field == null){
            return false;
        }else{
            return true;
        }
    }

    private function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    private function checkPasswordLength($password){
        return strlen($password)>=8;
    }

    private function checkPasswordConfirmOrNot($password, $confirm_password){
        return $password === $confirm_password;
    }

    // private function checkPasswordValidation($password, $confirm_password){
    //     return $this->checkPasswordLength($password) && 
    //            $this->checkPasswordConfirmOrNot($password, $confirm_password);
    // }

    private function getAdminName(){
        $name = $this->ask('Enter name');
        if($this->checkRequiredField($name)){
            return $name;
        }else{
            $this->error('This field is required');
            $this->getAdminName();
        }

    }

    private function getAdminEmail(){
        $email = $this->ask('Enter email');
        if($this->checkRequiredField($email) && $this->checkEmail($email)){
            return $email;
        }else{
            $this->error('Enter right email address');
            $this->getAdminEmail();
        }

    }
    private function getPassword(){
        $password = $this->secret('Enter password');
        $confirm_password = $this->secret('Confirm your password');
        if($this->checkRequiredField($password)&& $this->checkPasswordLength($password)){
            if($this->checkPasswordConfirmOrNot($password, $confirm_password)){
                return $password;
            }else{
                $this->error('Your password does not match.');
                $this->error('Password is required and should be atleast 8 character long.');
                $this->getPassword();
            }
        }else{
            $this->error('Password is required and should be atleast 8 character long.');
            $this->getPassword();
        }

    }
}
