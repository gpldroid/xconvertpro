<?php

namespace App\Livewire;

use App\Models\ConvertsCounter;
use App\Services\Converter;
use App\Settings\UploaderSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use ZipArchive;

class Uploader extends Component
{
    public array $routes;
    public string $maxFileSize;
    public int $maxFiles;
    public array $locales;
    // public array $supportedFormats;

    public array $results = [];
    public string $slug;
    public string $format;

    public bool $showUploader = true;

    public function mount(UploaderSettings $settings)
    {
        deleteOldImages($settings->deleteTime);

        $this->routes = [
            'upload' => localizedRoute('upload'),
        ];
        $this->maxFileSize = "{$settings->maxFileSize} MB";
        $this->maxFiles = $settings->maxFiles;
        $this->locales = [
            'dragNDrop' => __('Or drop up to :files images here - Max size is :size MB', ['files' => $settings->maxFiles, 'size' => $settings->maxFileSize]),
            'browseFiles' => __('Browse Files'),
            'labelInvalidField' => __('Field contains invalid files'),
            'labelFileWaitingForSize' => __('Waiting for size'),
            'labelFileSizeNotAvailable' => __('Size not available'),
            'labelFileLoading' => __('Loading'),
            'labelFileLoadError' => __('Error during load'),
            'labelFileProcessing' => __('Uploading'),
            'labelFileProcessingComplete' => __('Upload complete'),
            'labelFileProcessingAborted' => __('Upload cancelled'),
            'labelFileProcessingRevertError' => __('Error during revert'),
            'labelFileRemoveError' => __('Error during remove'),
            'labelTapToCancel' => __('tap to cancel'),
            'labelTapToRetry' => __('tap to retry'),
            'labelTapToUndo' => __('tap to undo'),
            'labelButtonRemoveItem' => __('Remove'),
            'labelButtonAbortItemLoad' => __('Abort'),
            'labelButtonRetryItemLoad' => __('Retry'),
            'labelButtonAbortItemProcessing' => __('Cancel'),
            'labelButtonUndoItemProcessing' => __('Undo'),
            'labelButtonRetryItemProcessing' => __('Retry'),
            'labelButtonProcessItem' => __('Upload'),
            'labelFileTypeNotAllowed' => __('Cannot read this image format'),
            'fileValidateTypeLabelExpectedTypes' => __('Expects an image'),
            'labelMaxFileSizeExceeded' => __('Image is too large'),
            'labelMaxFileSize' => __('Maximum image size is {filesize}'),
            'maxUploadExceeded' => __('Max upload files exceeded'),
        ];

        // $aiSettings   = app(ImageToAiSettings::class);
        // $apngSettings = app(ImageToApngSettings::class);
        // $avifSettings = app(ImageToAvifSettings::class);
        // $bmpSettings  = app(ImageToBmpSettings::class);
        // $ddsSettings  = app(ImageToDdsSettings::class);
        // $epsSettings  = app(ImageToEpsSettings::class);
        // $gifSettings  = app(ImageToGifSettings::class);
        // $hdrSettings  = app(ImageToHdrSettings::class);
        // $heicSettings  = app(ImageToHeicSettings::class);
        // $heifSettings  = app(ImageToHeifSettings::class);
        // $icoSettings  = app(ImageToIcoSettings::class);
        // $jp2Settings  = app(ImageToJp2Settings::class);
        // $jpeSettings  = app(ImageToJpeSettings::class);
        // $pdfSettings  = app(ImageToPdfSettings::class);
        // $pngSettings  = app(ImageToPngSettings::class);
        // $psdSettings  = app(ImageToPsdSettings::class);
        // $rawSettings  = app(ImageToRawSettings::class);
        // $svgSettings  = app(ImageToSvgSettings::class);
        // $tgaSettings  = app(ImageToTgaSettings::class);
        // $jpegSettings = app(ImageToJpegSettings::class);
        // $tiffSettings = app(ImageToTiffSettings::class);
        // $webpSettings = app(ImageToWebpSettings::class);

        // $this->supportedFormats = [
        //     # if eps is enabled, ai can still be picked by the filepicker but rejected by filepond
        //     ...($aiSettings->enabled ? [
        //         "application/illustrator",
        //         "application/postscript"
        //     ] : []),
        //     ...($apngSettings->enabled ? ["image/apng"] : []),
        //     ...($avifSettings->enabled ? ["image/avif"] : []),
        //     # if bmp is supported, so does dib
        //     ...($bmpSettings->enabled ? ["image/bmp", ".dib"] : []),
        //     ...($ddsSettings->enabled ? ["image/x-dds", ".dds"] : []),
        //     # djvu is read only
        //     "image/vnd.djvu", ".djvu",
        //     # if ai is enabled, eps can still be picked by the filepicker but rejected by filepond
        //     ...($epsSettings->enabled ? ["application/postscript", "image/x-eps"] : []),
        //     ...($gifSettings->enabled ? ["image/gif"] : []),
        //     ...($hdrSettings->enabled ? ["image/x-hdr", ".hdr"] : []),
        //     ...($heicSettings->enabled ? ["image/heif", ".heic"] : []),
        //     ...($heifSettings->enabled ? ["image/heif", ".heif"] : []),
        //     ...($icoSettings->enabled ? ["image/vnd.microsoft.icon", "image/x-ico"] : []),
        //     ...($jp2Settings->enabled ? ["image/jp2", ".jp2"] : []),
        //     ...($jpegSettings->enabled ? ["image/jpeg"] : []),
        //     ...($jpeSettings->enabled ? ["image/jpeg", ".jpe"] : []),
        //     ...($pdfSettings->enabled ? ["application/pdf"] : []),
        //     ...($pngSettings->enabled ? ["image/png"] : []),
        //     ...($psdSettings->enabled ? ["image/vnd.adobe.photoshop", ".psd"] : []),
        //     ...($rawSettings->enabled ? ["image/x-panasonic-rw", ".raw"] : []),
        //     ...($svgSettings->enabled ? ["image/svg+xml"] : []),
        //     ...($tgaSettings->enabled ? ["image/x-tga", ".tga"] : []),
        //     ...($tiffSettings->enabled ? ["image/tiff"] : []),
        //     ...($webpSettings->enabled ? ["image/webp"] : []),
        // ];
    }

