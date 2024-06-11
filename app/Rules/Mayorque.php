<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Mayorque implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $comparedValue = $this->getComparedValue($attribute);

        if ($value <= $comparedValue) {
            $fail($this->getErrorMessage());
        }
    }

    /**
     * Obtiene el valor del campo a comparar.
     *
     * @param  string  $attribute  El nombre del campo a validar.
     * @return mixed  El valor del campo a comparar.
     */
    private function getComparedValue(string $attribute)
    {
        // Aquí puedes obtener el valor del campo a comparar de la forma que necesites.
        // Por ejemplo, si estás validando un formulario, puedes acceder al valor del campo a través de la instancia del formulario.
        // Por ejemplo:
        $form = request()->validate([
            'campo1' => 'required',
            'campo2' => ['required', new Mayorque('campo1')],
        ]);
        return $form['campo1'];
    }
    
    /**
     * Obtiene el mensaje de error personalizado.
     *
     * @return string  El mensaje de error personalizado.
     */
    private function getErrorMessage()
    {
        return 'El campo :attribute debe ser mayor que :comparedValue.';
    }
}
