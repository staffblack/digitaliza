<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class StoreMatriculasRequest extends FormRequest
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
		$validar_update = $this->get('id_user') > 0 ? $this->get('id_user') : "NULL";
        return [
			#'materia' => 'required|unique:materias',
			'id_user' => 'required|unique:matriculas,id_user,' . $validar_update . ',id,id_curso,' . $this->get('id_curso')
        ];
    }
}
