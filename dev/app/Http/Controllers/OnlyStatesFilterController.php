<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The controller to mock the only states filter feature.
 */
class OnlyStatesFilterController extends LabController
{
    const ONLY_STATES_LAB_FIXTURE = 'html/fixtures/only-states-mockups/labs.json';

    /**
     * Filter lab results by specific states.
     *
     * @param  Request  $request Http request
     * @return Response
     */
    public function labsNearCoords(Request $request)
    {
        if ($states = $request->get('filterByStates')) {
            $labsResult = array_filter($this->labs, function ($lab) use ($states) {
                return in_array($lab->state, $states);
            });

            return response()->json(array_merge([
                'labs'        => array_values($labsResult),
                'resultCount' => count($this->labs),
            ], $this->coord));
        }

        return parent::labsNearCoords($request);
    }

    /**
     * Load and parse the default labs.
     *
     * @return array
     */
    protected function loadLabs()
    {
        $content = file_get_contents(base_path(self::ONLY_STATES_LAB_FIXTURE));

        return json_decode($content);
    }
}
