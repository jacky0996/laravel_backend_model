<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class SerialNumberCate extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'serial_number_cate';
    
}
