<?php

namespace App\Http\Controllers;

use App\Settings\ContactPageSettings;
use Artesaos\SEOTools\Facades\SEOTools;

class ContactPageController extends Controller
{
    public function index(
        ContactPageSettings $contactSettings
    ) {
        if ($contactSettings->show) {
            SEOTools::webPage(
                title: $contactSettings->title,
                description: $contactSettings->metaDescription,
                keyWords: $contactSettings->metaKeywords,
            );

            return view('pages.contact', [
                'settings' => $contactSettings
            ]);
        } else {
            abort(404);
        }
    }
}
