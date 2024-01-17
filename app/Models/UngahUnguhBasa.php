<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UngahUnguhBasa
 * 
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $text
 * @property string|null $video
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class UngahUnguhBasa extends Model
{
	protected $table = 'ungah_unguh_basa';

	protected $fillable = [
		'title',
		'description',
		'text',
		'video'
	];
}
