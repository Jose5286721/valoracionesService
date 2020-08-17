<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Valoration extends Model {
	protected $fillable = [
		"usuario_id", "nota", "producto_id",
	];
}
