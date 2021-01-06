<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileGallery extends Model
{
    protected $table = 'files_gallery';
    public function files() {
        return $this->belongsTo(FileModel::class);
    }
}
