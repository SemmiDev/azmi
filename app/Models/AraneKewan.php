<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AraneKewan
 * 
 * @property int $id
 * @property string|null $background
 * @property string|null $title
 * @property string|null $description
 * @property string|null $voice
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AraneKewan extends Model
{
	protected $table = 'arane_kewan';

	protected $fillable = [
		'background',
		'title',
		'description',
		'voice'
	];
}
