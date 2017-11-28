<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mot extends Model
{
	protected $mot ='mot';
	protected $fillable = ['id', 'name', 'image_son', 'mot_image', 'liste_id'];


	/**
	 * Mot belongs to Liste.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function liste()
	{
		// belongsTo(RelatedModel, foreignKey = liste_id, keyOnRelatedModel = id)
		return $this->belongsToMany('App\Models\Liste');
	}

}
