<?php namespace Todoparrot\Http\Requests;

use Todoparrot\Http\Requests\Request;

class ContactFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
      return [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
      ];
	}

}
