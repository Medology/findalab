<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Lab Http Controller to Mock the Response to fulfill requests from findlab.
 */
class LabController extends Controller
{
    /**
     * Return the lab search result.
     *
     * @param  Request  $request Http request.
     * @return Response
     */
    public function labsNearCoords(Request $request)
    {
        return response()->json(array_merge([
                'labs'        => $this->labs,
                'resultCount' => count($this->labs),
            ], $this->coord)
        );
    }

    /**
     * Return the geocoding result.
     *
     * @param  Request  $request Http request.
     * @return Response
     */
    public function geocode(Request $request)
    {
        return response()->json([array_merge($this->coord, ['countryCode' => 'US'])]);
    }

    /**
     * Return the phlebotomist search result.
     *
     * @param  Request $request Http request.
     * @return mixed
     */
    public function phlebotomistsNearCoords(Request $request)
    {
        return response()->json(['hasPhlebotomists' => true]);
    }

    /** @var array Default coordination */
    protected $coord = [
        'latitude' => '30.0487594604',
        'longitude'=> '-95.2193298340',
    ];

    /** @var array Default lab result */
    protected $labs = [
        [
            'number'           => '13',
            'address'          => '201 KINGWOOD MEDICAL DR #A100',
            'geocode_address'  => '201 KINGWOOD MEDICAL DR #A100',
            'city'             => 'KINGWOOD',
            'state'            => 'TX',
            'zipcode'          => '77339',
            'hours'            => 'M-F  7:30-4:30PM Sat 8AM - 12PM',
            'latitude'         => '30.0470049000',
            'longitude'        => '-95.2569061000',
            'network'          => 'Labcorp',
            'phoneNumber'      => '',
            'fax_number'       => '2811111112',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => 'LabCorp',
            'country'          => 'US',
            'distance'         => '2.2505084601543994',
            'center_id'        => '13',
            'center_address'   => '201 Kingwood Medical Dr #a100',
            'center_state'     => 'TX',
            'center_city'      => 'Kingwood',
            'center_zip'       => '77339',
            'center_hours'     => 'M-F  7:30-4:30PM Sat 8AM - 12PM',
            'center_latitude'  => '30.0470049000',
            'center_longitude' => '-95.2569061000',
            'center_network'   => 'Labcorp',
            'center_country'   => 'US',
            'center_distance'  => 2.2505084601544,
            'network_name'     => 'LabCorp',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'  => '7:30 AM',
                    'close' => '4:30 PM',
                ],
                'Tuesday' => [
                    'open'  => '7:30 AM',
                    'close' => '4:30 PM',
                ],
                'Wednesday' => [
                    'open'  => '7:30 AM',
                    'close' => '4:30 PM',
                ],
                'Thursday' => [
                    'open'  => '7:30 AM',
                    'close' => '4:30 PM',
                ],
                'Friday' => [
                    'open'  => '7:30 AM',
                    'close' => '4:30 PM',
                ],
                'Saturday' => [
                    'open'  => '8:00 AM',
                    'close' => '12:00 PM',
                ],
            ],
        ],
        [
            'number'           => '2530',
            'address'          => '1213 Hermann Drive Suite 120',
            'geocode_address'  => '',
            'city'             => 'Houston',
            'state'            => 'TX',
            'zipcode'          => '77004',
            'hours'            => 'M-Th 8:00 am-12:30 pm & 1:30 pm-5:00 pm|F 8:00 am-12:30 pm & 1:30 pm-3:00 pm',
            'latitude'         => '29.7232630000',
            'longitude'        => '-95.3884430000',
            'network'          => 'National',
            'phoneNumber'      => '',
            'fax_number'       => '2811111113',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => '',
            'country'          => 'US',
            'distance'         => '24.664887317525004',
            'center_id'        => '2530',
            'center_address'   => '1213 Hermann Drive Suite 120',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77004',
            'center_hours'     => 'M-Th 8:00 am-12:30 pm & 1:30 pm-5:00 pm|F 8:00 am-12:30 pm & 1:30 pm-3:00 pm',
            'center_latitude'  => '29.7232630000',
            'center_longitude' => '-95.3884430000',
            'center_network'   => 'National',
            'center_country'   => 'US',
            'center_distance'  => 24.664887317525,
            'network_name'     => 'Quest Diagnostics',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Tuesday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Wednesday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Thursday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Friday' => [
                    'open'        => '8:00 AM',
                    'close'       => '3:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
            ],
        ],
        [
            'number'           => '192',
            'address'          => '1213 HERMANN DR STE 155',
            'geocode_address'  => '1213 HERMANN DR STE 155',
            'city'             => 'HOUSTON',
            'state'            => 'TX',
            'zipcode'          => '77004',
            'hours'            => 'M-F  8AM-5:30P',
            'latitude'         => '29.7232620000',
            'longitude'        => '-95.3884410000',
            'network'          => 'Labcorp',
            'phoneNumber'      => '',
            'fax_number'       => '2811111114',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => 'LabCorp',
            'country'          => 'US',
            'distance'         => '24.664901127089262',
            'center_id'        => '192',
            'center_address'   => '1213 Hermann Dr Ste 155',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77004',
            'center_hours'     => 'M-F  8AM-5:30P',
            'center_latitude'  => '29.7232620000',
            'center_longitude' => '-95.3884410000',
            'center_network'   => 'Labcorp',
            'center_country'   => 'US',
            'center_distance'  => 24.664901127089,
            'network_name'     => 'LabCorp',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:30 PM',
                ],
                'Tuesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:30 PM',
                ],
                'Wednesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:30 PM',
                ],
                'Thursday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:30 PM',
                ],
                'Friday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:30 PM',
                ],
            ],
        ],
        [
            'number'           => '2748',
            'address'          => '5711 Almeda Rd Ste 131B',
            'geocode_address'  => '',
            'city'             => 'Houston',
            'state'            => 'TX',
            'zipcode'          => '77004',
            'hours'            => 'M-F 8:00 am-5:00 pm',
            'latitude'         => '29.7184540000',
            'longitude'        => '-95.3797990000',
            'network'          => 'National',
            'phoneNumber'      => '',
            'fax_number'       => '2811111115',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => '',
            'country'          => 'US',
            'distance'         => '24.762727435231234',
            'center_id'        => '2748',
            'center_address'   => '5711 Almeda Rd Ste 131b',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77004',
            'center_hours'     => 'M-F 8:00 am-5:00 pm',
            'center_latitude'  => '29.7184540000',
            'center_longitude' => '-95.3797990000',
            'center_network'   => 'National',
            'center_country'   => 'US',
            'center_distance'  => 24.762727435231,
            'network_name'     => 'Quest Diagnostics',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Tuesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Wednesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Thursday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Friday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
            ],
        ],
        [
            'number'           => '3190',
            'address'          => '2802 Garth Rd Ste 213 ',
            'geocode_address'  => '',
            'city'             => 'Baytown',
            'state'            => 'TX',
            'zipcode'          => '77521',
            'hours'            => 'M-F 8:00 am-5:00 pm ',
            'latitude'         => '29.7525900000',
            'longitude'        => '-94.9782560000',
            'network'          => 'National',
            'phoneNumber'      => '',
            'fax_number'       => '2811111116',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => '',
            'country'          => 'US',
            'distance'         => '25.043647636412192',
            'center_id'        => '3190',
            'center_address'   => '2802 Garth Rd Ste 213 ',
            'center_state'     => 'TX',
            'center_city'      => 'Baytown',
            'center_zip'       => '77521',
            'center_hours'     => 'M-F 8:00 am-5:00 pm ',
            'center_latitude'  => '29.7525900000',
            'center_longitude' => '-94.9782560000',
            'center_network'   => 'National',
            'center_country'   => 'US',
            'center_distance'  => 25.043647636412,
            'network_name'     => 'Quest Diagnostics',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Tuesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Wednesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Thursday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Friday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
            ],
        ],
        [
            'number'           => '3209',
            'address'          => '6410 Fannin St Ste 220 ',
            'geocode_address'  => '',
            'city'             => 'Houston',
            'state'            => 'TX',
            'zipcode'          => '77030',
            'hours'            => 'M-F 8:00 am-5:00 pm',
            'latitude'         => '29.7144070000',
            'longitude'        => '-95.3978880000',
            'network'          => 'National',
            'phoneNumber'      => '',
            'fax_number'       => '2811111117',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => '',
            'country'          => 'US',
            'distance'         => '25.456706215685237',
            'center_id'        => '3209',
            'center_address'   => '6410 Fannin St Ste 220 ',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77030',
            'center_hours'     => 'M-F 8:00 am-5:00 pm',
            'center_latitude'  => '29.7144070000',
            'center_longitude' => '-95.3978880000',
            'center_network'   => 'National',
            'center_country'   => 'US',
            'center_distance'  => 25.456706215685,
            'network_name'     => 'Quest Diagnostics',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Tuesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Wednesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Thursday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Friday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
            ],
        ],
        [
            'number'           => '195',
            'address'          => '6410 FANNIN ST STE 110',
            'geocode_address'  => '6410 FANNIN ST STE 110',
            'city'             => 'HOUSTON',
            'state'            => 'TX',
            'zipcode'          => '77030',
            'hours'            => 'M-F  8AM-5PM',
            'latitude'         => '29.7144070000',
            'longitude'        => '-95.3978880000',
            'network'          => 'Labcorp',
            'phoneNumber'      => '',
            'fax_number'       => '2811111118',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => 'LabCorp',
            'country'          => 'US',
            'distance'         => '25.456706215685237',
            'center_id'        => '195',
            'center_address'   => '6410 Fannin St Ste 110',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77030',
            'center_hours'     => 'M-F  8AM-5PM',
            'center_latitude'  => '29.7144070000',
            'center_longitude' => '-95.3978880000',
            'center_network'   => 'Labcorp',
            'center_country'   => 'US',
            'center_distance'  => 25.456706215685,
            'network_name'     => 'LabCorp',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Tuesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Wednesday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Thursday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
                'Friday' => [
                    'open'  => '8:00 AM',
                    'close' => '5:00 PM',
                ],
            ],
        ],
        [
            'number'           => '3208',
            'address'          => '3400 Bissonnet St Ste 298 ',
            'geocode_address'  => '',
            'city'             => 'Houston',
            'state'            => 'TX',
            'zipcode'          => '77005',
            'hours'            => 'M-F 7:30 am-12:30 pm & 1:30 pm-4:00 pm',
            'latitude'         => '29.7257630000',
            'longitude'        => '-95.4307480000',
            'network'          => 'National',
            'phoneNumber'      => '',
            'fax_number'       => '2811111119',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => '',
            'country'          => 'US',
            'distance'         => '25.658898439052425',
            'center_id'        => '3208',
            'center_address'   => '3400 Bissonnet St Ste 298 ',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77005',
            'center_hours'     => 'M-F 7:30 am-12:30 pm & 1:30 pm-4:00 pm',
            'center_latitude'  => '29.7257630000',
            'center_longitude' => '-95.4307480000',
            'center_network'   => 'National',
            'center_country'   => 'US',
            'center_distance'  => 25.658898439052,
            'network_name'     => 'Quest Diagnostics',
            'max_distance'     => null,
            'structured_hours' => [
                'Monday' => [
                    'open'        => '7:30 AM',
                    'close'       => '4:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Tuesday' => [
                    'open'        => '7:30 AM',
                    'close'       => '4:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Wednesday' => [
                    'open'        => '7:30 AM',
                    'close'       => '4:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Thursday' => [
                    'open'        => '7:30 AM',
                    'close'       => '4:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
                'Friday' => [
                    'open'        => '7:30 AM',
                    'close'       => '4:00 PM',
                    'lunch_start' => '12:30 PM',
                    'lunch_stop'  => '1:30 PM',
                ],
            ],
        ],
        [
            'number'           => '4251',
            'address'          => '9539 HUFFMEISTER SUITE B',
            'geocode_address'  => '',
            'city'             => 'HOUSTON',
            'state'            => 'TX',
            'zipcode'          => '77095',
            'hours'            => 'M-F 7:00AM-5:00PM',
            'latitude'         => '29.9168664000',
            'longitude'        => '-95.6305725000',
            'network'          => 'Labcorp',
            'phoneNumber'      => '',
            'fax_number'       => '2811111120',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => 'LabCorp',
            'country'          => 'US',
            'distance'         => '26.243275697001767',
            'center_id'        => '4251',
            'center_address'   => '9539 Huffmeister Suite B',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77095',
            'center_hours'     => 'M-F 7:00AM-5:00PM',
            'center_latitude'  => '29.9168664000',
            'center_longitude' => '-95.6305725000',
            'center_network'   => 'Labcorp',
            'center_country'   => 'US',
            'center_distance'  => 26.243275697002,
            'network_name'     => 'LabCorp',
            'structured_hours' => [
                'Monday' => [
                    'open'  => '7:00 AM',
                    'close' => '5:00 PM',
                ],
                'Tuesday' => [
                    'open'  => '7:00 AM',
                    'close' => '5:00 PM',
                ],
                'Wednesday' => [
                    'open'  => '7:00 AM',
                    'close' => '5:00 PM',
                ],
                'Thursday' => [
                    'open'  => '7:00 AM',
                    'close' => '5:00 PM',
                ],
                'Friday' => [
                    'open'  => '7:00 AM',
                    'close' => '5:00 PM',
                ],
            ],
        ],
        [
            'number'           => '2532',
            'address'          => '7515 Main Street Suite 190',
            'geocode_address'  => '',
            'city'             => 'Houston',
            'state'            => 'TX',
            'zipcode'          => '77054',
            'hours'            => 'M,T,Th,F 8:00 am-1:00 pm & 2:00 pm-5:00 pm|W 8:00 am-1:00 pm & 2:00 pm-3:00 pm ',
            'latitude'         => '29.6986140000',
            'longitude'        => '-95.4101260000',
            'network'          => 'National',
            'phoneNumber'      => '',
            'fax_number'       => '2811111121',
            'friendlyPhone'    => '',
            'twilio_sid'       => '',
            'lab_title'        => '',
            'country'          => 'US',
            'distance'         => '26.756074921500602',
            'center_id'        => '2532',
            'center_address'   => '7515 Main Street Suite 190',
            'center_state'     => 'TX',
            'center_city'      => 'Houston',
            'center_zip'       => '77054',
            'center_hours'     => 'M,T,Th,F 8:00 am-1:00 pm & 2:00 pm-5:00 pm|W 8:00 am-1:00 pm & 2:00 pm-3:00 pm ',
            'center_latitude'  => '29.6986140000',
            'center_longitude' => '-95.4101260000',
            'center_network'   => 'National',
            'center_country'   => 'US',
            'center_distance'  => 26.756074921501,
            'network_name'     => 'Quest Diagnostics',
            'structured_hours' => [
                'Monday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '1:00 PM',
                    'lunch_stop'  => '2:00 PM',
                ],
                'Tuesday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '1:00 PM',
                    'lunch_stop'  => '2:00 PM',
                ],
                'Wednesday' => [
                    'open'        => '8:00 AM',
                    'close'       => '3:00 PM',
                    'lunch_start' => '1:00 PM',
                    'lunch_stop'  => '2:00 PM',
                ],
                'Thursday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '1:00 PM',
                    'lunch_stop'  => '2:00 PM',
                ],
                'Friday' => [
                    'open'        => '8:00 AM',
                    'close'       => '5:00 PM',
                    'lunch_start' => '1:00 PM',
                    'lunch_stop'  => '2:00 PM',
                ],
            ],
        ],
    ];
}
