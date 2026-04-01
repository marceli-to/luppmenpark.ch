<?php
namespace App\Console\Commands;

use App\Mail\SubscriberListMail;
use App\Models\NewsletterSubscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSubscriberList extends Command
{
    protected $signature = 'subscribers:send-list';
    protected $description = 'Export all newsletter subscribers as CSV and send to info@luppmenpark.ch';

    public function handle(): int
    {
        $subscribers = NewsletterSubscription::all();

        if ($subscribers->isEmpty()) {
            $this->info('No subscribers found.');
            return self::SUCCESS;
        }

        $csvPath = storage_path('app/newsletter-abonnenten.csv');
        $file = fopen($csvPath, 'w');

        // BOM for Excel UTF-8 compatibility
        fwrite($file, "\xEF\xBB\xBF");

        fputcsv($file, [
            'Interesse',
            'Bevorzugtes Haus',
            'Bevorzugtes Stockwerk',
            'Vorname',
            'Name',
            'Adresse',
            'PLZ / Ort',
            'E-Mail',
            'Telefon',
            'Geburtsdatum',
            'Anzahl Personen im Haushalt',
            'Bereits Genossenschaftler, seit?',
            'Anmeldedatum',
        ], ';');

        foreach ($subscribers as $subscriber) {
            fputcsv($file, [
                $subscriber->interest,
                $subscriber->preferred_house ?? '',
                $subscriber->preferred_floor ?? '',
                $subscriber->firstname,
                $subscriber->name,
                $subscriber->address,
                $subscriber->location,
                $subscriber->email,
                $subscriber->phone,
                $subscriber->date_of_birth?->format('d.m.Y') ?? '',
                $subscriber->household_count,
                $subscriber->cooperative_member,
                $subscriber->created_at->format('d.m.Y'),
            ], ';');
        }

        fclose($file);

        Mail::to('info@luppmenpark.ch')->send(new SubscriberListMail($csvPath, $subscribers->count()));

        unlink($csvPath);

        $this->info("Subscriber list sent to info@luppmenpark.ch ({$subscribers->count()} entries).");

        return self::SUCCESS;
    }
}
