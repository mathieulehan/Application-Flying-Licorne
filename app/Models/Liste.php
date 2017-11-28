<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Liste extends Model
{
	use SoftDeletes;

	protected $liste ='liste';
	protected $fillable = ['id', 'libelle', 'mode', 'date'];
 	protected $dates = ['deleted_at'];
	public function files()
	{
		return $this->morphMany('App\Models\File\File', 'fileable');
	}
	/**
	* Liste has many mots.
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function mots()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = liste_id, localKey = id)
		return $this->belongsToMany('App\Models\Mot');
	}

	/**
	 * Liste belongs to Modes.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function modes()
	{
		// belongsTo(RelatedModel, foreignKey = mode_id, keyOnRelatedModel = id)
		return $this->belongsTo(Mode::class);
	}
}