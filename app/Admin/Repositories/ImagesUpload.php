<?php

namespace App\Admin\Repositories;

use App\Models\ImagesUpload as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ImagesUpload extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
