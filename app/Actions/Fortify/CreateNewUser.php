<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        /*Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
        */
        $email = $input['email'];
        $activetoken = md5(uniqid()).$email.sha1($email);
        $activecode ="";
        $lengthcode =5;

        for ($i=0; $i <$lengthcode ; $i++) {
            $activecode .= mt_rand(0,9);
        }

        $name = $input['firstname'].' '.$input['lastname'];

        $emailsend = new EmailService;
        $subject = "Activate your Account";
        $message = "Hi ".$name." please activate your account. Copy and past your activation code : ". $activecode.
                    "or clickto the link bellow to activate your account, link : ".$activetoken;
        $emailsend->sendemail($subject, $email, $name, false, $message);
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($input['password']),
            'activation_code'=> $activecode,
            'activation_token'=>$activetoken
        ]);
    }
}
