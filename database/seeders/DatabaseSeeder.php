<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        
        DB::table('protypes')->insert([
            ['type_name' => 'Áo','type_image' => 'Wooldouble-breastedjacket.jpg'],
            ['type_name' => 'Quần','type_image' => '15242358339.jpg_resize400x400.jpg'],
            ['type_name' => 'Ví','type_image' => 'SLENDERWALLET.jpg'],
            ['type_name' => 'Giày','type_image' => 'giaygucci.jpg'],
            ['type_name' => 'Giỏ xách','type_image' => 'tui-xach-chanel-coco-den-size-225-0-560.jpg']
        ]);
        DB::table('manufactures')->insert([
            ['manu_name' => 'Gucci'],
            ['manu_name' => 'Louis Vuitton'],
            ['manu_name' => 'Dior'],
            ['manu_name' => 'Hermès'],
            ['manu_name' => 'Chanel']
        ]);
        DB::table('products')->insert([
            ['name' => 'Wool double-breasted jacket',
            'image' => 'Wooldouble-breastedjacket.jpg',
            'price' => '94166750',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '1',
            'description' => 'áo limited'],


            ['name' => 'Knit striped cotton jumper',
            'image' => 'Knitstripedcottonjumper.jpg',
            'price' => '33302875',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '2',
            'description' => 'Áo Knit striped cotton jumper'],


            ['name' => 'BELTED PARKA',
            'image' => 'BELTEDPARKA.jpg',
            'price' => '98000000',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '2',
            'description' => 'áo BELTED PARKA nổi tiếng'],


            ['name' => 'SLENDER WALLET',
            'image' => 'SLENDERWALLET.jpg',
            'price' => '11024400',
            'manu_id' => '2',
            'type_id' => '3',
            'quantity' => '5',
            'description' => 'Ví VL'],


            ['name' => 'TWIST BELT CHAIN WALLET',
            'image' => 'TWISTBELTCHAINWALLET.jpg',
            'price' => '45016300',
            'manu_id' => '2',
            'type_id' => '3',
            'quantity' => '1',
            'description' => 'Ví limited'],

            ['name' => 'Giày nam Gucci Ace họa tiết kẻ xanh sẫm GNGC13',
            'image' => 'giaygucci.jpg',
            'price' => '2190000',
            'manu_id' => '1',
            'type_id' => '4',
            'quantity' => '1',
            'description' => 'Giày nam Gucci xịn'],

            ['name' => 'Túi xách nam Louis Vuitton like au họa tiết caro ghi đen TXLV16',
            'image' => 'tuigucci.jpg',
            'price' => '3990000',
            'manu_id' => '2',
            'type_id' => '5',
            'quantity' => '1',
            'description' => 'túi nam rộng rãi '],

            ['name' => 'Giày nam Dior x Air Jordan 1 High CN8607-002',
            'image' => 'giaydior.jpg',
            'price' => '319000000',
            'manu_id' => '3',
            'type_id' => '4',
            'quantity' => '1',
            'description' => 'Giày thoáng mát '],

            ['name' => 'DAYDREAM SNEAKER',
            'image' => 'sneaker.jpg',
            'price' => '25000000',
            'manu_id' => '4',
            'type_id' => '4',
            'quantity' => '1',
            'description' => 'Giày thoáng siêu trắng '],

            ['name' => 'Túi Hermes Picotin 18 Blue Frida Rose Mexico Khóa Bạc',
            'image' => 'tuihermes.jpg',
            'price' => '88000000',
            'manu_id' => '4',
            'type_id' => '5',
            'quantity' => '1',
            'description' => 'Túi đa dụng '],
            
            ['name' => 'Giày Gucci Ong “Black Bee”',
            'image' => 'giay-gucci-ong-black-bee-sieu-cap-like-authentic-19-1.jpg',
            'price' => '98000000',
            'manu_id' => '1',
            'type_id' => '4',
            'quantity' => '2',
            'description' => 'giày gucci ong black bee siêu cấp like authentic '],

            ['name' => 'Ví Dior Homme Bee Bifold Wallet Màu Đen”',
            'image' => 'vi-dior-homme-bee-bifold-wallet-mau-den-620c7fdcc0f78-16022022113852.jpg',
            'price' => '68000000',
            'manu_id' => '3',
            'type_id' => '3',
            'quantity' => '1',
            'description' => 'Ví Dior Homme Bee Bifold Wallet Màu Đen là chiếc ví dành cho nam đến từ thương hiệu Dior nổi tiếng. Sở hữu gam màu đen thanh lịch, cùng chất liệu cao cấp chiếc ví Dior Homme Bee Bifold Wallet được nhiều tín đồ thời trang săn đón. '],
           
            ['name' => 'Quần Jean Hermes Nam',
            'image' => '15242358339.jpg_resize400x400.jpg',
            'price' => '57000000',
            'manu_id' => '4',
            'type_id' => '2',
            'quantity' => '1',
            'description' => 'Mang lại cho người mặc sự thoải mái, trẻ trung,Chất liệu jeans mềm mại, kiểu dáng sang trọng làm tôn lên vẻ lịch lãm, sang trọng'],

            ['name' => 'Túi Xách Chanel Coco Mini Đen',
            'image' => 'tui-xach-chanel-coco-den-size-225-0-560.jpg',
            'price' => '34000000',
            'manu_id' => '5',
            'type_id' => '5',
            'quantity' => '1',
            'description' => ' Chất liệu da chính hãng. form dáng chuẩn auth.
             Cam kết hàng VVIP sao chép tỉ mĩ, tinh xảo, chất lượng '],
 
          ['name' => 'Áo thun thời trang siêu cấp Louis Vuitton',
            'image' => 'd136b4ba68a95a69399a275782207d3dd0f06605_0.jpg',
            'price' => '33000000',
            'manu_id' => '2',
            'type_id' => '1',
            'quantity' => '1',
            'description' => 'Xa xỉ, đẳng cấp, thời thượng và đắt đỏ là những mỹ từ dành cho thương hiệu thời trang đình đám thế giới Louis Vuitton (LV).'],
        ]);
        DB::table('role_user')->insert([
            ['role_id' => '1',
            'user_id' => '1',
            'user_type'=>'App\Models\User'],

            ['role_id' => '2',
            'user_id' => '2',
            'user_type'=>'App\Models\User'],
        ]);
        DB::table('users')->insert([
            ['name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$5rGDc6kYs14aTtFZQ/nTF.PFSZ4GYlNG8AuUN8pCuL6RIfNM2qk1m'],

            ['name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$/HsaHfb//cCEZ0qcc1Q5mucooyBpPq.aMQRKT8BID4uGzjZqjb2Yq'],
        ]);
    }
}
