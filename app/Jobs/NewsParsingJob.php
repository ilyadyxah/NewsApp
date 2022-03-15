<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\ParserController;
use App\Services\NewsParser;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class NewsParsingJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NewsParser $parser)
    {
        $data = $parser->run($this->source);
        ParserController::writeToDb($data);

    }


    /**
     * Обработать провал задания.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(Throwable $exception)
    {
        $data = DB::table('failed_jobs')->orderByDesc('failed_at')->first();
        $message =
            'date= ' . $data->failed_at . "\n" .
            'id= ' . $data->id . "\n" .
            'uuid= ' . $data->uuid . "\n" .
            'message= ' . $exception->getMessage() . "\n";
        Storage::append('parser_log', $message);
    }
}
