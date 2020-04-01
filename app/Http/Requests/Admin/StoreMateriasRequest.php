<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMateriasRequest extends FormRequest
{
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
		$validar_update = $this->get('materia') > 0 ? $this->get('materia') : "NULL";
        return [
			#'materia' => 'required|unique:materias',
			'materia' => 'required|unique:materias,materia,' . $validar_update . ',id,id_curso,' . $this->get('id_curso')
        ];
    }
}
