<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class NoticeController extends Controller
{
    public function index()
    {
        if($input=Input::all())
        {

			$data = ['webshow' => $input['notice'], 'webstate' => config('web.webstate')];
			$config='<?php' . PHP_EOL
                .'return '.var_export($data, true).';';
            $path=storage_path('app/web.php');
            file_put_contents($path, $config);
            return view('admin.changestate');
        }
        return view('admin.notice');
    }
}
