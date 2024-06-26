<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SnapToken extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
}
