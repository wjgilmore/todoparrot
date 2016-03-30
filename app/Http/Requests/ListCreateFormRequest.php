<?php namespace Todoparrot\Http\Requests;

use Todoparrot\Http\Requests\Request;

class ListCreateFormRequest extends Request {

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
          'category' => 'required',
          'description' => 'required'
        ];
	}

	public function messages()
	{
	    return [
	        'name.required'  => 'Please assign a name to the list.',
	        'category.required'       => 'Please assign a category to the list.',
	        'description.required' => 'Please describe the list.'
	    ];
	}

}
