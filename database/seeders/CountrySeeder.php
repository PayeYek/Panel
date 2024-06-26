<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Afghanistan', 'fa_name' => 'افغانستان', 'iso_code' => 'AF', 'phone_code' => '+93'],
            ['name' => 'Albania', 'fa_name' => 'آلبانی', 'iso_code' => 'AL', 'phone_code' => '+355'],
            ['name' => 'Algeria', 'fa_name' => 'الجزایر', 'iso_code' => 'DZ', 'phone_code' => '+213'],
            ['name' => 'Andorra', 'fa_name' => 'آندورا', 'iso_code' => 'AD', 'phone_code' => '+376'],
            ['name' => 'Angola', 'fa_name' => 'آنگولا', 'iso_code' => 'AO', 'phone_code' => '+244'],
            ['name' => 'Argentina', 'fa_name' => 'آرژانتین', 'iso_code' => 'AR', 'phone_code' => '+54'],
            ['name' => 'Armenia', 'fa_name' => 'ارمنستان', 'iso_code' => 'AM', 'phone_code' => '+374'],
            ['name' => 'Australia', 'fa_name' => 'استرالیا', 'iso_code' => 'AU', 'phone_code' => '+61'],
            ['name' => 'Austria', 'fa_name' => 'اتریش', 'iso_code' => 'AT', 'phone_code' => '+43'],
            ['name' => 'Azerbaijan', 'fa_name' => 'آذربایجان', 'iso_code' => 'AZ', 'phone_code' => '+994'],
            ['name' => 'Bahamas', 'fa_name' => 'باهاما', 'iso_code' => 'BS', 'phone_code' => '+1-242'],
            ['name' => 'Bahrain', 'fa_name' => 'بحرین', 'iso_code' => 'BH', 'phone_code' => '+973'],
            ['name' => 'Bangladesh', 'fa_name' => 'بنگلادش', 'iso_code' => 'BD', 'phone_code' => '+880'],
            ['name' => 'Barbados', 'fa_name' => 'باربادوس', 'iso_code' => 'BB', 'phone_code' => '+1-246'],
            ['name' => 'Belarus', 'fa_name' => 'بلاروس', 'iso_code' => 'BY', 'phone_code' => '+375'],
            ['name' => 'Belgium', 'fa_name' => 'بلژیک', 'iso_code' => 'BE', 'phone_code' => '+32'],
            ['name' => 'Belize', 'fa_name' => 'بلیز', 'iso_code' => 'BZ', 'phone_code' => '+501'],
            ['name' => 'Benin', 'fa_name' => 'بنین', 'iso_code' => 'BJ', 'phone_code' => '+229'],
            ['name' => 'Bhutan', 'fa_name' => 'بوتان', 'iso_code' => 'BT', 'phone_code' => '+975'],
            ['name' => 'Bolivia', 'fa_name' => 'بولیوی', 'iso_code' => 'BO', 'phone_code' => '+591'],
            ['name' => 'Bosnia and Herzegovina', 'fa_name' => 'بوسنی و هرزگوین', 'iso_code' => 'BA', 'phone_code' => '+387'],
            ['name' => 'Botswana', 'fa_name' => 'بوتسوانا', 'iso_code' => 'BW', 'phone_code' => '+267'],
            ['name' => 'Brazil', 'fa_name' => 'برزیل', 'iso_code' => 'BR', 'phone_code' => '+55'],
            ['name' => 'Brunei', 'fa_name' => 'برونئی', 'iso_code' => 'BN', 'phone_code' => '+673'],
            ['name' => 'Bulgaria', 'fa_name' => 'بلغارستان', 'iso_code' => 'BG', 'phone_code' => '+359'],
            ['name' => 'Burkina Faso', 'fa_name' => 'بورکینافاسو', 'iso_code' => 'BF', 'phone_code' => '+226'],
            ['name' => 'Burundi', 'fa_name' => 'بوروندی', 'iso_code' => 'BI', 'phone_code' => '+257'],
            ['name' => 'Cabo Verde', 'fa_name' => 'کابو ورد', 'iso_code' => 'CV', 'phone_code' => '+238'],
            ['name' => 'Cambodia', 'fa_name' => 'کامبوج', 'iso_code' => 'KH', 'phone_code' => '+855'],
            ['name' => 'Cameroon', 'fa_name' => 'کامرون', 'iso_code' => 'CM', 'phone_code' => '+237'],
            ['name' => 'Canada', 'fa_name' => 'کانادا', 'iso_code' => 'CA', 'phone_code' => '+1'],
            ['name' => 'Central African Republic', 'fa_name' => 'جمهوری آفریقای مرکزی', 'iso_code' => 'CF', 'phone_code' => '+236'],
            ['name' => 'Chad', 'fa_name' => 'چاد', 'iso_code' => 'TD', 'phone_code' => '+235'],
            ['name' => 'Chile', 'fa_name' => 'شیلی', 'iso_code' => 'CL', 'phone_code' => '+56'],
            ['name' => 'China', 'fa_name' => 'چین', 'iso_code' => 'CN', 'phone_code' => '+86'],
            ['name' => 'Colombia', 'fa_name' => 'کلمبیا', 'iso_code' => 'CO', 'phone_code' => '+57'],
            ['name' => 'Comoros', 'fa_name' => 'کومور', 'iso_code' => 'KM', 'phone_code' => '+269'],
            ['name' => 'Congo (Congo-Brazzaville)', 'fa_name' => 'کنگو (برازاویل)', 'iso_code' => 'CG', 'phone_code' => '+242'],
            ['name' => 'Costa Rica', 'fa_name' => 'کاستاریکا', 'iso_code' => 'CR', 'phone_code' => '+506'],
            ['name' => 'Croatia', 'fa_name' => 'کرواسی', 'iso_code' => 'HR', 'phone_code' => '+385'],
            ['name' => 'Cuba', 'fa_name' => 'کوبا', 'iso_code' => 'CU', 'phone_code' => '+53'],
            ['name' => 'Cyprus', 'fa_name' => 'قبرس', 'iso_code' => 'CY', 'phone_code' => '+357'],
            ['name' => 'Czechia (Czech Republic)', 'fa_name' => 'چک', 'iso_code' => 'CZ', 'phone_code' => '+420'],
            ['name' => 'Denmark', 'fa_name' => 'دانمارک', 'iso_code' => 'DK', 'phone_code' => '+45'],
            ['name' => 'Djibouti', 'fa_name' => 'جیبوتی', 'iso_code' => 'DJ', 'phone_code' => '+253'],
            ['name' => 'Dominica', 'fa_name' => 'دومینیکا', 'iso_code' => 'DM', 'phone_code' => '+1-767'],
            ['name' => 'Dominican Republic', 'fa_name' => 'جمهوری دومینیکن', 'iso_code' => 'DO', 'phone_code' => '+1-809'],
            ['name' => 'Ecuador', 'fa_name' => 'اکوادور', 'iso_code' => 'EC', 'phone_code' => '+593'],
            ['name' => 'Egypt', 'fa_name' => 'مصر', 'iso_code' => 'EG', 'phone_code' => '+20'],
            ['name' => 'El Salvador', 'fa_name' => 'السالوادور', 'iso_code' => 'SV', 'phone_code' => '+503'],
            ['name' => 'Equatorial Guinea', 'fa_name' => 'گینه استوایی', 'iso_code' => 'GQ', 'phone_code' => '+240'],
            ['name' => 'Eritrea', 'fa_name' => 'اریتره', 'iso_code' => 'ER', 'phone_code' => '+291'],
            ['name' => 'Estonia', 'fa_name' => 'استونی', 'iso_code' => 'EE', 'phone_code' => '+372'],
            ['name' => 'Eswatini (fmr. "Swaziland")', 'fa_name' => 'اسواتینی (سوازیلند سابق)', 'iso_code' => 'SZ', 'phone_code' => '+268'],
            ['name' => 'Ethiopia', 'fa_name' => 'اتیوپی', 'iso_code' => 'ET', 'phone_code' => '+251'],
            ['name' => 'Fiji', 'fa_name' => 'فیجی', 'iso_code' => 'FJ', 'phone_code' => '+679'],
            ['name' => 'Finland', 'fa_name' => 'فنلاند', 'iso_code' => 'FI', 'phone_code' => '+358'],
            ['name' => 'France', 'fa_name' => 'فرانسه', 'iso_code' => 'FR', 'phone_code' => '+33'],
            ['name' => 'Gabon', 'fa_name' => 'گابن', 'iso_code' => 'GA', 'phone_code' => '+241'],
            ['name' => 'Gambia', 'fa_name' => 'گامبیا', 'iso_code' => 'GM', 'phone_code' => '+220'],
            ['name' => 'Georgia', 'fa_name' => 'گرجستان', 'iso_code' => 'GE', 'phone_code' => '+995'],
            ['name' => 'Germany', 'fa_name' => 'آلمان', 'iso_code' => 'DE', 'phone_code' => '+49'],
            ['name' => 'Ghana', 'fa_name' => 'غنا', 'iso_code' => 'GH', 'phone_code' => '+233'],
            ['name' => 'Greece', 'fa_name' => 'یونان', 'iso_code' => 'GR', 'phone_code' => '+30'],
            ['name' => 'Grenada', 'fa_name' => 'گرنادا', 'iso_code' => 'GD', 'phone_code' => '+1-473'],
            ['name' => 'Guatemala', 'fa_name' => 'گواتمالا', 'iso_code' => 'GT', 'phone_code' => '+502'],
            ['name' => 'Guinea', 'fa_name' => 'گینه', 'iso_code' => 'GN', 'phone_code' => '+224'],
            ['name' => 'Guinea-Bissau', 'fa_name' => 'گینه بیسائو', 'iso_code' => 'GW', 'phone_code' => '+245'],
            ['name' => 'Guyana', 'fa_name' => 'گویان', 'iso_code' => 'GY', 'phone_code' => '+592'],
            ['name' => 'Haiti', 'fa_name' => 'هائیتی', 'iso_code' => 'HT', 'phone_code' => '+509'],
            ['name' => 'Honduras', 'fa_name' => 'هندوراس', 'iso_code' => 'HN', 'phone_code' => '+504'],
            ['name' => 'Hungary', 'fa_name' => 'مجارستان', 'iso_code' => 'HU', 'phone_code' => '+36'],
            ['name' => 'Iceland', 'fa_name' => 'ایسلند', 'iso_code' => 'IS', 'phone_code' => '+354'],
            ['name' => 'India', 'fa_name' => 'هند', 'iso_code' => 'IN', 'phone_code' => '+91'],
            ['name' => 'Indonesia', 'fa_name' => 'اندونزی', 'iso_code' => 'ID', 'phone_code' => '+62'],
            ['name' => 'Iran', 'fa_name' => 'ایران', 'iso_code' => 'IR', 'phone_code' => '+98'],
            ['name' => 'Iraq', 'fa_name' => 'عراق', 'iso_code' => 'IQ', 'phone_code' => '+964'],
            ['name' => 'Ireland', 'fa_name' => 'ایرلند', 'iso_code' => 'IE', 'phone_code' => '+353'],
            ['name' => 'Israel', 'fa_name' => 'اسرائیل', 'iso_code' => 'IL', 'phone_code' => '+972'],
            ['name' => 'Italy', 'fa_name' => 'ایتالیا', 'iso_code' => 'IT', 'phone_code' => '+39'],
            ['name' => 'Jamaica', 'fa_name' => 'جامائیکا', 'iso_code' => 'JM', 'phone_code' => '+1-876'],
            ['name' => 'Japan', 'fa_name' => 'ژاپن', 'iso_code' => 'JP', 'phone_code' => '+81'],
            ['name' => 'Jordan', 'fa_name' => 'اردن', 'iso_code' => 'JO', 'phone_code' => '+962'],
            ['name' => 'Kazakhstan', 'fa_name' => 'قزاقستان', 'iso_code' => 'KZ', 'phone_code' => '+7'],
            ['name' => 'Kenya', 'fa_name' => 'کنیا', 'iso_code' => 'KE', 'phone_code' => '+254'],
            ['name' => 'Kiribati', 'fa_name' => 'کیریباتی', 'iso_code' => 'KI', 'phone_code' => '+686'],
            ['name' => 'Kuwait', 'fa_name' => 'کویت', 'iso_code' => 'KW', 'phone_code' => '+965'],
            ['name' => 'Kyrgyzstan', 'fa_name' => 'قرقیزستان', 'iso_code' => 'KG', 'phone_code' => '+996'],
            ['name' => 'Laos', 'fa_name' => 'لائوس', 'iso_code' => 'LA', 'phone_code' => '+856'],
            ['name' => 'Latvia', 'fa_name' => 'لتونی', 'iso_code' => 'LV', 'phone_code' => '+371'],
            ['name' => 'Lebanon', 'fa_name' => 'لبنان', 'iso_code' => 'LB', 'phone_code' => '+961'],
            ['name' => 'Lesotho', 'fa_name' => 'لسوتو', 'iso_code' => 'LS', 'phone_code' => '+266'],
            ['name' => 'Liberia', 'fa_name' => 'لیبریا', 'iso_code' => 'LR', 'phone_code' => '+231'],
            ['name' => 'Libya', 'fa_name' => 'لیبی', 'iso_code' => 'LY', 'phone_code' => '+218'],
            ['name' => 'Liechtenstein', 'fa_name' => 'لیختن‌اشتاین', 'iso_code' => 'LI', 'phone_code' => '+423'],
            ['name' => 'Lithuania', 'fa_name' => 'لیتوانی', 'iso_code' => 'LT', 'phone_code' => '+370'],
            ['name' => 'Luxembourg', 'fa_name' => 'لوکزامبورگ', 'iso_code' => 'LU', 'phone_code' => '+352'],
            ['name' => 'Madagascar', 'fa_name' => 'ماداگاسکار', 'iso_code' => 'MG', 'phone_code' => '+261'],
            ['name' => 'Malawi', 'fa_name' => 'مالاوی', 'iso_code' => 'MW', 'phone_code' => '+265'],
            ['name' => 'Malaysia', 'fa_name' => 'مالزی', 'iso_code' => 'MY', 'phone_code' => '+60'],
            ['name' => 'Maldives', 'fa_name' => 'مالدیو', 'iso_code' => 'MV', 'phone_code' => '+960'],
            ['name' => 'Mali', 'fa_name' => 'مالی', 'iso_code' => 'ML', 'phone_code' => '+223'],
            ['name' => 'Malta', 'fa_name' => 'مالت', 'iso_code' => 'MT', 'phone_code' => '+356'],
            ['name' => 'Marshall Islands', 'fa_name' => 'جزایر مارشال', 'iso_code' => 'MH', 'phone_code' => '+692'],
            ['name' => 'Mauritania', 'fa_name' => 'موریتانی', 'iso_code' => 'MR', 'phone_code' => '+222'],
            ['name' => 'Mauritius', 'fa_name' => 'موریس', 'iso_code' => 'MU', 'phone_code' => '+230'],
            ['name' => 'Mexico', 'fa_name' => 'مکزیک', 'iso_code' => 'MX', 'phone_code' => '+52'],
            ['name' => 'Micronesia', 'fa_name' => 'میکرونزی', 'iso_code' => 'FM', 'phone_code' => '+691'],
            ['name' => 'Moldova', 'fa_name' => 'مولداوی', 'iso_code' => 'MD', 'phone_code' => '+373'],
            ['name' => 'Monaco', 'fa_name' => 'موناکو', 'iso_code' => 'MC', 'phone_code' => '+377'],
            ['name' => 'Mongolia', 'fa_name' => 'مغولستان', 'iso_code' => 'MN', 'phone_code' => '+976'],
            ['name' => 'Montenegro', 'fa_name' => 'مونته‌نگرو', 'iso_code' => 'ME', 'phone_code' => '+382'],
            ['name' => 'Morocco', 'fa_name' => 'مراکش', 'iso_code' => 'MA', 'phone_code' => '+212'],
            ['name' => 'Mozambique', 'fa_name' => 'موزامبیک', 'iso_code' => 'MZ', 'phone_code' => '+258'],
            ['name' => 'Myanmar (Burma)', 'fa_name' => 'میانمار (برمه)', 'iso_code' => 'MM', 'phone_code' => '+95'],
            ['name' => 'Namibia', 'fa_name' => 'نامیبیا', 'iso_code' => 'NA', 'phone_code' => '+264'],
            ['name' => 'Nauru', 'fa_name' => 'نائورو', 'iso_code' => 'NR', 'phone_code' => '+674'],
            ['name' => 'Nepal', 'fa_name' => 'نپال', 'iso_code' => 'NP', 'phone_code' => '+977'],
            ['name' => 'Netherlands', 'fa_name' => 'هلند', 'iso_code' => 'NL', 'phone_code' => '+31'],
            ['name' => 'New Zealand', 'fa_name' => 'نیوزیلند', 'iso_code' => 'NZ', 'phone_code' => '+64'],
            ['name' => 'Nicaragua', 'fa_name' => 'نیکاراگوئه', 'iso_code' => 'NI', 'phone_code' => '+505'],
            ['name' => 'Niger', 'fa_name' => 'نیجر', 'iso_code' => 'NE', 'phone_code' => '+227'],
            ['name' => 'Nigeria', 'fa_name' => 'نیجریه', 'iso_code' => 'NG', 'phone_code' => '+234'],
            ['name' => 'North Korea', 'fa_name' => 'کره شمالی', 'iso_code' => 'KP', 'phone_code' => '+850'],
            ['name' => 'North Macedonia', 'fa_name' => 'مقدونیه شمالی', 'iso_code' => 'MK', 'phone_code' => '+389'],
            ['name' => 'Norway', 'fa_name' => 'نروژ', 'iso_code' => 'NO', 'phone_code' => '+47'],
            ['name' => 'Oman', 'fa_name' => 'عمان', 'iso_code' => 'OM', 'phone_code' => '+968'],
            ['name' => 'Pakistan', 'fa_name' => 'پاکستان', 'iso_code' => 'PK', 'phone_code' => '+92'],
            ['name' => 'Palau', 'fa_name' => 'پالائو', 'iso_code' => 'PW', 'phone_code' => '+680'],
            ['name' => 'Palestine', 'fa_name' => 'فلسطین', 'iso_code' => 'PS', 'phone_code' => '+970'],
            ['name' => 'Panama', 'fa_name' => 'پاناما', 'iso_code' => 'PA', 'phone_code' => '+507'],
            ['name' => 'Papua New Guinea', 'fa_name' => 'پاپوآ گینه‌نو', 'iso_code' => 'PG', 'phone_code' => '+675'],
            ['name' => 'Paraguay', 'fa_name' => 'پاراگوئه', 'iso_code' => 'PY', 'phone_code' => '+595'],
            ['name' => 'Peru', 'fa_name' => 'پرو', 'iso_code' => 'PE', 'phone_code' => '+51'],
            ['name' => 'Philippines', 'fa_name' => 'فیلیپین', 'iso_code' => 'PH', 'phone_code' => '+63'],
            ['name' => 'Poland', 'fa_name' => 'لهستان', 'iso_code' => 'PL', 'phone_code' => '+48'],
            ['name' => 'Portugal', 'fa_name' => 'پرتغال', 'iso_code' => 'PT', 'phone_code' => '+351'],
            ['name' => 'Qatar', 'fa_name' => 'قطر', 'iso_code' => 'QA', 'phone_code' => '+974'],
            ['name' => 'Romania', 'fa_name' => 'رومانی', 'iso_code' => 'RO', 'phone_code' => '+40'],
            ['name' => 'Russia', 'fa_name' => 'روسیه', 'iso_code' => 'RU', 'phone_code' => '+7'],
            ['name' => 'Rwanda', 'fa_name' => 'رواندا', 'iso_code' => 'RW', 'phone_code' => '+250'],
            ['name' => 'Saint Kitts and Nevis', 'fa_name' => 'سنت کیتس و نویس', 'iso_code' => 'KN', 'phone_code' => '+1-869'],
            ['name' => 'Saint Lucia', 'fa_name' => 'سنت لوسیا', 'iso_code' => 'LC', 'phone_code' => '+1-758'],
            ['name' => 'Saint Vincent and the Grenadines', 'fa_name' => 'سنت وینسنت و گرنادین‌ها', 'iso_code' => 'VC', 'phone_code' => '+1-784'],
            ['name' => 'Samoa', 'fa_name' => 'ساموآ', 'iso_code' => 'WS', 'phone_code' => '+685'],
            ['name' => 'San Marino', 'fa_name' => 'سان مارینو', 'iso_code' => 'SM', 'phone_code' => '+378'],
            ['name' => 'Sao Tome and Principe', 'fa_name' => 'سائوتومه و پرینسیپ', 'iso_code' => 'ST', 'phone_code' => '+239'],
            ['name' => 'Saudi Arabia', 'fa_name' => 'عربستان سعودی', 'iso_code' => 'SA', 'phone_code' => '+966'],
            ['name' => 'Senegal', 'fa_name' => 'سنگال', 'iso_code' => 'SN', 'phone_code' => '+221'],
            ['name' => 'Serbia', 'fa_name' => 'صربستان', 'iso_code' => 'RS', 'phone_code' => '+381'],
            ['name' => 'Seychelles', 'fa_name' => 'سیشل', 'iso_code' => 'SC', 'phone_code' => '+248'],
            ['name' => 'Sierra Leone', 'fa_name' => 'سیرالئون', 'iso_code' => 'SL', 'phone_code' => '+232'],
            ['name' => 'Singapore', 'fa_name' => 'سنگاپور', 'iso_code' => 'SG', 'phone_code' => '+65'],
            ['name' => 'Slovakia', 'fa_name' => 'اسلواکی', 'iso_code' => 'SK', 'phone_code' => '+421'],
            ['name' => 'Slovenia', 'fa_name' => 'اسلوونی', 'iso_code' => 'SI', 'phone_code' => '+386'],
            ['name' => 'Solomon Islands', 'fa_name' => 'جزایر سلیمان', 'iso_code' => 'SB', 'phone_code' => '+677'],
            ['name' => 'Somalia', 'fa_name' => 'سومالی', 'iso_code' => 'SO', 'phone_code' => '+252'],
            ['name' => 'South Africa', 'fa_name' => 'آفریقای جنوبی', 'iso_code' => 'ZA', 'phone_code' => '+27'],
            ['name' => 'South Korea', 'fa_name' => 'کره جنوبی', 'iso_code' => 'KR', 'phone_code' => '+82'],
            ['name' => 'South Sudan', 'fa_name' => 'سودان جنوبی', 'iso_code' => 'SS', 'phone_code' => '+211'],
            ['name' => 'Spain', 'fa_name' => 'اسپانیا', 'iso_code' => 'ES', 'phone_code' => '+34'],
            ['name' => 'Sri Lanka', 'fa_name' => 'سری‌لانکا', 'iso_code' => 'LK', 'phone_code' => '+94'],
            ['name' => 'Sudan', 'fa_name' => 'سودان', 'iso_code' => 'SD', 'phone_code' => '+249'],
            ['name' => 'Suriname', 'fa_name' => 'سورینام', 'iso_code' => 'SR', 'phone_code' => '+597'],
            ['name' => 'Sweden', 'fa_name' => 'سوئد', 'iso_code' => 'SE', 'phone_code' => '+46'],
            ['name' => 'Switzerland', 'fa_name' => 'سوئیس', 'iso_code' => 'CH', 'phone_code' => '+41'],
            ['name' => 'Syria', 'fa_name' => 'سوریه', 'iso_code' => 'SY', 'phone_code' => '+963'],
            ['name' => 'Taiwan', 'fa_name' => 'تایوان', 'iso_code' => 'TW', 'phone_code' => '+886'],
            ['name' => 'Tajikistan', 'fa_name' => 'تاجیکستان', 'iso_code' => 'TJ', 'phone_code' => '+992'],
            ['name' => 'Tanzania', 'fa_name' => 'تانزانیا', 'iso_code' => 'TZ', 'phone_code' => '+255'],
            ['name' => 'Thailand', 'fa_name' => 'تایلند', 'iso_code' => 'TH', 'phone_code' => '+66'],
            ['name' => 'Timor-Leste', 'fa_name' => 'تیمور-لسته', 'iso_code' => 'TL', 'phone_code' => '+670'],
            ['name' => 'Togo', 'fa_name' => 'توگو', 'iso_code' => 'TG', 'phone_code' => '+228'],
            ['name' => 'Tonga', 'fa_name' => 'تونگا', 'iso_code' => 'TO', 'phone_code' => '+676'],
            ['name' => 'Trinidad and Tobago', 'fa_name' => 'ترینیداد و توباگو', 'iso_code' => 'TT', 'phone_code' => '+1-868'],
            ['name' => 'Tunisia', 'fa_name' => 'تونس', 'iso_code' => 'TN', 'phone_code' => '+216'],
            ['name' => 'Turkey', 'fa_name' => 'ترکیه', 'iso_code' => 'TR', 'phone_code' => '+90'],
            ['name' => 'Turkmenistan', 'fa_name' => 'ترکمنستان', 'iso_code' => 'TM', 'phone_code' => '+993'],
            ['name' => 'Tuvalu', 'fa_name' => 'تووالو', 'iso_code' => 'TV', 'phone_code' => '+688'],
            ['name' => 'Uganda', 'fa_name' => 'اوگاندا', 'iso_code' => 'UG', 'phone_code' => '+256'],
            ['name' => 'Ukraine', 'fa_name' => 'اوکراین', 'iso_code' => 'UA', 'phone_code' => '+380'],
            ['name' => 'United Arab Emirates', 'fa_name' => 'امارات متحده عربی', 'iso_code' => 'AE', 'phone_code' => '+971'],
            ['name' => 'United Kingdom', 'fa_name' => 'بریتانیا', 'iso_code' => 'GB', 'phone_code' => '+44'],
            ['name' => 'United States', 'fa_name' => 'ایالات متحده', 'iso_code' => 'US', 'phone_code' => '+1'],
            ['name' => 'Uruguay', 'fa_name' => 'اروگوئه', 'iso_code' => 'UY', 'phone_code' => '+598'],
            ['name' => 'Uzbekistan', 'fa_name' => 'ازبکستان', 'iso_code' => 'UZ', 'phone_code' => '+998'],
            ['name' => 'Vanuatu', 'fa_name' => 'وانواتو', 'iso_code' => 'VU', 'phone_code' => '+678'],
            ['name' => 'Vatican City', 'fa_name' => 'واتیکان', 'iso_code' => 'VA', 'phone_code' => '+39-06'],
            ['name' => 'Venezuela', 'fa_name' => 'ونزوئلا', 'iso_code' => 'VE', 'phone_code' => '+58'],
            ['name' => 'Vietnam', 'fa_name' => 'ویتنام', 'iso_code' => 'VN', 'phone_code' => '+84'],
            ['name' => 'Yemen', 'fa_name' => 'یمن', 'iso_code' => 'YE', 'phone_code' => '+967'],
            ['name' => 'Zambia', 'fa_name' => 'زامبیا', 'iso_code' => 'ZM', 'phone_code' => '+260'],
            ['name' => 'Zimbabwe', 'fa_name' => 'زیمبابوه', 'iso_code' => 'ZW', 'phone_code' => '+263'],
        ];

        DB::table('countries')->insert($countries);
    }
}
