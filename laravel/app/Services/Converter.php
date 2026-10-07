<?php

namespace App\Services;

use App\Exceptions\UnsupportedFormatException;
use Imagick;

final class Converter
{
    private Imagick $imagick;
    private string $imagePath;
    private string $baseName;
    private string $convertedPath;
    private string $outputFormat;

    public function __construct(private Processor $processor)
    {
        $this->processor = $processor;
        $this->imagick = new Imagick;
    }

    public function setImage(string $path): self
    {
        $this->imagePath = $path;
        $this->baseName = pathinfo(basename($path), PATHINFO_FILENAME);
        $this->initImagick();
        return $this;
    }

    public function format(string $format): self
    {
        $this->outputFormat = $format;
        return $this;
    }

    public function saveTo(string $save_path): self
    {
        $this->convertedPath = $save_path;
        return $this;
    }

    public function convert(): void
    {
        switch ($this->outputFormat) {
                # transparent images
            case 'apng':
            case 'bmp':
            case 'djvu':
            case 'gif':
            case 'ico':
            case 'png':
            case 'tiff':
            case 'webp':
                $this->imagick->setBackgroundColor(new \ImagickPixel('transparent'));
                break;

                # for non-transparent images, set background to white
            default:
                $this->imagick->setBackgroundColor('white');
                $this->imagick->setImageBackgroundColor('white');
                $this->imagick = $this->imagick->mergeImageLayers(Imagick::LAYERMETHOD_MERGE);
                break;
        }

        switch ($this->outputFormat) {
            case 'ai':
                $this->imagick = $this->processor->processAI($this->imagick);
                break;

            case 'apng':
                $this->imagick = $this->processor->processAPNG($this->imagick);
                break;

            case 'avif':
                $this->imagick = $this->processor->processAVIF($this->imagick);
                break;

            case 'bmp':
                $this->imagick = $this->processor->processBMP($this->imagick,);
                break;

            case 'dds':
                $this->imagick = $this->processor->processDDS($this->imagick);
                break;

            case 'dib':
                $this->imagick = $this->processor->processDIB($this->imagick);
                break;

            case 'eps':
                $this->imagick = $this->processor->processEPS($this->imagick);
                break;

            case 'gif':
                $this->imagick = $this->processor->processGIF($this->imagick);
                break;

            case 'hdr':
                $this->imagick = $this->processor->processHDR($this->imagick);
                break;

            case 'heic':
                $this->imagick = $this->processor->processHEIC($this->imagick);
                break;

            case 'heif':
                $this->imagick = $this->processor->processHEIF($this->imagick);
                break;

            case 'ico':
                $this->imagick = $this->processor->processICO($this->imagick);
                break;

            case 'jp2':
                $this->imagick = $this->processor->processJP2($this->imagick);
                break;

            case 'jpg':
            case 'jpeg':
                $this->imagick = $this->processor->processJPEG($this->imagick);
                break;

            case 'jpe':
                $this->imagick = $this->processor->processJPE($this->imagick);
                break;

            case 'pdf':
                $this->imagick = $this->processor->processPDF($this->imagick);
                break;

            case 'png':
                $this->imagick = $this->processor->processPNG($this->imagick);
                break;

            case 'psd':
                $this->imagick = $this->processor->processPSD($this->imagick);
                break;

            case 'raw':
                $this->imagick = $this->processor->processRAW($this->imagick);
                break;

            case 'svg':
                $this->imagick = $this->processor->processSVG($this->imagick);
                break;

            case 'tga':
                $this->imagick = $this->processor->processTGA($this->imagick);
                break;

            case 'tiff':
                $this->imagick = $this->processor->processTIFF($this->imagick);
                break;

            case 'wbmp':
                $this->imagick = $this->processor->processWBMP($this->imagick);
                break;

            case 'webp':
                $this->imagick = $this->processor->processWEBP($this->imagick);
                break;

            default:
                throw new UnsupportedFormatException;
        }
        
        $this->imagick->writeImage($this->convertedPath . '/' . $this->baseName . '.' . $this->outputFormat);
    }

    private function initImagick(): void
    {
        $this->imagick->clear();
        $this->imagick->readImage($this->imagePath);
        $this->imagick->setImageType(Imagick::IMGTYPE_TRUECOLORMATTE);
        // currently animations are not supported
        // so all images are turned into static
        // $this->imagick = $this->removeAnimation($this->imagick);
        // reset image orientation
        $this->imagick->setImageOrientation(Imagick::ORIENTATION_UNDEFINED);
    }

    private function removeAnimation(Imagick $object): Imagick
    {
        $imagick = new Imagick;
        foreach ($object as $frame) {
            $imagick->addImage($frame->getImage());
            break;
        }
        $object->destroy();
        return $imagick;
    }

    public function __destruct()
    {
        if (isset($this->imagick)) {
            $this->imagick->clear();
            $this->imagick->destroy();
        }
    }
}
