<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoviesSeeder extends Seeder
{
    private $fileContent = [];
    /**
     * Run the database seeds.
     *
     * Run php artisan db:seed --class=MoviesSeeder to populate file content into database
     *
     * @return void
     */
    public function run()
    {
        // import the csv file from path and copying content into an array
        $csvData = fopen(asset('/storage/files/codefoobackend_cfgames.csv'), 'r');
        if ($csvData !== false) {

            while(($data = fgetcsv($csvData, 1000, ",")) !== false) {

                $this->fileContent[] = $data;

               }

            fclose($csvData);
        }

        // Mapping the csv file content into the database using seeder
        for ($i = 1; $i < count($this->fileContent); $i++) {

            // Checking for all properties
            if (count($this->fileContent[$i]) == 16) {

                Movies::create([
                    'media_type' => $this->fileContent[$i][1],
                    'name' => $this->fileContent[$i][2],
                    'short_name' => $this->fileContent[$i][3],
                    'long_description' => $this->fileContent[$i][4],
                    'short_description' => $this->fileContent[$i][5],
                    'created_at' => $this->fileContent[$i][6],
                    'updated_at' => $this->fileContent[$i][7],
                    'review_url' => $this->fileContent[$i][8],
                    'review_score' => $this->fileContent[$i][9],
                    'slug' => $this->fileContent[$i][10],
                    'genres' => $this->fileContent[$i][11],
                    'created_by' => $this->fileContent[$i][12],
                    'published_by' => $this->fileContent[$i][13],
                    'franchises' => $this->fileContent[$i][14],
                    'regions' => $this->fileContent[$i][15],
                ]);
            }
        }
    }
}
