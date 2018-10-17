<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangestateController extends Controller
{
    public function index()
    {
		
		$data = ['webshow' => config('web.webshow'), 'webstate' => !config('web.webstate')];
		
		$config='<?php' . PHP_EOL
            .'return '.var_export($data, true).';';
        $path=storage_path('app/web.php');
        file_put_contents($path, $config);
        return view('admin.changestate');
    }
}
