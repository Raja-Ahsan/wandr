<?php
/**
 * SuperLikePackageModel.php - Model file
 */

namespace App\Yantrana\Components\SuperLikePackage\Models;

use App\Yantrana\Base\BaseModel;

class SuperLikePackageModel extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'super_like_packages';

    /**
     * @var array
     */
    protected $casts = [
        '_id' => 'integer',
        'status' => 'integer',
        'total_likes' => 'integer',
        'credit_price' => 'integer',
        'price' => 'float',
        'users__id' => 'integer',
    ];

    /**
     * @var array
     */
    protected $fillable = [];
}
