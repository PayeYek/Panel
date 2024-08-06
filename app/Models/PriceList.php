<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_name',
        'price',
        'production_year',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function priceChanges()
    {
        return $this->hasMany(PriceChange::class)->latest();
    }

    public function updatePrice($newPrice)
    {
        $oldPrice = $this->price;
        $this->price = $newPrice;
        $this->save();

        $changeType = $this->calculateChangeType($oldPrice, $newPrice);

        PriceChange::create([
            'price_list_id' => $this->id,
            'old_price' => $oldPrice,
            'new_price' => $newPrice,
            'change_type' => $changeType,
        ]);
    }

    protected function calculateChangeType($oldPrice, $newPrice)
    {
        if ($newPrice > $oldPrice) {
            return 'increase';
        } elseif ($newPrice < $oldPrice) {
            return 'decrease';
        } else {
            return 'no_change';
        }
    }
}
