<?php

namespace App\Services;

use Imagick;

final class Processor
{
    const  QUALITY = 75;

    public function processAI(Imagick $imagick): Imagick
    {
        $format = 'ai';
        $compression = Imagick::COMPRESSION_ZIP;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processAPNG(Imagick $imagick): Imagick
    {
        $format = 'apng';
        $compression = Imagick::COMPRESSION_ZIP;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processAVIF(Imagick $imagick): Imagick
    {
        $format = 'avif';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality(100);
        $imagick->setImageCompressionQuality(100);

        return $imagick;
    }

    public function processBMP(Imagick $imagick): Imagick
    {
        $format = 'bmp';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processDDS(Imagick $imagick): Imagick
    {
        $format = 'dds';
        $compression = Imagick::COMPRESSION_DXT1;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processDIB(Imagick $imagick): Imagick
    {
        $format = 'dib';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processEPS(Imagick $imagick): Imagick
    {
        $format = 'eps';
        $compression = Imagick::COMPRESSION_ZIP;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processGIF(Imagick $imagick): Imagick
    {
        $format = 'gif';
        $compression = Imagick::COMPRESSION_LZW;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processHDR(Imagick $imagick): Imagick
    {
        $format = 'hdr';
        $compression = Imagick::COMPRESSION_UNDEFINED;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processHEIC(Imagick $imagick): Imagick
    {
        $format = 'heic';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality(100);
        $imagick->setImageCompressionQuality(100);

        return $imagick;
    }

    public function processHEIF(Imagick $imagick): Imagick
    {
        # Set the quality to 100 to produce lossless HEIC images
        $format = 'heif';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality(100);
        $imagick->setImageCompressionQuality(100);

        return $imagick;
    }

    public function processICO(Imagick $imagick): Imagick
    {
        $format = 'ico';
        $compression = Imagick::COMPRESSION_UNDEFINED;

        $imagick->thumbnailImage(256, 256, true);
        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processJP2(Imagick $imagick): Imagick
    {
        $format = 'jp2';
        $compression = Imagick::COMPRESSION_JPEG2000;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality($this::QUALITY);
        $imagick->setImageCompressionQuality($this::QUALITY);

        return $imagick;
    }

    public function processJPE(Imagick $imagick): Imagick
    {
        $format = 'jpe';
        $compression = Imagick::COMPRESSION_JPEG;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality($this::QUALITY);
        $imagick->setImageCompressionQuality($this::QUALITY);

        return $imagick;
    }

    public function processJPEG(Imagick $imagick): Imagick
    {
        $format = 'jpg';
        $compression = Imagick::COMPRESSION_JPEG;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality($this::QUALITY);
        $imagick->setImageCompressionQuality($this::QUALITY);

        return $imagick;
    }

    public function processPDF(Imagick $imagick): Imagick
    {
        $format = 'pdf';
        $compression = Imagick::COMPRESSION_JPEG;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality($this::QUALITY);
        $imagick->setImageCompressionQuality($this::QUALITY);

        return $imagick;
    }

    public function processPNG(Imagick $imagick): Imagick
    {
        $format = 'png';
        $compression = Imagick::COMPRESSION_ZIP;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processPSD(Imagick $imagick): Imagick
    {
        $format = 'psd';
        $compression = Imagick::COMPRESSION_UNDEFINED;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processRAW(Imagick $imagick): Imagick
    {
        $format = 'raw';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setImageDepth(16);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processSVG(Imagick $imagick): Imagick
    {
        $format = 'svg';
        $imagick->setFormat($format);
        $imagick->setImageFormat($format);

        return $imagick;
    }

    public function processTGA(Imagick $imagick): Imagick
    {
        $format = 'tga';
        $compression = Imagick::COMPRESSION_UNDEFINED;

        
        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        # fix flip
        $imagick->setImageOrientation(Imagick::ORIENTATION_TOPLEFT);

        return $imagick;
    }

    public function processTIFF(Imagick $imagick): Imagick
    {
        $format = 'tiff';
        $compression = Imagick::COMPRESSION_LZW;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processWBMP(Imagick $imagick): Imagick
    {
        $format = 'wbmp';
        $compression = Imagick::COMPRESSION_NO;

        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);

        return $imagick;
    }

    public function processWEBP(Imagick $imagick): Imagick
    {
        $format = 'webp';
        $compression = Imagick::COMPRESSION_JPEG;

        $imagick->setImageBackgroundColor(new \ImagickPixel('transparent'));
        $imagick = $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_MERGE); # from Intervention package
        $imagick->setFormat($format);
        $imagick->setImageFormat($format);
        $imagick->setCompression($compression);
        $imagick->setImageCompression($compression);
        $imagick->setCompressionQuality($this::QUALITY);
        $imagick->setImageCompressionQuality($this::QUALITY);


        return $imagick;
    }
}
