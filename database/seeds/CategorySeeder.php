<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $categories = [
            'pizza', 'sushi', 'messicano', 'indiano', 'americano', 'cinese', 'pesce', 'italiano', 'dolce', 'greco'
        ]; */

        $categories = [
            'pizza' => 'https://d1e3z2jco40k3v.cloudfront.net/-/media/drog19/recipe-images/pizza-margherita-con-basilico_2000.jpg?rev=c0ef67e2f4684f9dbbcf1a54188cc5b0&vd=20200707T052020Z&extension=webp&hash=A8628D12F2C4815774B2D70DA6A46E4D',
            'sushi' => 'https://static.gamberorosso.it/2022/01/sushi-768x512.jpeg',
            'messicano' => 'https://www.viaggiaregratis.eu/wp-content/uploads/2020/11/Cucina-Messicana.webp',
            'indiano' => 'https://s3-eu-west-1.amazonaws.com/fratelliorsero/wp-content/uploads/2019/06/10105107/shutterstock_1304751289.jpg',
            'americano' => 'https://www.chefspencil.com/wp-content/uploads/American-Foods.jpg',
            'cinese' => 'https://luxofood.com/wp-content/uploads/2021/12/chinese-5233490_1280.jpg',
            'pesce' => 'https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/727bda84826873.5d6906eb29c0a.jpg',
            'greco' => 'https://www.eatthis.com/wp-content/uploads/sites/4/2020/05/lamb-gyro.jpg?quality=82&strip=1',
            'dolce' => 'https://static01.nyt.com/images/2020/07/10/well/10well-newsletter/10well-newsletter-superJumbo.jpg',
            'kebab' => 'https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2019/05/kebab-fatto-in-casa-1200x675.jpg',
            'fritti' => 'https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/PZGK6PDBSYI6XILXO5S7FGUVEQ.jpg&w=1440',
            'poke' => 'https://cdn.ilclubdellericette.it/wp-content/uploads/2022/05/ricetta-poke-bowl-al-tonno-e-mango-1280x720.jpg',
            'healthy' => 'https://post.healthline.com/wp-content/uploads/2020/09/healthy-eating-ingredients-732x549-thumbnail.jpg',
            'panuozzo' => 'https://primochef.it/wp-content/uploads/2021/11/SH_panuozzo.jpg',
            'siriano' => 'https://kaleela.com/wp-content/uploads/2020/04/Syrian-food.jpg',
            'vegano' => 'https://mcdn.elektronik-star.de/klarstein/landingpage/lp-vegan-week/KS_VEGAN_WEEK_shop_LP_header_desktop_1440_560.jpg',
            'turco' => 'https://nomadsunveiled.com/wp-content/uploads/2022/02/turkish-foods-in-turkey.jpg',
            'argentino' => 'https://nomadparadise.com/wp-content/uploads/2020/06/argentinian_food_08.jpg',
            'africano' => 'https://thekitchencommunity.org/wp-content/uploads/2021/11/shutterstock_1351940339-1200x900.jpg',
        ];

        foreach ($categories as $name => $cover_image) {
            $new_cat = new Category();
            $new_cat->name = $name;
            $new_cat->slug = Str::slug($new_cat->name);
            $new_cat->cover_image = $cover_image;
            $new_cat->save();
        }
    } 
}
