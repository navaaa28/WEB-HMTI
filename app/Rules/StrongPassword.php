<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StrongPassword implements Rule
{
    /**
     * Create a new rule instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Minimal 12 karakter
        if (strlen($value) < 12) {
            return false;
        }

        // Harus mengandung huruf besar
        if (!preg_match('/[A-Z]/', $value)) {
            return false;
        }

        // Harus mengandung huruf kecil
        if (!preg_match('/[a-z]/', $value)) {
            return false;
        }

        // Harus mengandung angka
        if (!preg_match('/[0-9]/', $value)) {
            return false;
        }

        // Harus mengandung karakter khusus
        if (!preg_match('/[^A-Za-z0-9]/', $value)) {
            return false;
        }

        // Tidak boleh mengandung username/email
        $user = auth()->user();
        if ($user) {
            if (stripos($value, $user->name) !== false || 
                stripos($value, $user->email) !== false || 
                stripos($value, $user->nim) !== false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password harus memenuhi kriteria berikut:
                - Minimal 12 karakter
                - Harus mengandung huruf besar
                - Harus mengandung huruf kecil
                - Harus mengandung angka
                - Harus mengandung karakter khusus
                - Tidak boleh mengandung username/email';
    }
} 