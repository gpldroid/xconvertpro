<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-tiff.enabled', true);
        $this->migrator->add('image-to-tiff.title', 'Image to TIFF');
        $this->migrator->add('image-to-tiff.name', 'imageToTiffSlug');
        $this->migrator->add("image-to-tiff.metaKeywords", "");
        $this->migrator->add("image-to-tiff.metaDescription", "Image to TIFF converter is a useful tool that allows you to converte images to TIFF format.");
        $this->migrator->add('image-to-tiff.headerTitle', 'Images to TIFF Converter');
        $this->migrator->add('image-to-tiff.headerSubtitle', 'Image to TIFF converter is a useful tool that allows you to convert images to TIFF format');
        $this->migrator->add('image-to-tiff.entryTitle', 'Images to TIFF Converter');
        $this->migrator->add('image-to-tiff.entrySummary', 'Convert your images to the TIFF format with this free online converter');
        $this->migrator->add('image-to-tiff.showTopAd', true);
        $this->migrator->add('image-to-tiff.showMiddleAd', true);
        $this->migrator->add('image-to-tiff.showBottomAd', true);
        $this->migrator->add('image-to-tiff.showShareButtons', true);
        $this->migrator->add('image-to-tiff.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-tiff.enabled');
        $this->migrator->delete('image-to-tiff.title');
        $this->migrator->delete('image-to-tiff.name');
        $this->migrator->delete('image-to-tiff.metaDescription');
        $this->migrator->delete('image-to-tiff.metaKeywords');
        $this->migrator->delete('image-to-tiff.headerTitle');
        $this->migrator->delete('image-to-tiff.headerSubtitle');
        $this->migrator->delete('image-to-tiff.entryTitle');
        $this->migrator->delete('image-to-tiff.entrySummary');
        $this->migrator->delete('image-to-tiff.showTopAd');
        $this->migrator->delete('image-to-tiff.showMiddleAd');
        $this->migrator->delete('image-to-tiff.showBottomAd');
        $this->migrator->delete('image-to-tiff.showShareButtons');
        $this->migrator->delete('image-to-tiff.description');
    }
};
