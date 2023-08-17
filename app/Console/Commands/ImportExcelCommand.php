<?php

namespace App\Console\Commands;

use App\Components\HttpImportDataClient;
use App\Imports\PostsImport;
use App\Models\Post;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from excel Http Client';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new PostsImport(), '/Users/mac/laravel/public/excel/posts.xlsx');
        return 0;
    }
}
