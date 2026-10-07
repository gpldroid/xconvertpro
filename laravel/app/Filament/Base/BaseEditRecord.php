<?php

namespace App\Filament\Base;

use App\Dashboard;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Str;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class BaseEditRecord extends EditRecord
{
    protected array $toSanitize = [];

    # override the EditRecord method
    # $data is the data from the page's form
    protected function mutateFormDataBeforeSave(array $data): array
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

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        /**
         * Note: If the slug changed, the old cache will be deleted
         */
        # delete cache for page and post
        # removePagePostFromCache($record);
        # delete cache for nav pages only if a page is edited
        # it should be when location changed but there is no way to do that
        // if ($record instanceof Page) {
        //     cache()->forget(cacheKey('navPages'));
        // }
        // if ($record instanceof Post) {
        //     cache()->forget(cacheKey('recent.posts'));
        //     removePaginationCache();
        // }
        cache()->flush();
        $record->update($data);
        return $record;
    }

    public function save(bool $shouldRedirect = true): void
    {
        if (!Dashboard::DEMO_MODE) {
            parent::save($shouldRedirect);
        } else
            notify('warning', 'This feature is disabled in Demo Mode.');
    }

    protected function configureDeleteAction(DeleteAction $action): void
    {
        $resource = static::getResource();

        $action
            ->authorize($resource::canDelete($this->getRecord()) && !Dashboard::DEMO_MODE)
            ->record($this->getRecord())
            ->recordTitle($this->getRecordTitle())
            ->successRedirectUrl(function () use ($resource) {
                # delete cache for page and post
                // removePagePostFromCache($this->getRecord());
                // if ($this->record instanceof Page) {
                //     cache()->forget(cacheKey('navPages'));
                // }
                // if ($this->record instanceof Post) {
                //     cache()->forget(cacheKey('recent.posts'));
                //     removePaginationCache();
                // }
                cache()->flush();
                return $resource::getUrl('index');
            });
    }
}
