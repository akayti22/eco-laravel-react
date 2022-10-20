<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    $color = ['red','green','blue','black','white'];
    foreach($color as $c){
        Color::create([
            'slug' => uniqid() . $c,
            'name' => $c
        ]);
    }

    $brand = ['huawei','apple','xiaomi','samsung','zte'];
    foreach($brand as $b){
        Brand::create([
            'slug' => uniqid() . $b,
            'name' => $b
        ]);
    }

    $category = ['Electronic','Shirt','Accessory','Hat',"Mobile Phone"];
    foreach($category as $c){
        Category::create([
            'slug' => uniqid().$c,
            'name' => $c,
            'product_count' => 10,
        ]);
    }

    User::create([
        'name' => "mg mg",
        'email' => "mgmg@a.com",
        'password' => Hash::make('password')
    ]);

    Admin::create([
        'name' => "Admin",
        'email' => "admin@a.com",
        'password' => Hash::make('password')
    ]);

    Supplier::create([
        'name' => 'Supplier One',
        'phone' => '09',
        'image' => 'user.png'
    ]);

    }
}
