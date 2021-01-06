<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    protected $table = 'files';
    protected $fillable = ['main_pic','desc','price'];

    public function files_gallery() {
        return $this->hasMany(FileGallery::class);
    }

    public function files_contact() {
		  return $this->hasMany(FileContact::class);
    }
}
