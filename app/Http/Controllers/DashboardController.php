<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        
        $ageStart = 0;
        $ageEnd = 5; 

        // Get the patients with WFA 'normal' and age between 0 and 5 months
        $wfaCounts = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Normal')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart, $ageEnd]) // Filter by age (in months)
            ->groupBy('gender') 
            ->get();

        // Get the count of boys and girls
        $boysCount = $wfaCounts->firstWhere('gender', 'male')?->count ?? 0;
        $girlsCount = $wfaCounts->firstWhere('gender', 'female')?->count ?? 0;

// ========================================================================================== //

        $ageStart2 = 6;
        $ageEnd2 = 11; 

        // Get the patients with WFA 'normal' and age between 6 and 11 months
        $wfaCounts2 = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Normal')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart2, $ageEnd2]) // Filter by age (in months)
            ->groupBy('gender') 
            ->get();

        // Get the count of boys and girls
        $boysCount2 = $wfaCounts2->firstWhere('gender', 'male')?->count ?? 0;
        $girlsCount2 = $wfaCounts2->firstWhere('gender', 'female')?->count ?? 0;


// ========================================================================================== //

        $ageStart3 = 12;
        $ageEnd3 = 23; 

        // Get the patients with WFA 'normal' and age between 12 and 23 months
        $wfaCounts3 = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Normal')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart3, $ageEnd3]) // Filter by age (in months)
            ->groupBy('gender') 
            ->get();

        // Get the count of boys and girls
        $boysCount3 = $wfaCounts3->firstWhere('gender', 'male')?->count ?? 0;
        $girlsCount3 = $wfaCounts3->firstWhere('gender', 'female')?->count ?? 0;


        // ========================================================================================== //

        $ageStart4 = 24;
        $ageEnd4 = 35; 

        // Get the patients with WFA 'normal' and age between 24 and 35 months
        $wfaCounts4 = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Normal')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart4, $ageEnd4]) // Filter by age (in months)
            ->groupBy('gender') 
            ->get();

        // Get the count of boys and girls
        $boysCount4 = $wfaCounts4->firstWhere('gender', 'male')?->count ?? 0;
        $girlsCount4 = $wfaCounts4->firstWhere('gender', 'female')?->count ?? 0;


        // ========================================================================================== //

        $ageStart5 = 36;
        $ageEnd5 = 47; 

        // Get the patients with WFA 'normal' and age between 36 and 47 months
        $wfaCounts5 = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Normal')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart5, $ageEnd5]) // Filter by age (in months)
            ->groupBy('gender') 
            ->get();

        // Get the count of boys and girls
        $boysCount5 = $wfaCounts5->firstWhere('gender', 'male')?->count ?? 0;
        $girlsCount5 = $wfaCounts5->firstWhere('gender', 'female')?->count ?? 0;


    // ========================================================================================== //

            $ageStart6 = 48;
            $ageEnd6 = 59; 
    
            // Get the patients with WFA 'normal' and age between 48 and 59 months
            $wfaCounts6 = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfa', 'Normal')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart6, $ageEnd6]) // Filter by age (in months)
                ->groupBy('gender') 
                ->get();
    
            // Get the count of boys and girls
            $boysCount6 = $wfaCounts6->firstWhere('gender', 'male')?->count ?? 0;
            $girlsCount6 = $wfaCounts6->firstWhere('gender', 'female')?->count ?? 0;
    
            // ========================================================================================== //
            //                                       WFA - Underweight Chart
            // ========================================================================================== //

    //         $ageStartOw = 0;
    //         $ageEndOw = 5; 
    
    //         // Get the patients with WFA 'normal' and age between 0 and 5 months
    //         $wfaCountsOw = Patients::select(DB::raw('gender, COUNT(*) as count'))
    //             ->where('wfa', 'Overweight')
    //             ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartOw, $ageEndOw]) // Filter by age (in months)
    //             ->groupBy('gender') 
    //             ->get();
    
    //         // Get the count of boys and girls
    //         $boysCountOw = $wfaCountsOw->firstWhere('gender', 'male')?->count ?? 0;
    //         $girlsCountOw = $wfaCountsOw->firstWhere('gender', 'female')?->count ?? 0;
    
    // // ========================================================================================== //
    //         $ageStartOw2 = 6;
    //         $ageEndOw2 = 11; 
    
    //         $wfaCountsOw2 = Patients::select(DB::raw('gender, COUNT(*) as count'))
    //             ->where('wfa', 'Overweight')
    //             ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartOw2, $ageEndOw2]) // Filter by age (in months)
    //             ->groupBy('gender') 
    //             ->get();
    
    //         // Get the count of boys and girls
    //         $boysCountOw2 = $wfaCountsOw2->firstWhere('gender', 'male')?->count ?? 0;
    //         $girlsCountOw2 = $wfaCountsOw2->firstWhere('gender', 'female')?->count ?? 0;


    //   // ========================================================================================== //
    //   $ageStartOw3 = 12;
    //   $ageEndOw3 = 23; 

    //   $wfaCountsOw3 = Patients::select(DB::raw('gender, COUNT(*) as count'))
    //       ->where('wfa', 'Overweight')
    //       ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartOw3, $ageEndOw3]) // Filter by age (in months)
    //       ->groupBy('gender') 
    //       ->get();

    //   // Get the count of boys and girls
    //   $boysCountOw3 = $wfaCountsOw3->firstWhere('gender', 'male')?->count ?? 0;
    //   $girlsCountOw3 = $wfaCountsOw3->firstWhere('gender', 'female')?->count ?? 0;

    //   // ========================================================================================== //
    //   $ageStartOw3 = 12;
    //   $ageEndOw3 = 23; 

    //   $wfaCountsOw3 = Patients::select(DB::raw('gender, COUNT(*) as count'))
    //       ->where('wfa', 'Overweight')
    //       ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartOw3, $ageEndOw3]) // Filter by age (in months)
    //       ->groupBy('gender') 
    //       ->get();

    //   // Get the count of boys and girls
    //   $boysCountOw3 = $wfaCountsOw3->firstWhere('gender', 'male')?->count ?? 0;
    //   $girlsCountOw3 = $wfaCountsOw3->firstWhere('gender', 'female')?->count ?? 0;

    //   // ========================================================================================== //

    //   $ageStartOw4 = 24;
    //   $ageEndOw4 = 35; 

    //   $wfaCountsOw4 = Patients::select(DB::raw('gender, COUNT(*) as count'))
    //       ->where('wfa', 'Overweight')
    //       ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartOw4, $ageEndOw4]) // Filter by age (in months)
    //       ->groupBy('gender') 
    //       ->get();

    //   // Get the count of boys and girls
    //   $boysCountOw4 = $wfaCountsOw4->firstWhere('gender', 'male')?->count ?? 0;
    //   $girlsCountOw4 = $wfaCountsOw4->firstWhere('gender', 'female')?->count ?? 0;


    //    // ========================================================================================== //

    //    $ageStartOw5 = 36;
    //    $ageEndOw5 = 47; 
 
    //    $wfaCountsOw5 = Patients::select(DB::raw('gender, COUNT(*) as count'))
    //        ->where('wfa', 'Overweight')
    //        ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartOw5, $ageEndOw5]) // Filter by age (in months)
    //        ->groupBy('gender') 
    //        ->get();
 
    //    // Get the count of boys and girls
    //    $boysCountOw5 = $wfaCountsOw5->firstWhere('gender', 'male')?->count ?? 0;
    //    $girlsCountOw5 = $wfaCountsOw5->firstWhere('gender', 'female')?->count ?? 0;

    // ========================================================================================== //
    //                                       Overweight Chart                                     //
    // ========================================================================================== //

    $ageRanges = [
        [0, 5],
        [6, 11],
        [12, 23],
        [24, 35],
        [36, 47],
        [48, 59]
    ];

    $countsByAgeRange = [];

    foreach ($ageRanges as $range) {
        [$ageStart, $ageEnd] = $range;

        $wfaCounts = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Overweight')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStart, $ageEnd])
            ->groupBy('gender')
            ->get();

        $countsByAgeRange[] = [
            'boys' => $wfaCounts->firstWhere('gender', 'male')?->count ?? 0,
            'girls' => $wfaCounts->firstWhere('gender', 'female')?->count ?? 0,
        ];
    }


