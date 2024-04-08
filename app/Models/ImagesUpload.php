<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ImagesUpload extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'images_upload';
    
}
