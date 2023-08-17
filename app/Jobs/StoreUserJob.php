<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use App\Services\User\Service;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    /**
     * @property array $data
     */
    public array $data;
    public Service $service;
    public function __construct(array $data, Service $service)
    {
        $this->data = $data;
        $this->service = $service;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //$this->data['password'] = Str::random(10);
        $user = $this->service->store($this->data);
        //Mail::to($this->data['email'])->send(new PasswordMail(password: $this->data['password']));
        //event(new Registered($user));
    }
}