    public function render()
    {
        return view('livewire.uploader');
    }

    public function save(Request $request)
    {
        try {
            if ($request->hasFile(('image'))) {
                $image = $request->file('image');

                # https://www.php.net/manual/en/function.is-uploaded-file.php
                if (!$image->isValid()) {
                    Log::error($image->getErrorMessage());
                    return response(__('Invalid file upload'), 500);
                }

                do {
                    $id = uniqid();
                } while (!empty(File::glob(storage_path("uploads/{$id}.*"))));

                # save the image
                $saved = $image->storeAs('uploads', $id . '.' . $image->extension(), 'upload_storage');
                if ($saved) return $id;
                return response(__('Image could not be saved'), 500);
            }
            return response(__('No image provided'), 400);
        } catch (\Throwable $th) {
            # this try catch will prevent sending error page html to the uploader
            Log::error($th);
            return response(__('An unexpected error has occured'), 500);
        }
    }

    public function convert(
        array $images,
        Converter $converter
    ) {
        if (!Storage::disk('upload_storage')->exists('converted')) {
            Storage::disk('upload_storage')->makeDirectory('converted');
        }
        foreach ($images as $image) {
            $id = $image['id'];
            $basename = $image['basename'];
            $originalName = $image['originalName'];

            # check if image is not deleted (after an hour or some other unexpected way)
            if (empty($glob = File::glob(storage_path("uploads/{$id}.*")))) {
                $this->addError($id, __("Image {$originalName} deleted"));
                continue;
            }

            try {
                # convert the image
                $converter->setImage($glob[0])
                    ->format($this->format)
                    ->saveTo(storage_path("converted"))
                    ->convert();

                ConvertsCounter::incrementCounter();

                $convertPath = storage_path("converted/{$id}.{$this->format}");
                $this->results['images'][] = [
                    'id' => $id,
                    'basename' => $basename,
                    'size' => size($convertPath)
                ];
            } catch (\ImagickException $e) {
                /** 
                 * imagick can throw exception on read or write: 
                 * + image corrupted
                 * + unsupported type
                 * + some library is required
                 * + ...
                 */
                $message = $e->getMessage();
                if (
                    str_contains(
                        $message,
                        "no decode delegate for this image format"
                    ) ||
                    str_contains(
                        $message,
                        # read pdf, ai , and eps
                        # svg no library
                        "attempt to perform a Stack trace"
                    ) ||
                    str_contains(
                        $message,
                        # libmagickcore-6.q16-6-extra - read svg
                        "unable to open file Stack trace"
                    ) ||
                    str_contains(
                        $message,
                        # potrace - write svg
                        "delegate failed `'poStack trace"
                    )
                ) {
                    $this->addError($id, __("Image {$originalName} could not be converted. This format is probably not supported."));
                } else {
                    $this->addError($id, __("Image {$originalName} could not be converted to :format format", ['format' => strtoupper($this->format)]));
                }
                Log::error($e);
            } catch (\Throwable $th) {
                /** 
                 * imagick can throw exception on read or write: 
                 * + image corrupted
                 * + unsupported type
                 * + some library is required
                 */
                $this->addError($id, __("Image couldn't be converted. Unexpected Error has occured"));
                Log::error($th);
            }
        }
        if (!empty($this->results)) {
            $zipId = $this->compress($this->results['images']);
            $this->results['zipId'] = $zipId;
        }
        $this->showUploader = false;
        # dispatched if result or error
        $this->dispatch('scrollResultIntoView');
    }

