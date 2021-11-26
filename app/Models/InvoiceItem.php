<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function taxes()
    {
        return $this->hasMany(InvoiceItemTax::class, 'invoice_item_id', 'id');
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (double) $value;
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = (double) $value;
    }

    public function setTaxAttribute($value)
    {
        $this->attributes['tax'] = (double) $value;
    }
}