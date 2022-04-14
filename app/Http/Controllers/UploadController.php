<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    // For uploading the csv file unto the server
    public function uploadFile(Request $request)
    {

        if ($request->has('upload')) {

            if ($request->upload->extension() !== 'csv') {

                Session::flash('error', 'Invalid file extension, only csv is allowed.');

                return back();
            }

            $request->upload->storeAs('public/files', $request->upload->getClientOriginalName());

            Session::flash('success', 'File uploaded successfully.');

            $fileContent = [];

            if (($open = fopen(asset('/storage/files/' . $request->upload->getClientOriginalName()), 'r')) !== false) {

                while(($data = fgetcsv($open, 1000, ",")) !== false) {

                    $fileContent[] = $data;

                   }

                fclose($open);
            }

             // Mapping the csv file content into the database using seeder
            for ($i = 1; $i < count($fileContent); $i++) {

                // Checking for all properties of the data to map to database
                if (count($fileContent[$i]) == 16) {

                    Movies::create([
                        'media_type' => $fileContent[$i][1],
                        'name' => $fileContent[$i][2],
                        'short_name' => $fileContent[$i][3],
                        'long_description' => $fileContent[$i][4],
                        'short_description' => $fileContent[$i][5],
                        'created_at' => $fileContent[$i][6],
                        'updated_at' => $fileContent[$i][7],
                        'review_url' => $fileContent[$i][8],
                        'review_score' => $fileContent[$i][9],
                        'slug' => $fileContent[$i][10],
                        'genres' => $fileContent[$i][11],
                        'created_by' => $fileContent[$i][12],
                        'published_by' => $fileContent[$i][13],
                        'franchises' => $fileContent[$i][14],
                        'regions' => $fileContent[$i][15],
                    ]);
                }
            }


            return back();
        }

    }


}
