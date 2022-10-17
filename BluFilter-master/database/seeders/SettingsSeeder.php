<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'id' => '1',
                'key' => 'general',
                'value' =>  '{"site_name":"BluFilter","site_url":"https:\/\/bluefilter.ps\/","site_description":"This is description","site_locale":"en","site_author":"Element Media","coming_soon":false,"back_date":"Blue Filter"}',


            ],
        ]);
        DB::table('settings')->insert([
            [
                'id' => '2',
                'key' => 'mail',
                'value' =>  '{"host":"bluefilter.ps","username":"noreply@bluefilter.ps","password":"{gVJgi_L{3r#","encryption":"ssl","port":465,"reply_to":"noreply@bluefilter.ps"}',


            ],
        ]);

        DB::table('settings')->insert([
            [
                'id' => '3',
                'key' => 'homepage',
                'value' =>  '{"Home_Page_Title_En":"BlueFilter where all water professionals gathers in one place  ",
                "Home_Page_Title_Ar":"تطبيق بلو فلتر .. منصة تجمع كافة متخصصي المياه في مكان واحد!",
                "Home_Page_Description_Ar":"بلو فيلتر هي شركة لتنقية المياه مقرها في قطاع غزة وهي متخصصة في معالجة المياه الزراعية",
                "Home_Page_Description_En":"Blue Filter is a water purification company headquartered in Gaza strip that specializes in agricultural water treatment.",
                "App_Store":"https:\\/\\/translate.google.com\\/?sl=ar&tl=en&text=%D8%B4%D8%B1%D8%AD%20%D8%B9%D9%86%20%D8%A7%D9%84%D8%AA%D8%B7%D8%A8%D9%8A%D9%82%20%D9%81%D9%8A%20%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9%20%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9%20%D8%A8%D8%A7%D9%84%D9%84%D8%BA%D8%A9%20%D8%A7%D9%84%D8%A3%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9&op=translate",
                "Google_App_Link":"https:\\/\\/translate.google.com\\/?sl=ar&tl=en&text=%D8%B4%D8%B1%D8%AD%20%D8%B9%D9%86%20%D8%A7%D9%84%D8%AA%D8%B7%D8%A8%D9%8A%D9%82%20%D9%81%D9%8A%20%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9%20%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9%20%D8%A8%D8%A7%D9%84%D9%84%D8%BA%D8%A9%20%D8%A7%D9%84%D8%A3%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9&op=translate",
                "download_counter":"2575"}'

            ],
        ]);

        DB::table('settings')->insert([
            [
                'id' => '4',
                'key' => 'howtouse',
                'value' =>  '{"howtouse1name_En":"Download the app  ","howtouse1info_En":"You can download it from the App Store or the Play Store  ","howtouse1name_Ar":"\u062a\u062d\u0645\u064a\u0644 \u0627\u0644\u062a\u0637\u0628\u064a\u0642   ","howtouse1info_Ar":"\u0642\u0645 \u0628\u062a\u062d\u0645\u064a\u0644 \u0627\u0644\u062a\u0637\u0628\u064a\u0642 \u0645\u0646 \u0627\u0644\u0645\u062a\u062c\u0631 \u0627\u0644\u062e\u0627\u0635 \u0628\u062c\u0648\u0627\u0644\u0643 ","howtouse2name_En":"Create an Account  ","howtouse2info_En":"Create a new account for you and fill your informationiy  ","howtouse2name_Ar":"\u0625\u0646\u0634\u0627\u0621 \u062d\u0633\u0627\u0628 \u0644\u0643  ","howtouse2info_Ar":"\u0642\u0645 \u0628\u0639\u0645\u0644 \u062d\u0633\u0627\u0628 \u062c\u062f\u064a\u062f \u062e\u0627\u0635 \u0628\u0643 \u0644\u0633\u0647\u0648\u0644\u0629 \u0627\u0644\u062a\u0639\u0627\u0645\u0644 \u0648\u0627\u0644\u062a\u0648\u0627\u0635\u0644  ","howtouse3name_En":"Do Search  ","howtouse3info_En":"Start searching for the service providor you want from our big database  ","howtouse3name_Ar":"\u0627\u0644\u0628\u062d\u062b \u0639\u0646 \u0645\u0642\u062f\u0645 \u062e\u062f\u0645\u0629   ","howtouse3info_Ar":"\u0642\u0645 \u0628\u0627\u0644\u0628\u062d\u062b \u0639\u0646 \u0645\u0642\u062f\u0645 \u0627\u0644\u062e\u062f\u0645\u0629 \u0627\u0644\u0630\u064a \u062a\u062d\u062a\u0627\u062c\u0647 \u0645\u0646 \u0642\u0627\u0639\u062f\u0629 \u0628\u064a\u0627\u0646\u0627\u062a \u0643\u0628\u064a\u0631\u0629  ","howtouse4name_En":"Direct Contact  ","howtouse4info_En":"Contact the provider directly for easier and faster way to get what you want  oriana","howtouse4name_Ar":"\u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0627\u0644\u0645\u0628\u0627\u0634\u0631  ","howtouse4info_Ar":"\u064a\u0645\u0643\u0646\u0643 \u0645\u0639\u0631\u0641\u0629 \u0643\u0627\u0641\u0629 \u062a\u0641\u0627\u0635\u064a\u0644 \u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0645\u0639 \u0645\u0642\u062f\u0645 \u0627\u0644\u062e\u062f\u0645\u0629 \u0648\u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0627\u0644\u0645\u0628\u0627\u0634\u0631 \u0645\u0639\u0647  "}'
            ],

        ]);

        DB::table('settings')->insert([
            [
                'id' => '5',
                'key' => 'vision',
                'value' =>  '{"Vision_Title_En":"The Very Best in Water Treatment  ","Vision_Title_Ar":"\u0627\u0644\u0623\u0641\u0636\u0644 \u0641\u064a \u0645\u0639\u0627\u0644\u062c\u0629 \u0627\u0644\u0645\u064a\u0627\u0647  ","Vsion_Description_En":"Our vision is to become a recognized and respected leader in the community we serve through delivering \u201cThe Very Best in Water Treatment\u201d for our customers and environment.  ","Vsion_Description_Ar":"\u062a\u062a\u0645\u062b\u0644 \u0631\u0624\u064a\u062a\u0646\u0627 \u0641\u064a \u0623\u0646\u0646\u0627 \u0646\u0637\u0645\u062d \u0628\u0623\u0646 \u0646\u0643\u0648\u0646 \u0627\u0644\u0631\u064a\u0627\u062f\u064a\u064a\u0646 \u0641\u064a \u0645\u0639\u0627\u0644\u062c\u0629 \u0648 \u062a\u0646\u0642\u064a\u0629 \u0627\u0644\u0645\u064a\u0627\u0647 \u0648\u0646\u0633\u0627\u0647\u0645 \u0645\u0633\u0627\u0647\u0645\u0629 \n \u0641\u0639\u0627\u0644\u0629 \u0641\u064a \u0627\u0644\u0645\u062c\u062a\u0645\u0639 \u0627\u0644\u0630\u064a \u0646\u062e\u062f\u0645\u0647 \u0645\u0646 \u062e\u0644\u0627\u0644 \u062a\u0642\u062f\u064a\u0645 \u0627\u0644\u0623\u0641\u0636\u0644 \u0641\u064a \u0645\u0639\u0627\u0644\u062c\u0629 \u0627\u0644\u0645\u064a\u0627\u0647 \u0644\u0639\u0645\u0644\u0627\u0626\u0646\u0627 \u0648\u0628\u064a\u0626\u062a\u0646\u0627. "}',

            ],
        ]);

        DB::table('settings')->insert([
            [
                'id' => '6',
                'key' => 'features',
                'value' =>  '{"Main_Feature_Title2_En":"Google Maps Integration  ","Main_Feature_Title2_Ar":"\u062f\u0645\u062c \u0645\u0639 \u062e\u0631\u0627\u0626\u0637 \u062c\u0648\u062c\u0644 ","Main_Feature_Title1_En":"Ease and Smoothness  ","Main_Feature_Title1_Ar":"\u0627\u0644\u0633\u0647\u0648\u0644\u0629 \u0648\u0627\u0644\u0633\u0644\u0627\u0633\u0629   ","Feature_Title1_En":"Easy Communication ","Feature_Description1_En":"Find your providor and contact them directly without any third party medium ","Feature_Title1_Ar":"\u0633\u0647\u0648\u0644\u0629 \u0627\u0644\u062a\u0648\u0627\u0635\u0644 ","Feature_Description1_Ar":"\u064a\u0645\u0643\u0646\u0643 \u0645\u0639\u0631\u0641\u0629 \u0645\u0639\u0644\u0648\u0645\u0627\u062a \u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0628\u0645\u0642\u062f\u0645 \u0627\u0644\u062e\u062f\u0645\u0629 \u0648\u0627\u0644\u0625\u062a\u0635\u0627\u0644 \u0645\u0628\u0627\u0634\u0631\u0629 ","Feature_Title2_En":"Find the closest to you ","Feature_Description2_En":"You can find the closest service providers to you and contact them ","Feature_Title2_Ar":"\u0625\u064a\u062c\u0627\u062f \u0627\u0644\u0623\u0642\u0631\u0628 \u0644\u0643 ","Feature_Description2_Ar":"\u064a\u0645\u0643\u0646\u0643 \u0645\u0639\u0631\u0641\u0629 \u0645\u0646 \u0623\u0642\u0631\u0628 \u0645\u0642\u062f\u0645\u064a \u0627\u0644\u062e\u062f\u0645\u0627\u062a \u0625\u0644\u064a\u0643 \u0648\u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0645\u0639\u0647\u0645  ","Feature_Title3_En":"Important Tips and Info ","Feature_Description3_En":"We share important tips and information related to water  ","Feature_Title3_Ar":"\u0646\u0635\u0627\u0626\u062d \u0648\u0645\u0639\u0644\u0648\u0645\u0627\u062a \u0645\u0647\u0645\u0629 ","Feature_Description3_Ar":"\u0646\u0634\u0627\u0631\u0643\u0643\u0645 \u0646\u0635\u0627\u0626\u062d \u0648\u0645\u0639\u0644\u0648\u0645\u0627\u062a \u0645\u0647\u0645\u0629 \u0628\u0634\u0643\u0644 \u062f\u0648\u0631\u064a \u062e\u0627\u0635\u0629 \u0628\u0627\u0644\u0645\u064a\u0627\u0647 "}',

            ],
        ]);

        DB::table('settings')->insert([
            [
                'id' => '7',
                'key' => 'aboutus',
                'value' =>  '{"about_us_En":"Blue Filter is a Palestinian-owned company based in the Gaza Strip, Palestine. The company was established based on understanding the needs of the local market in the field of irrigation water purification. It is a company specialized in agricultural water treatment. The company has developed an effective, chemical-free and environmentally friendly water purification filter to purify groundwater. of nitrates and salts. Blue Filter offers a simple and cheap solution to purify groundwater and make it suitable for agriculture by using green technology that is free of any chemical additives and is environmentally friendly. ","about_us_Ar":"\u0628\u0644\u0648 \u0641\u0644\u062a\u0631 \u0647\u064a \u0634\u0631\u0643\u0629 \u0641\u0644\u0633\u0637\u064a\u0646\u064a\u0629 \u0630\u0627\u062a \u0645\u0644\u0643\u064a\u0629 \u0645\u0642\u0631\u0647\u0627 \u0641\u064a \u0642\u0637\u0627\u0639 \u063a\u0632\u0629 \u0641\u0644\u0633\u0637\u064a\u0646 \u0648 \u062a\u0623\u0633\u0633\u062a \u0627\u0644\u0634\u0631\u0643\u0629 \u0625\u0646\u0637\u0644\u0627\u0642\u0627 \u0645\u0646 \u0641\u0647\u0645 \u0627\u062d\u062a\u064a\u0627\u062c\u0627\u062a \u0627\u0644\u0633\u0648\u0642 \u0627\u0644\u0645\u062d\u0644\u064a\u0629 \u0641\u064a \u0645\u062c\u0627\u0644 \u062a\u0646\u0642\u064a\u0629 \u0645\u064a\u0627\u0647 \u0627\u0644\u0631\u064a \u0641\u0647\u064a \u0634\u0631\u0643\u0629 \u0645\u062a\u062a\u062e\u0635\u0635\u0629 \u0641\u064a \u0645\u0639\u0627\u0644\u062c\u0629 \u0627\u0644\u0645\u064a\u0627\u0647 \u0627\u0644\u0632\u0631\u0627\u0639\u064a\u0629 \u062d\u064a\u062b \u0642\u0627\u0645\u062a \u0627\u0644\u0634\u0631\u0643\u0629 \u0628\u062a\u0637\u0648\u064a\u0631 \u0645\u0631\u0634\u062d \u062a\u0646\u0642\u064a\u0629 \u0645\u064a\u0627\u0647 \u0641\u0639\u0627\u0644 \u0648\u062e\u0627\u0644\u064a \u0645\u0646 \u0627\u0644\u0645\u0648\u0627\u062f \u0627\u0644\u0643\u064a\u0645\u064a\u0627\u0626\u064a\u0629 \u0648\u0635\u062f\u064a\u0642 \u0644\u0644\u0628\u064a\u0626\u0629 \u0644\u062a\u0646\u0642\u064a\u0629 \u0627\u0644\u0645\u064a\u0627\u0647 \u0627\u0644\u062c\u0648\u0641\u064a\u0629 \u0645\u0646 \u0627\u0644\u0646\u062a\u0631\u0627\u062a \u0648\u0627\u0644\u0623\u0645\u0644\u0627\u062d. \u062a\u0642\u062f\u0645 \u0628\u0644\u0648 \u0641\u0644\u062a\u0631 \u062d\u0644\u0627\u064b \u0628\u0633\u064a\u0637\u064b\u0627 \u0648\u0631\u062e\u064a\u0635\u064b\u0627 \u0644\u062a\u0646\u0642\u064a\u0629 \u0627\u0644\u0645\u064a\u0627\u0647 \u0627\u0644\u062c\u0648\u0641\u064a\u0629 \u0648\u062c\u0639\u0644\u0647\u0627 \u0645\u0646\u0627\u0633\u0628\u0629 \u0644\u0644\u0632\u0631\u0627\u0639\u0629 \u0645\u0646 \u062e\u0644\u0627\u0644 \u0627\u0633\u062a\u062e\u062f\u0627\u0645 \u062a\u0643\u0646\u0648\u0644\u0648\u062c\u064a\u0627 \u062e\u0636\u0631\u0627\u0621 \u062e\u0627\u0644\u064a\u0629 \u0645\u0646 \u0623\u064a \u0625\u0636\u0627\u0641\u0627\u062a \u0643\u064a\u0645\u064a\u0627\u0626\u064a\u0629 \u0648 \u0635\u062f\u064a\u0642\u0629 \u0644\u0644\u0628\u064a\u0626\u0629. "}',

            ],
        ]);
    }
}
