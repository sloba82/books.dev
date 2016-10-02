<?php

namespace App\Models\Files;
use Illuminate\Database\Eloquent\Model;


/**
 * Class FilesModel
 * @package App\Models\Files
 */
class FilesModel extends Model{
    /**
     * @var string $table
     */
    protected $table = "files";
    /**
     * @var array $fillable
     */
    protected $fillable = [
		'file_name',
		'file_ext',
		'size',
		'mime',
		'full_path',
		'url',
		'is_image'
	];


    /**
     * Method for getting upload path.
     *
     * @return string
     */
    public static function getUploadPath()
	{
		if (!file_exists(public_path().'/uploads/'))
		{
			mkdir(public_path().'/uploads/', 777);
		}
		return public_path().'/uploads/';
	}
	
}
