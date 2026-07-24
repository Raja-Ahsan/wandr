<?php
/**
 * SuperLikeWalletTransactionModel.php - Model file
 */

namespace App\Yantrana\Components\SuperLikePackage\Models;

use App\Yantrana\Base\BaseModel;

class SuperLikeWalletTransactionModel extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'super_like_wallet_transactions';

    /**
     * @var array
     */
    protected $casts = [
        '_id' => 'integer',
        'status' => 'integer',
        'users__id' => 'integer',
        'quantity' => 'integer',
        'super_like_packages__id' => 'integer',
        'credit_wallet_transactions__id' => 'integer',
    ];

    /**
     * @var array
     */
    protected $fillable = [];
}
