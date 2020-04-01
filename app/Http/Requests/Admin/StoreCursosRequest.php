<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class StoreCursosRequest extends FormRequest
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
		$validar_update = $this->get('curso') > 0 ? $this->get('curso') : "NULL";
        return [
			#'materia' => 'required|unique:materias',
			'curso' => 'required|unique:cursos,curso,' . $validar_update . ',id,paralelo,' . $this->get('paralelo')
        ];
    }
}
