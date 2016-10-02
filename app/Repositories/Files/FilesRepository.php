<?php

namespace App\Repositories\Files;

use App\Models\Files\FilesModel;

/**
 * Class FilesRepository
 * @package App\Repositories\Files
 */
class FilesRepository {
    /**
     * @param $file
     * @return array|bool
     */
    public function newUpload($file)
	{
		$destinationPath = FilesModel::getUploadPath();

		$file_name = md5(uniqid(rand(), true));
		$file_ext = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$mime = $file->getMimeType();
		$full_path = $destinationPath.$file_name.'.'.$file_ext;
		$url = asset("uploads/".$file_name.'.'.$file_ext);
		//save the file
        $upload = new FilesModel();
		if ($file->move($destinationPath, $file_name.'.'.$file_ext))
		{
            $upload->file_name = $file_name;
            $upload->file_ext = $file_ext;
            $upload->size = $size;
            $upload->mime = $mime;
            $upload->full_path = $full_path;
            $upload->is_image = true;
            $upload->url = $url;
		}
        if ($upload->save())
        {
            return array(
                "id"=>  $upload->id,
                "url"=> $upload->url,
                "full_path" => $upload->full_path,
            );
        }
		return false;
	}

}
