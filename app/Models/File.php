<?php namespace App\Models\File;

use App\Model;

class File extends Model {

	protected $table = 'files';
	protected $fillable = ['name'];

	public function fileable () {
        return $this->morphTo();
    }

}