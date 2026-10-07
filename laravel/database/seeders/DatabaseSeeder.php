<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'label' => 'About Us',
                'location' => 'footer',
                'metaDescription' => 'About us meta description',
                'metaKeywords' => 'meta, key, words',
                'noIndex' => false,
                'topAd' => false,
                'bottomAd' => false,
                'showShareButtons' => false,
                'content' => '<h2>About Us</h2><p>About us page content.</p>',
                'created_at' => Carbon::now(),
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'label' => 'Privacy Policy',
                'location' => 'footer',
                'metaDescription' => 'Privacy policy meta description',
                'metaKeywords' => 'meta, key, words',
                'noIndex' => false,
                'topAd' => false,
                'bottomAd' => false,
                'showShareButtons' => false,
                'content' => '<h2>Privacy Policy</h2><p>Privacy policy page content.</p>',
                'created_at' => Carbon::now(),
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'TOS',
                'slug' => 'terms-of-use',
                'label' => 'TOS',
                'location' => 'footer',
                'metaDescription' => 'Terms of use meta description',
                'metaKeywords' => 'meta, key, words',
                'noIndex' => false,
                'topAd' => false,
                'bottomAd' => false,
                'showShareButtons' => false,
                'content' => '<h2>Terms of Use</h2><p>Terms of use page content.</p>',
                'created_at' => Carbon::now(),
                'published_at' => Carbon::now(),
            ]
        ]);
    }
}
