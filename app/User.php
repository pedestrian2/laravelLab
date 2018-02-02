<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $casts = [
        'test_json' => 'array'
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // toJson()時想讓db不存在的accessor欄位出現時可設定於此
    protected $appends = [
        'first_name'
    ];
    
    public function scopeTest($query)
    {
        return $query->where('email', 't');
    }
    
    public function testScope() 
    {
        return self::test()->get();
    }
    
    public function getFirstNameAttribute() 
    {
        return $this->email . $this->name;
    }
    
    public function getNameAttribute()
    {
        return decrypt($this->attributes['name']);
    }
    
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = encrypt($name);
    }
}
