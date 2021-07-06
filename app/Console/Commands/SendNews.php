<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;
use App\Email;
use App\Contact;
use Mail;

class SendNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $news = Post::where('email', NULL)->select('id', 'title', 'image', 'text', 'author')->orderBy('id')->get();
        if ($news) {
            $contacts = Contact::first();
            $userEmails = Email::all();
            foreach ($news as $new) {
                foreach ($userEmails as $userEmail) {
                    Mail::send('pages.mails.news',
                        array(
                            'new' => $new,
                            'email' => $userEmail,
                            'contacts' => $contacts
                        ), function($message) use ($userEmail, $new)
                    {
                        $message->to($userEmail->email)->subject($new->title);
                    });
                    $new->email = 1;
                    $new->save();
                }
            }
        }

    }    
}