// ========================================================================================== //
//                                       Underweight Chart                                    //
// ========================================================================================== //



    $ageRangesUnder = [
        [0, 5],
        [6, 11],
        [12, 23],
        [24, 35],
        [36, 47],
        [48, 59]
    ];

    $countsByAgeRangeUnder = [];

    foreach ($ageRangesUnder as $rangeUnder) {
        [$ageStartUnder, $ageEndUnder] = $rangeUnder;

        $wfaCountsUnder = Patients::select(DB::raw('gender, COUNT(*) as count'))
            ->where('wfa', 'Underweight')
            ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartUnder, $ageEndUnder])
            ->groupBy('gender')
            ->get();

        $countsByAgeRangeUnder[] = [
            'boys' => $wfaCountsUnder->firstWhere('gender', 'male')?->count ?? 0,
            'girls' => $wfaCountsUnder->firstWhere('gender', 'female')?->count ?? 0,
        ];
    }


// ========================================================================================== //
//                                      Severely Underweight Chart                            //
// ========================================================================================== //


        $ageRangesSeU = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeSeU  = [];

        foreach ($ageRangesSeU  as $rangeSeU ) {
            [$ageStartSeU , $ageEndSeU ] = $rangeSeU ;

            $wfaCountsSeU  = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfa', 'Severely Underweight')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartSeU , $ageEndSeU ])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeSeU [] = [
                'boys' => $wfaCountsSeU ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $wfaCountsSeU ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }


        // ========================================================================================== //
        //                                      Length/Height for Age Normal Chart                            //
        // ========================================================================================== //


        $ageRangesLfaN = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeLfaN  = [];

        foreach ($ageRangesLfaN  as $rangeLfaN ) {
            [$ageStartLfaN , $ageEndLfaN  ] = $rangeLfaN  ;

            $lfaCountsLfaN   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('hfa', 'Normal')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartLfaN, $ageEndLfaN ])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeLfaN  [] = [
                'boys' => $lfaCountsLfaN ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $lfaCountsLfaN ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }


        // ========================================================================================== //
        //                                      Length/Height for Age Stunted Chart                            //
        // ========================================================================================== //


        $ageRangesLfaS = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeLfaS  = [];

        foreach ($ageRangesLfaS  as $rangeLfaS ) {
            [$ageStartLfaS , $ageEndLfaS  ] = $rangeLfaS  ;

            $lfaCountsLfaS   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('hfa', 'Stunted')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartLfaS, $ageEndLfaS ])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeLfaS  [] = [
                'boys' => $lfaCountsLfaS ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $lfaCountsLfaS ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }


        // ========================================================================================== //
        //                                      Length/Height for Age Severely Stunted Chart                            //
        // ========================================================================================== //


        $ageRangesLfaSt = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeLfaSt  = [];

        foreach ($ageRangesLfaSt  as $rangeLfaSt ) {
            [$ageStartLfaSt , $ageEndLfaSt  ] = $rangeLfaSt  ;

            $lfaCountsLfaSt   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('hfa', 'Severely Stunted')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartLfaSt, $ageEndLfaSt ])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeLfaSt  [] = [
                'boys' => $lfaCountsLfaSt ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $lfaCountsLfaSt ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }



        // ========================================================================================== //
        //                                      Length/Height for Age Severely Stunted Chart                            //
        // ========================================================================================== //


        $ageRangesLfaT = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeLfaT  = [];

        foreach ($ageRangesLfaT  as $rangeLfaT ) {
            [$ageStartLfaT , $ageEndLfaT  ] = $rangeLfaT  ;

            $lfaCountsLfaT   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('hfa', 'Tall')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartLfaT, $ageEndLfaT ])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeLfaT  [] = [
                'boys' => $lfaCountsLfaT ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $lfaCountsLfaT ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }



        // ========================================================================================== //
        //                                    Weight for  Length/Height Normal                          //
        // ========================================================================================== //

        $ageRangesWflN = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeWflN  = [];

        foreach ($ageRangesWflN  as $rangeWflN ) {
            [$ageStartWflN , $ageEndWflN  ] = $rangeWflN  ;

            $wflCountsWflN   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfl_h', 'Normal')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartWflN, $ageEndWflN])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeWflN  [] = [
                'boys'  => $wflCountsWflN ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $wflCountsWflN ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }

        // ========================================================================================== //
        //                                    Weight for  Length/Height SAM                         //
        // ========================================================================================== //

        $ageRangesWflS = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeWflS  = [];

        foreach ($ageRangesWflS  as $rangeWflS ) {
            [$ageStartWflS , $ageEndWflS  ] = $rangeWflS  ;

            $wflCountsWflS   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfl_h', 'SAM')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartWflS, $ageEndWflS])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeWflS  [] = [
                'boys'  => $wflCountsWflS ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $wflCountsWflS ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }


        // ========================================================================================== //
        //                                    Weight for  Length/Height MAM                         //
        // ========================================================================================== //

        $ageRangesWflM = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeWflM  = [];

        foreach ($ageRangesWflM  as $rangeWflM ) {
            [$ageStartWflM , $ageEndWflM  ] = $rangeWflM  ;

            $wflCountsWflM   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfl_h', 'MAM')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartWflM, $ageEndWflM])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeWflM  [] = [
                'boys'  => $wflCountsWflM ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $wflCountsWflM ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }

        // ========================================================================================== //
        //                                    Weight for Length/Height Obese                        //
        // ========================================================================================== //

        $ageRangesWflOb = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeWflOb  = [];

        foreach ($ageRangesWflOb  as $rangeWflOb ) {
            [$ageStartWflOb , $ageEndWflOb  ] = $rangeWflOb  ;

            $wflCountsWflOb   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfl_h', 'Obese')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartWflOb, $ageEndWflOb])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeWflOb  [] = [
                'boys'  => $wflCountsWflOb ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $wflCountsWflOb ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }


          // ========================================================================================== //
        //                                    Weight for Length/Height Obese                        //
        // ========================================================================================== //

        $ageRangesWflOv = [
            [0, 5],
            [6, 11],
            [12, 23],
            [24, 35],
            [36, 47],
            [48, 59]
        ];

        $countsByAgeRangeWflOv  = [];

        foreach ($ageRangesWflOv  as $rangeWflOv ) {
            [$ageStartWflOv , $ageEndWflOv  ] = $rangeWflOv  ;

            $wflCountsWflOv   = Patients::select(DB::raw('gender, COUNT(*) as count'))
                ->where('wfl_h', 'Overweight')
                ->whereBetween(DB::raw('TIMESTAMPDIFF(MONTH, birthday, NOW())'), [$ageStartWflOv, $ageEndWflOv])
                ->groupBy('gender')
                ->get();

            $countsByAgeRangeWflOv  [] = [
                'boys'  => $wflCountsWflOv ->firstWhere('gender', 'male')?->count ?? 0,
                'girls' => $wflCountsWflOv ->firstWhere('gender', 'female')?->count ?? 0,
            ];
        }


        $counAllPatient = Patients::count();



        return view('layouts.dashboard', 
        compact('boysCount', 'girlsCount', 'boysCount2', 'girlsCount2','boysCount3', 'girlsCount3','boysCount4', 'girlsCount4','boysCount5', 'girlsCount5','girlsCount4','boysCount6', 'girlsCount6',
                 'countsByAgeRange', 'countsByAgeRangeUnder','countsByAgeRangeSeU', 'countsByAgeRangeLfaN','countsByAgeRangeLfaS','countsByAgeRangeLfaSt','countsByAgeRangeLfaT','countsByAgeRangeWflN',
                 'countsByAgeRangeWflS', 'countsByAgeRangeWflM', 'countsByAgeRangeWflOb', 'countsByAgeRangeWflOv'));

}
}