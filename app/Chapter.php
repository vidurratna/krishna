<?php

namespace App;

use App\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    use UsesUuid;

    protected $guarded = [];

    protected $casts = [
        'active' => 'bool',
    ];


    public function route($name, $parameters = []) {
        return 'http://' . $this->subdomain . app('url')->route($name, $parameters, false);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function address()
    {
        return $this->morphToMany('App\Address', 'addressable');
    }
    
    public function display()
    {
        return "ERROR: contact admin - error in chapter displayer.";
    }
}
