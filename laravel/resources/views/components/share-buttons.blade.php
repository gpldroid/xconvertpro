@php
    $shareButtons = ShareButtons::page(url()->current(), SEOMeta::getTitle(), [
        'rel' => 'nofollow noopener noreferrer',
    ]);
    if ($settings->enableVKontakte) {
        $shareButtons->vkontakte([
            'title' => $settings->vkontakte,
        ]);
    }
    if ($settings->enableEvernote) {
        $shareButtons->evernote([
            'title' => $settings->evernote,
        ]);
    }
    if ($settings->enableSkype) {
        $shareButtons->skype([
            'title' => $settings->skype,
        ]);
    }
    if ($settings->enableFacebook) {
        $shareButtons->facebook([
            'title' => $settings->facebook,
        ]);
    }
    if ($settings->enableTwitter) {
        $shareButtons->twitter([
            'title' => $settings->twitter,
        ]);
    }
    if ($settings->enableWhatsApp) {
        $shareButtons->whatsapp([
            'title' => $settings->whatsapp,
        ]);
    }
    if ($settings->enableTelegram) {
        $shareButtons->telegram([
            'title' => $settings->telegram,
        ]);
    }
    if ($settings->enableReddit) {
        $shareButtons->reddit([
            'title' => $settings->reddit,
        ]);
    }
    if ($settings->enablePinterest) {
        $shareButtons->pinterest([
            'title' => $settings->pinterest,
        ]);
    }
    if ($settings->enableHackerNews) {
        $shareButtons->hackernews([
            'title' => $settings->hackernews,
        ]);
    }
    if ($settings->enableLinkedIn) {
        $shareButtons->linkedin([
            'title' => $settings->linkedin,
        ]);
    }
@endphp

@if (
    $settings->enableFacebook ||
        $settings->enableTwitter ||
        $settings->enableWhatsApp ||
        $settings->enableTelegram ||
        $settings->enableReddit ||
        $settings->enableLinkedIn ||
        $settings->enablePinterest ||
        $settings->enableSkype ||
        $settings->enableEvernote ||
        $settings->enableVKontakte ||
        $settings->enableHackerNews)
    <div class="text-center share-buttons">
        <h4 class="mb-1 text-lg font-medium text-center">{{ __('Like it? Share it!') }}</h4>
        {!! $shareButtons->render() !!}
    </div>
@endif
