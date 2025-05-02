<?php
 
 namespace App\Models;
 
 use App\Models\User;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 
 class Todo extends Model
 {
     use HasFactory;
     protected $fillable = [
         'title',
         'is_done',
         'user_id',
         'is_complete',
     ];
 
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 }