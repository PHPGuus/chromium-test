<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
Browsershot::url('https://itpassion.com')
	->format('A4')
	->timeout(120)
	->showBackground()
	->fullPage()
	->waitUntilNetworkIdle() // Wait until the network is idle
	->setNodeBinary(env('NODE_BINARY', '/usr/local/bin/node'))
	->setNpmBinary(env('NPM_BINARY', '/usr/local/bin/npm'))
	->setChromePath('/usr/bin/chromium-browser')
	->setOption('args', ['--enable-logging', '--v=1', '--disable-web-security','--disable-features=IsolateOrigins,site-per-process'])
	->deviceScaleFactor(2)
->save('itpassion.pdf');
return 'done!';
});
