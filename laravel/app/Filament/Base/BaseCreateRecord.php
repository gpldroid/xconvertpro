<?php

namespace App\Filament\Base;

use App\Dashboard;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class BaseCreateRecord extends CreateRecord
{

    protected array $toSanitize = [];

    # override the CreateRecord method
    # $data is the data from the page's form
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        foreach (static::getResource()::$toSanitize as $field) {
            if (!Str::contains($field, '.')) {
                $data[$field] = Purify::clean($data[$field]);
                continue;
            }

            $exp = explode('.', $field);

            if (count($exp) == 2) {
                for ($i = 0; $i < count($data[$exp[0]]); $i++) {
                    $data[$exp[0]][$i][$exp[1]] = Purify::clean($data[$exp[0]][$i][$exp[1]]);
                }
            }
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        // if (static::getModel() === Page::class) {
        //     cache()->forget(cacheKey('navPages'));
        // }
        // if (static::getModel() === Post::class) {
        //     cache()->forget(cacheKey('recent.posts'));
        //     removePaginationCache();
        // }
        cache()->flush();
        return static::getModel()::create($data);
    }

    public function create(bool $another = false): void
    {
        if (!Dashboard::DEMO_MODE) {
            parent::create($another);
        } else {
            notify('warning', 'This feature is disabled in Demo Mode.');
        }
    }

    public function createAndCreateAnother(): void
    {
        if (!Dashboard::DEMO_MODE) {
            parent::createAndCreateAnother();
        } else {
            notify('warning', 'This feature is disabled in Demo Mode.');
        }
    }
}
