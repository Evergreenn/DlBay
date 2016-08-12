<?php

namespace DlBay\Jobs;

use DlBay\File;
use DlBay\Jobs\Job;
use League\Flysystem\Exception;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadFile extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $request;

    /**
     * UploadFile constructor.
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //TODO:Check pourquoi le jeton CSRF ne match pas sur les files > 35 Mo

        try{

                Storage::put(
                    $this->request['name'],
                    file_get_contents($this->request['path'])
                );

            //            if ($this->attempts() > 3) {

            //TODO:Log this
        }catch(Exception $e){
            echo "Ouuups stg went wrong : ";
            var_dump($e->getFile()."\n");
            var_dump($e->getMessage()."\n");
            var_dump($e->getCode());
        }

    }
}
