<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;

if (!function_exists('get_country_list')) {
    function get_country_list($country = '')
    {
        $countries = Cache::rememberForever('countries', function () {
            //list of countries
            return
                array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        });

        return $country ? $countries[$country] : $countries;
    }
}

if (!function_exists('getUserAvatar')) {
    function getUserAvatar(User $user = null): string
    {
        if (!empty($user)) {
            return $user->avatar ? $user->avatar : "https://avatar.oxro.io/avatar.svg?name=$user->name";
        }
        return auth()->user()->avatar ? auth()->user()->avatar : "https://avatar.oxro.io/avatar.svg?name=" . auth()->user()->name;
    }
}

if (!function_exists('formatActivityLog')) {
    function formatActivityLog($log = [])
    {
        $html = '';
        $old = '';
        $attributes = '';
        if (!empty($log)) {
            foreach ($log as $key => $data) {
                if ($key == 'old') {
                    $old .= "<div>";
                    $old .= "<p class='text-sm text-gray-500 border-b-1 font-bold'>From</p>";

                    foreach ($data as $column => $value) {
                        $old .= formatSingleColumn($value, $column);
                    }
                    $old .= "</div>";
                } elseif ($key == 'attributes') {
                    $attributes .= "<div>";
                    $attributes .= "<p class='text-sm text-gray-500 border-b-1 font-bold'>To</p>";

                    foreach ($data as $column => $value) {
                        $attributes .= formatSingleColumn($value, $column);
                    }
                    $attributes .= "</div>";
                } else {
                    foreach ($log as $column => $value) {
                        $html .= formatSingleColumn($value, $column);
                    }
                }
            }

            $html .= $old;
            $html .= $attributes;

            return $html;
        }
    }


    if (!function_exists('formatSingleColumn')) {
        function formatSingleColumn($value = '', $column = 'avatar'): string
        {
            if (!empty($value) && $value != null && $value != 'null' && $value != '') {
                if ($column == 'avatar') {
                    return "
                    <p class='pl-4 text-sm text-gray-500'>
                        <span class='font-bold'>
                            $column: 
                        </span>
                        <img 
                            class='ml-4 inline-flex h-6 w-6 rounded-full'
                            width='24'
                            height='24'
                            src='$value' 
                            alt=''
                        >
                    </p>";
                }

                if ($column == 'password') {
                    return "
                    <p class='pl-4 text-sm text-gray-500'>
                        <span class='font-bold'>
                            $column: 
                        </span>
                        ********
                    </p>";
                }

                return "<p class='pl-4 text-sm text-gray-500'><span class='font-bold'>$column: </span>$value</p>";
            }
            return "<p class='pl-4 text-sm text-gray-500'><span class='font-bold'>$column: </span>--empty--</p>";
        }
    }
}
