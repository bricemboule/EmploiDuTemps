<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\SerializeDom;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmploiDuTempsMail;
use Barryvdh\DomPDF\Facade\Pdf;
use DOMDocument;
use Illuminate\Support\Facades\Storage;

class EmploiDuTempJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $data;
    private $teacher;
    public function __construct($data,$teacher)
    {
        $this->data = $data;
        $this->teacher = $teacher;
       
    }

    /**
     * Execute the job.
     */
 
    public function handle(): void
    {
        $this->data = new DOMDocument();
        //$this->pdf();
        Mail::to($this->teacher)
                    //->cc('patrick.seumen@essfar.com', 'etienn.tsamo@essfar.con')
                    ->send(new EmploiDuTempsMail($this->data));
    }
}
