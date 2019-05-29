<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['01', 'Hà Nội', 'Thành Phố'],
            ['02', 'Hà Giang', 'Tỉnh'],
            ['04', 'Cao Bằng', 'Tỉnh'],
            ['06', 'Bắc Kạn', 'Tỉnh'],
            ['08', 'Tuyên Quang', 'Tỉnh'],
            ['10', 'Lào Cai', 'Tỉnh'],
            ['11', 'Điện Biên', 'Tỉnh'],
            ['12', 'Lai Châu', 'Tỉnh'],
            ['14', 'Sơn La', 'Tỉnh'],
            ['15', 'Yên Bái', 'Tỉnh'],
            ['17', 'Hòa Bình', 'Tỉnh'],
            ['19', 'Thái Nguyên', 'Tỉnh'],
            ['20', 'Lạng Sơn', 'Tỉnh'],
            ['22', 'Quảng Ninh', 'Tỉnh'],
            ['24', 'Bắc Giang', 'Tỉnh'],
            ['25', 'Phú Thọ', 'Tỉnh'],
            ['26', 'Vĩnh Phúc', 'Tỉnh'],
            ['27', 'Bắc Ninh', 'Tỉnh'],
            ['30', 'Hải Dương', 'Tỉnh'],
            ['31', 'Hải Phòng', 'Thành Phố'],
            ['33', 'Hưng Yên', 'Tỉnh'],
            ['34', 'Thái Bình', 'Tỉnh'],
            ['35', 'Hà Nam', 'Tỉnh'],
            ['36', 'Nam Định', 'Tỉnh'],
            ['37', 'Ninh Bình', 'Tỉnh'],
            ['38', 'Thanh Hóa', 'Tỉnh'],
            ['40', 'Nghệ An', 'Tỉnh'],
            ['42', 'Hà Tĩnh', 'Tỉnh'],
            ['44', 'Quảng Bình', 'Tỉnh'],
            ['45', 'Quảng Trị', 'Tỉnh'],
            ['46', 'Thừa Thiên Huế', 'Tỉnh'],
            ['48', 'Đà Nẵng', 'Thành Phố'],
            ['49', 'Quảng Nam', 'Tỉnh'],
            ['51', 'Quảng Ngãi', 'Tỉnh'],
            ['52', 'Bình Định', 'Tỉnh'],
            ['54', 'Phú Yên', 'Tỉnh'],
            ['56', 'Khánh Hòa', 'Tỉnh'],
            ['58', 'Ninh Thuận', 'Tỉnh'],
            ['60', 'Bình Thuận', 'Tỉnh'],
            ['62', 'Kon Tum', 'Tỉnh'],
            ['64', 'Gia Lai', 'Tỉnh'],
            ['66', 'Đắk Lắk', 'Tỉnh'],
            ['67', 'Đắk Nông', 'Tỉnh'],
            ['68', 'Lâm Đồng', 'Tỉnh'],
            ['70', 'Bình Phước', 'Tỉnh'],
            ['72', 'Tây Ninh', 'Tỉnh'],
            ['74', 'Bình Dương', 'Tỉnh'],
            ['75', 'Đồng Nai', 'Tỉnh'],
            ['77', 'Bà Rịa - Vũng Tàu', 'Tỉnh'],
            ['79', 'Hồ Chí Minh', 'Thành Phố'],
            ['80', 'Long An', 'Tỉnh'],
            ['82', 'Tiền Giang', 'Tỉnh'],
            ['83', 'Bến Tre', 'Tỉnh'],
            ['84', 'Trà Vinh', 'Tỉnh'],
            ['86', 'Vĩnh Long', 'Tỉnh'],
            ['87', 'Đồng Tháp', 'Tỉnh'],
            ['89', 'An Giang', 'Tỉnh'],
            ['91', 'Kiên Giang', 'Tỉnh'],
            ['92', 'Cần Thơ', 'Thành Phố'],
            ['93', 'Hậu Giang', 'Tỉnh'],
            ['94', 'Sóc Trăng', 'Tỉnh'],
            ['95', 'Bạc Liêu', 'Tỉnh'],
            ['96', 'Cà Mau', 'Tỉnh'],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table('provinces')->truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($provinces as $province) {
            \App\Models\Province::create([
                'id' => $province['0'],
                'name' => $province['1'],
            ]);
        }
    }
}
