# simple-crud-laravel-json

```php
php artisan make:model Data
```

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model{
    protected $table = 'data';
}
```

```php
php artisan make:controller DataController
```

```php
<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        return Data::all();
    }

    public function create(){ }

    //insert
    public function store(Request $request){
        $data = new Data;
        $data->nama = $request->nama;
        $data->no_telepon = $request->no_telepon;
        $data->save();

        // return "Data berhasil masuk";
        return response()->json(['pesan' => 'Data berhasil masuk', 'status' => true]);
    }

    public function show(Data $data){ }

    public function edit(Data $data){ }

    public function update(Request $request, $id){
        $nama = $request->nama;
        $no_telepon = $request->no_telepon;
        $data = Data::find($id);
        $data->nama=$nama;
        $data->no_telepon=$no_telepon;
        $data->save();

        return response()->json(['pesan' => 'Data berhasil diupdate', 'status' => true]);
        // return "Data bserhasil diupdate";
    }

    //delete
    public function destroy($id){
        $data = Data::find($id);
        $data->delete();

        // return "Data berhasil di delete";
        return response()->json(['pesan' => 'Data berhasil didelete', 'status' => true]);
    }
    //karna kita membuat api, maka yang kita set adalah api.php
}
```

```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data','DataController@index');
Route::post('/data','DataController@store');
Route::put('/data/{id}','DataController@update');
Route::delete('/data/{id}','DataController@destroy');
//cara panngil
//DELETE    http://127.0.0.1:8000/api/data/1 sertakan id pada url
//PUT       http://127.0.0.1:8000/api/data/1 sertakan id pada url
//POST      http://127.0.0.1:8000/api/data jangan lupa isi paramnya dengan ->nama dan ->no_telepon
//GET       http://127.0.0.1:8000/api/data
//karna kita memakai api.php jadi kita sertakan api di urlnya
```

```php
php artisan serve --port=8081
```

---

```
Copyrigh