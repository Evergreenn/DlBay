<?php

namespace DlBay;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * @package DlBay
 */
class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'file'];
}