    public function delete(string $id)
    {
        $deleted = false;
        if (!empty($glob = File::glob(storage_path("uploads/{$id}.*")))) {
            $deleted = File::delete($glob[0]);
        }
        return $deleted;
    }

    public function deleteAll()
    {
        $deleted = false;
        foreach ($this->results['images'] as $result) {
            # glob(...*"))[0] throw error if file doe not exist
            if (!empty($glob = File::glob(storage_path("uploads/{$result['id']}.*")))) {
                $deleted = File::delete($glob[0]);
            }
            if (file_exists(
                $converted = storage_path("converted/{$result['id']}.{$this->format}")
            )) {
                $deleted = File::delete($converted);
            }
        }
        return $deleted;
    }

    public function download(
        Request $request,
        UploaderSettings $settings
    ) {
        $id = $request->query('id');
        $basename = $request->query('basename');
        $format = $request->query('format');
        # check if image is not deleted (after an hour or some other unexpected way)
        if (!file_exists(storage_path("converted/{$id}.{$format}"))) {
            return abort(404);
        }

        $name = $settings->prefix ?
            "{$settings->prefix}_{$basename}.{$format}"
            : "{$basename}.{$format}";

        return response()->download(
            storage_path("converted/{$id}.{$format}"),
            $name
        );
    }

    public function downloadZip(UploaderSettings $settings)
    {
        $zipId = request()->query('zipId');

        $archive = storage_path("converted/{$zipId}.zip");
        if (!file_exists($archive)) {
            return abort(404);
        }

        $name = $settings->prefix ?
            "{$settings->prefix}_images.zip"
            : "images.zip";
        return response()->download($archive, $name);
    }

    private function compress(array $results): ?string
    {
        do {
            $zipId = uniqid();
        } while (file_exists(storage_path("converted/{$zipId}.zip")));
        $archive = storage_path("converted/{$zipId}.zip");

        # create zip archive
        $zip = new ZipArchive;
        $res = $zip->open($archive, ZipArchive::CREATE);
        if (!$res) {
            Log::error("ZIP failed, code: {$res}");
            notify('danger', __('An error occurred while creating the ZIP archive'));
            return null;
        }
        foreach ($results as $result) {
            $converted = storage_path("converted/{$result['id']}.{$this->format}");
            $name = "{$result['basename']}.{$this->format}";
            if (!file_exists($converted)) {
                notify('danger', __('One or more images have been deleted'));
                return null;
            }
            $res = $zip->addFile($converted, $name);
            if (!$res) {
                Log::error("Failed to add image {$name} to ZIP archive");
                notify('danger', __('An error occurred while creating the ZIP file'));
                return null;
            }
        };
        $res = $zip->close();
        if (!$res) {
            Log::error("Failed to close ZIP instance");
            notify('danger', __('An error occurred while creating the ZIP file'));
            return null;
        }
        return $zipId;
    }
}
