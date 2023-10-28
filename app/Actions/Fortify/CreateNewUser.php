<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rule;
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
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'rol' => ['required', Rule::in(['Estudiante', 'Psicólogo'])],

        ]);

        if ($input['rol'] === 'Psicólogo') {
            $validator->sometimes('file-upload', 'required|file|mimes:pdf,png,jpg|max:5120', function ($input) {
                return true;
            });
        }

        $validator->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'rol' => $input['rol'],
            'password' => Hash::make($input['password']),
            'certificado_file' => $input['file-upload'] ?? '',
        ]);
    }
}
