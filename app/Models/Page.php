<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'page';
    
}
