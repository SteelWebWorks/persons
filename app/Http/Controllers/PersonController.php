<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::with('log')->get();

        return view('people', [
            'people' => $people,
        ]);
    }

    public function uploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|mimetypes:application/xml,text/xml|max:10000',
            ]
        );

        $validator->validate();

        $xml = simplexml_load_string($request->file('file')->getContent());

        $json = json_encode($xml);
        $phpArray = json_decode($json, true);
        $logMessages = [];
        foreach ($phpArray['person'] as $key => $person) {
            $index = $key + 1;
            $xmlValidator = Validator::make(
                $person,
                [
                    'tax_identifier' => 'required|integer',
                    'fullname' => 'required|string',
                    'identifier' => 'required|integer|unique:people',
                    'other_identifier' => 'required|integer|unique:people',
                    'login' => 'required|date',
                    'logout' => 'required|date',
                    'email' => 'required|email',
                ],
                [
                    'required' => "The :attribute is missing at position {$index}",
                    'unique' => "The :attribute has already been taken at position {$index}",
                ]
            );

            if ($xmlValidator->stopOnFirstFailure()->fails()) {
                $logMessages[] = [
                    'success' => false,
                    'message' => $xmlValidator->messages()->first(),
                ];
            } else {
                $person = new Person($person);
                if ($person->save()) {
                    $logMessages[] = [
                        'success' => true,
                        'message' => "Person ID {$person['identifier']} saved successfully",
                    ];
                    $log = new Log([
                        'success' => 1,
                    ]);
                    $person->log()->save($log);
                } else {
                    $logMessages[] = [
                        'success' => false,
                        'message' => "Person ID {$person['identifier']} cannot be saved",
                    ];
                }
            }
        }
        return view('process', [
            'messages' => $logMessages,
        ]);
    }
}
