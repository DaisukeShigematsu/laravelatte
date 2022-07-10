<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:255|confirmed',
        ];
    }
        public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '正しい形式で入力してください',
            'name.max' => '255文字以下で入力してください',

            'email.required' => 'メールアドレスを入力してください',
            'email.max' => '255文字以下で入力してください',
            'email.email' => '正しい形式で入力してください',
            'email.unique' => 'このメールアドレスは既に登録済です',

            'password.required' => 'パスワードを入力してください',
            'password.min' => '6文字以上で入力してください',
            'password.max' => '255文字以下で入力してください',
            'password.confirmed' => 'パスワードが一致していません',
        ];
    }


}
