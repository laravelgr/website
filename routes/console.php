<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

    /**
     * pick a random winner out of meetup.com - without an api call.
     * Needs manually work, to save in participants.html the file from meetup.com so it can be parsed.
     */
Artisan::command('picker', function () {

    $html = Storage::get('participants.html');

    $participants = [];
    (new PHPHtmlParser\Dom())->loadStr($html)->find('h4.text--ellipsisOneLine')->each(function($item) use (&$participants){
        $participants[] = $item->innerHtml();
    });

    $this->info("The winner is... ".collect($participants)->random().' ! ');

})->purpose('pick a winner randomly from meetup.com');
