<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Null_;
use DB;
class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id' => '105',
                'title' => 'من نحن',
                'brief' =>  'بلو فلتر هي شركة فلسطينية ذات ملكية فردية مقرها في قطاع غزة فلسطين و تأسست الشركة إنطلاقا من فهم احتياجات السوق المحلية في مجال تنقية مياه الري فهي شركة متتخصصة في معالجة المياه الزراعية حيث قامت الشركة بتطوير مرشح تنقية مياه فعال وخالي من المواد الكيميائية وصديق للبيئة لتنقية المياه الجوفية من النترات والأملاح. تقدم بلو فلتر حلاً بسيطًا ورخيصًا لتنقية المياه الجوفية وجعلها مناسبة للزراعة من خلال استخدام تكنولوجيا خضراء خالية من أي إضافات كيميائية و صديقة للبيئة.',
                'body' => '<p style=\"direction: rtl;\"><strong>بلو فلتر</strong><span style=\"font-weight: 400;\"> هي شركة فلسطينية ذات ملكية مقرها في قطاع غزة فلسطين و تأسست الشركة إنطلاقا من فهم احتياجات السوق المحلية في مجال تنقية مياه الري فهي شركة متتخصصة في معالجة المياه الزراعية حيث قامت الشركة بتطوير مرشح تنقية مياه فعال وخالي من المواد الكيميائية وصديق للبيئة لتنقية المياه الجوفية من النترات والأملاح. تقدم بلو فلتر حلاً بسيطًا ورخيصًا لتنقية المياه الجوفية وجعلها مناسبة للزراعة من خلال استخدام تكنولوجيا خضراء خالية من أي إضافات كيميائية و صديقة للبيئة.</span></p>\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/K6Qn1mU0oyA\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>',
                'featured_image' => Null,
                'user_id' => 1,
                'published' => 1,
                'lang' => 'ar',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);

        DB::table('pages')->insert([
            [
                'id' => '106',
                'title' => 'Toward Clean Water',
                'brief' =>  'Toward clean water',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed mi eget urna faucibus efficitur. Nam vitae dignissim urna. Curabitur eu ipsum pulvinar, egestas massa eu, tincidunt justo. Pellentesque sagittis congue euismod. Sed diam nibh, dictum nec diam eget, interdum elementum justo. Aenean elementum imperdiet libero at congue. Fusce nec augue ut neque volutpat consequat non at ex. Donec sit amet libero lacus. Sed nec faucibus odio.</p>\n<p>Sed id tincidunt diam, sed interdum nunc. Fusce dignissim cursus faucibus. Nunc in porta nisi, sit amet accumsan ligula. In varius elit nec accumsan feugiat. Proin facilisis bibendum viverra. Praesent a ex ut justo commodo ullamcorper fringilla vel magna. Pellentesque malesuada, velit id mollis suscipit, turpis libero aliquam urna, quis bibendum massa dui ut nisi. Pellentesque rutrum quis ex eu aliquam. Quisque eget nisl ligula.</p>\n<p>Fusce eget accumsan metus. Donec pulvinar porta erat, vitae feugiat turpis porttitor sit amet. Proin auctor sed risus et luctus. Pellentesque non augue a leo pretium posuere. Etiam malesuada placerat elit, eu consequat enim pharetra nec. Etiam vulputate scelerisque nisl ut congue. Etiam ut augue quis ipsum venenatis viverra id nec magna. Cras cursus dapibus mauris eget pharetra. Sed ultricies consectetur mi nec efficitur. In rhoncus velit eu scelerisque sollicitudin. Integer neque diam, vulputate interdum consectetur accumsan, pulvinar sed ante.</p>\n<p>Nulla cursus euismod neque, a faucibus nunc tincidunt et. In rutrum et eros a mollis. Sed ut tristique magna. Nunc vel nisi elementum, iaculis eros quis, lobortis ex. Phasellus pulvinar, ex non interdum ultricies, neque elit convallis diam, ut venenatis orci mi ac lorem. Suspendisse eget est justo. Suspendisse ullamcorper et ligula id consectetur. Donec iaculis ultrices massa, in luctus ipsum porttitor eu. Duis volutpat nibh ut mauris feugiat euismod. Nullam cursus in odio non pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum faucibus sodales odio, at dapibus quam imperdiet at.</p>\n<p>Nullam eu egestas diam, nec volutpat ligula. Curabitur aliquet luctus imperdiet. Fusce sed condimentum velit. Sed euismod, elit et aliquet fermentum, ipsum dui pretium justo, non finibus nibh turpis sed nibh. Sed pharetra auctor justo sed suscipit. In sit amet elementum orci, eu porttitor tellus. Nullam ligula elit, egestas vitae tincidunt eu, sollicitudin vel velit.</p>',
                'featured_image' => Null,
                'user_id' => 1,
                'published' => 1,
                'lang' => 'en',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);


        DB::table('pages')->insert([
            [
                'id' => '107',
                'title' => 'Water Tips',
                'brief' =>  'Water Tips',
                'body' => '<p>تجربة اضافة محتوى</p>\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wYiPcSbNWqY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',
                'featured_image' => Null,
                'user_id' => 1,
                'published' => 1,
                'lang' => 'en',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'
            ],
        ]);
    }
}
