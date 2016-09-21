<?php
namespace App\Http\Controllers\Files;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Files\FilesRepository;

/**
 * Class FilesController
 * @package App\Http\Controllers\Files
 */
class FilesController extends Controller{

    /**
     * Method for uploading a file.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
	{
		$file = $request->file("file");
		$validator = Validator::make((array)$file, ['file'=>'image|min:1|max:4096']);
		if ($validator->fails())
		{
			return response()->json([ 'message' => trans('response.invalid') ], 400);
		}
        $fileRepo = new FilesRepository();
		$fileData = $fileRepo->newUpload($file);
		
		if ($fileData)
		{
			return response()->json($fileData, 200);
		}
		return response()->json(['message'=>'error'], 400);
	}

}
