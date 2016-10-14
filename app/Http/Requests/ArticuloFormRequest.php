<?php

namespace PDV\Http\Requests;

use PDV\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
        return [
            'nombre'=>'required|max:50',
            'descripcion'=>'max:256',
            'idcategoria'=>'required',
            'idpresentacion'=>'required',
            'codigo'=>'required|max:50',
            'nombre'=>'required|max:100',
            'stock_min'=>'required|numeric',
            'stock_actual'=>'required|numeric',
            'stock_max'=>'required|numeric',
            'descripcion'=>'required|max:512',
            'imagen'=>'mimes:jpeg,bmp,png'
            ];
    }
}
