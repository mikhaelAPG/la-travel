<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileContact extends Model
{
    protected $table = 'files_contact';
    public function files() {
        return $this->belongsTo(FileModel::class);
    }
}
