<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(["productcategory","product","productprice","picture","productpicture","promotions"]);
    }
}
// procuct category
class productcategory extends Seeder
{
    public function run()
    {
    	// thêm vào database
    	DB::table("productcategory")->insert([
    		array("Name" =>"T-SHIRT" ,"Description"=>"","IsDelete"=>0),
            array("Name" =>"SHIRT" ,"Description"=>"","IsDelete"=>0),
            array("Name" =>"COAT" ,"Description"=>"","IsDelete"=>0),
            array("Name" =>"TROUSERS" ,"Description"=>"","IsDelete"=>0),
            array("Name" =>"SPORT CLOTHING" ,"Description"=>"","IsDelete"=>0),
            array("Name" =>"VEST/BLAZER COAT" ,"Description"=>"","IsDelete"=>0),
    	]);
    }
}
// product
class product extends Seeder
{
    public function run()
    {
        // thêm vào database
        DB::table("product")->insert([
            array("ID_ProductCategory" =>"1" ,"Name"=>"Sơ mi Tay Dài Đen Slim Fit Japanese","Description"=>"Chất sơ mi Nhật, vải mềm, mịn tạo cảm giác thoải mái cho người mặc.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi tay dài 2 lớp trắng","Description"=>"Chất liệu lụa, vải mỏng, mềm mịn.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi tay ngắn cổ lông vũ","Description"=>"Chất liệu vải voan cao cấp giúp người mặc cảm thấy thoáng mát, thoải mái.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi tay ngắn xếp ly xám","Description"=>"Chất liệu voan cao cấp, vải mỏng, mềm, mịn giúp người mặc cảm thấy thoải mái, thoáng mát.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi Katto trắng","Description"=>"Chất liệu cotton, mềm mịn, thấm hút mồ hôi tốt.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi họa tiết 1B trắng mũi tên","Description"=>"Chất liệu voan cát cao cấp giúp người mặc cảm thấy thoải mái. thoáng mát.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi 1B trắng","Description"=>"Được may với 2 loại chất liệu: voan cát và lụa. Cả 2 chất liệu đều rất mỏng và mềm mịn.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi tay ngắn form rộng trắng sọc viền đen","Description"=>"Chất liệu lụa Nhật cao cấp.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi tay ngắn form rộng xanh navy viền trắng","Description"=>"Chất vải kate Nhật cao cấp. Vải mỏng, mềm mịn , độ thấm hút mồ hôi tốt mang ại cảm giác thoái mái thoáng mát cho người mặc.","IsDelete"=>0),
            array("ID_ProductCategory" =>"1" ,"Name"=>"Áo sơ mi tay dài cổ trụ xanh navy chấm bi","Description"=>"Fom châu Á, chất vải bố, dày giúp làm đứng fom áo hơn.","IsDelete"=>0),
            array("ID_ProductCategory" =>"3" ,"Name"=>"Men's Grain Leather","Description"=>"","IsDelete"=>0),
            array("ID_ProductCategory" =>"3" ,"Name"=>"Men's Muted Nylon","Description"=>"","IsDelete"=>0),
            array("ID_ProductCategory" =>"3" ,"Name"=>"PAIGE Men's Kenton Filled","Description"=>"","IsDelete"=>0),
            array("ID_ProductCategory" =>"3" ,"Name"=>"OBEY Men's Soto Varsity","Description"=>"","IsDelete"=>0),
        ]);
    }
}
// procuct price
class productprice extends Seeder
{
    public function run()
    {
        // thêm vào database
        DB::table("productprice")->insert([
            array("Price" =>"450000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"1","Discount"=>10),
            array("Price" =>"440000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"2","Discount"=>10),
            array("Price" =>"320000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"3","Discount"=>10),
            array("Price" =>"320000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"4","Discount"=>10),
            array("Price" =>"430000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"5","Discount"=>10),
            array("Price" =>"440000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"6","Discount"=>10),
            array("Price" =>"460000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"7","Discount"=>10),
            array("Price" =>"440000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"8","Discount"=>10),
            array("Price" =>"440000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"9","Discount"=>10),
            array("Price" =>"400000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"10","Discount"=>10),
            array("Price" =>"400000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"11","Discount"=>10),
            array("Price" =>"400000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"12","Discount"=>10),
            array("Price" =>"400000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"13","Discount"=>10),
            array("Price" =>"400000" ,"StartDate"=>"2017-11-01","EndDate"=>null,"IsDelete"=>0,"ID_Product"=>"14","Discount"=>10),
        ]);
    }
}
// Picture
class picture extends Seeder
{
    public function run()
    {
        // thêm vào database
        DB::table("picture")->insert([
            array("Url" =>"products/1.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/2.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/3.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/4.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/5.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/6.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/7.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/8.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/9.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/10.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/11.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/12.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/13.jpg" ,"IsDelete"=>0),
            array("Url" =>"products/14.jpg" ,"IsDelete"=>0),
        ]);
    }
}
// Product Picture
class productpicture extends Seeder
{
    public function run()
    {
        // thêm vào database
        DB::table("productpicture")->insert([
            array("ID_Picture" =>"1",'ID_Product'=>1,"IsDelete"=>0),
            array("ID_Picture" =>"2",'ID_Product'=>2,"IsDelete"=>0),
            array("ID_Picture" =>"3",'ID_Product'=>3,"IsDelete"=>0),
            array("ID_Picture" =>"4",'ID_Product'=>4,"IsDelete"=>0),
            array("ID_Picture" =>"5",'ID_Product'=>5,"IsDelete"=>0),
            array("ID_Picture" =>"6",'ID_Product'=>6,"IsDelete"=>0),
            array("ID_Picture" =>"7",'ID_Product'=>7,"IsDelete"=>0),
            array("ID_Picture" =>"8",'ID_Product'=>8,"IsDelete"=>0),
            array("ID_Picture" =>"9",'ID_Product'=>9,"IsDelete"=>0),
            array("ID_Picture" =>"10",'ID_Product'=>10,"IsDelete"=>0),
            array("ID_Picture" =>"11",'ID_Product'=>11,"IsDelete"=>0),
            array("ID_Picture" =>"12",'ID_Product'=>12,"IsDelete"=>0),
            array("ID_Picture" =>"13",'ID_Product'=>13,"IsDelete"=>0),
            array("ID_Picture" =>"14",'ID_Product'=>14,"IsDelete"=>0),
        ]);
    }
}
class promotions extends Seeder{
    public function run()
    {
        // thêm vào database
        DB::table("picture")->insert([
            array("Url" =>"promotions/1.jpg" ,"IsDelete"=>0),
            array("Url" =>"promotions/2.jpg" ,"IsDelete"=>0),
            array("Url" =>"promotions/3.jpg" ,"IsDelete"=>0),
        ]);
        // thêm vào database
        DB::table("promotion")->insert([
            array('EndDate'=>null,'StartDate'=>"2017-01-01",'BasePurchase'=>200000,'Discount'=>10,"Name" =>"1",'Description'=>"","IsDelete"=>0),
            array('EndDate'=>null,'StartDate'=>"2017-02-01",'BasePurchase'=>100000,'Discount'=>10,"Name" =>"2",'Description'=>"","IsDelete"=>0),
            array('EndDate'=>null,'StartDate'=>"2017-03-01",'BasePurchase'=>200000,'Discount'=>10,"Name" =>"3",'Description'=>"","IsDelete"=>0),
        ]);
        DB::table("promotionpicture")->insert([
            array('ID_Picture'=>15,'ID_Promotion'=>"1","IsDelete"=>0),
            array('ID_Picture'=>16,'ID_Promotion'=>"2","IsDelete"=>0),
            array('ID_Picture'=>17,'ID_Promotion'=>"3","IsDelete"=>0),
        ]);
    }
}