<?php

namespace Ales0sa\WebPortfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Webs extends Model
{
    protected $fillable = ['name', 'url', 'photo'];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        
}
