<?php

namespace App\Http\Requests\User\Properties;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertiesRequest extends FormRequest
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

            'name'                      =>          'required|string',
            'lat'                       =>          'required|string', ///
            'long'                      =>          'required|string', ///
            'contact'                   =>          'required|numeric',
            'dimensionss'               =>          'required|numeric',
            'featured'                  =>          'required|image',
            'floors_num'                =>          'required|numeric',
            'rooms_num'                 =>          'required|numeric',
            'baths_num'                 =>          'required|numeric',
            'price'                     =>          'required|numeric',
            'will_be_available_on'      =>          'required|string', ///
            'description'               =>          'required|string', ///
            'extra_images.*'            =>          'sometimes|nullable|image',
            'have_garden'               =>          'required|boolean',
            'is_price_negotiateable'    =>          'required|boolean',
            'furniture'                 =>          'required|in:furnished,unfurnished',
            'finish_type'               =>          'required|in:unfinished,semi_finished,lux,super_lux,Extra_super_lux',
            'seller_role'               =>          'required|in:owner,agent',
            'payment_method'            =>          'required|in:cach,check',
            'property_type_id'          =>          'required|numeric',
            'category_id'               =>          'required|numeric',
            'city_id'                   =>          'required|numeric',
            'state_id'                  =>          'required|numeric',
        ];
    }
}
