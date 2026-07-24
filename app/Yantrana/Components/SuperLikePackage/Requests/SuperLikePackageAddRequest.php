<?php
/**
 * SuperLikePackageAddRequest.php
 */

namespace App\Yantrana\Components\SuperLikePackage\Requests;

use App\Yantrana\Base\BaseRequest;
use Illuminate\Validation\Rule;

class SuperLikePackageAddRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                'max:150',
                Rule::unique('super_like_packages', 'title'),
            ],
            'description' => 'nullable|max:255',
            'total_likes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }
}
