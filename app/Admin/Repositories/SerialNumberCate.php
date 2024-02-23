<?php

namespace App\Admin\Repositories;

use App\Models\SerialNumberCate as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SerialNumberCate extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
