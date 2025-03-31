<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Illuminate\Support\Facades\File as HandleFile;

class FileUploadController extends Controller
{
	function index()
	{
		// $file = File::find(6);
		// HandleFile::delete(storage_path($file->file_path));
		// $file->delete();

		$files = File::all();
		return view('file-upload', ['files' => $files]);
	}

	function store(Request $request)
	{

		// file validation
		$request->validate([
			'file' => ['required', 'image']
		]);

		// $file = Storage::disk('local')->put('/', $request->file('file'));
		// $file = $request->file('file')->store('/', 'local');

		$file = $request->file('file');
		$customName = 'laravel_' . Str::uuid();
		$ext = $file->getClientOriginalExtension();
		$fileName = $customName . '.' . $ext;

		$path = $file->storeAs('/', $fileName, 'dir_public');

		$fileStore = new File();
		$fileStore->file_path = '/uploads/' . $path;
		$fileStore->save();

		return redirect()->route('home');
	}

	function download()
	{
		return Storage::disk('public')->download('5fXWKO3r8xwIUrZASzTo9qEF7bZFofCwjJWfdU4P.jpg');
	}
}
