<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'surname' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'patronymic' => ['required', 'string'],
            'age' => ['nullable', 'integer','min:0','max:100'],
            'address' => ['nullable', 'string'],
            'gender' => ['nullable', 'integer'],
            'email' => ['required', 'string','unique:users,email'],
            'password' => ['required', 'string','confirmed']
        ];
    }


    public function messages()
    {
        return [
            'surname.required' => 'Фамилия должна быть заполнена',
            'firstname.required' => 'Имя должно быть заполнено',
            'patronymic.required' => 'Отчество должно быть заполнено',
            'age.min' => 'Некорректный возраст',
            'age.max' => 'Некорректный возраст',
            'email.required' => 'Email должен быть заполнен',
            'email.unique' => 'Пользователь с таким email-ом уже зарегистрирован',
            'password.required' => 'Пароль должен быть заполнен',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }
}
