<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable =[ 
    //$fillable はモデルに新しいレコードを作成したり、既存のレコードを更新したりする際に、どのカラムに値を代入できるか指定する。
    //ここでは、view側のinput name属性がemailおよびpasswordに代入を許可する。（モデルに対して、これらのカラムへの代入を許可する）                        
        'email',
        'password'
    ];
}
