<?php

namespace App\Console\Commands;

use App\Components\HttpImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:json-placeholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from json placeholder Http Client';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new HttpImportDataClient();
        $response = $import->client->request("GET");
        $data = json_decode($response->getBody()->getContents());
        foreach ($data as $datum) {
            Post::firstOrCreate(
                [
                    'title' => $datum->title
                ],
                [
                    'title' => $datum->title,
                    'category_id' => rand(4,33)
                ]);
        }
        return 0;
    }
}
