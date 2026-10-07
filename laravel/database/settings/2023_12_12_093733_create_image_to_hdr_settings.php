<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-hdr.enabled', true);
        $this->migrator->add('image-to-hdr.title', 'Image to HDR');
        $this->migrator->add('image-to-hdr.name', 'imageToHdrSlug');
        $this->migrator->add("image-to-hdr.metaKeywords", "");
        $this->migrator->add("image-to-hdr.metaDescription", "Image to HDR converter is a useful tool that allows you to converte images to HDR format.");
        $this->migrator->add('image-to-hdr.headerTitle', 'Images to HDR Converter');
        $this->migrator->add('image-to-hdr.headerSubtitle', 'Image to HDR converter is a useful tool that allows you to convert images to HDR format');
        $this->migrator->add('image-to-hdr.entryTitle', 'Images to HDR Converter');
        $this->migrator->add('image-to-hdr.entrySummary', 'Convert your images to the HDR format with this free online converter');
        $this->migrator->add('image-to-hdr.showTopAd', true);
        $this->migrator->add('image-to-hdr.showMiddleAd', true);
        $this->migrator->add('image-to-hdr.showBottomAd', true);
        $this->migrator->add('image-to-hdr.showShareButtons', true);
        $this->migrator->add('image-to-hdr.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-hdr.enabled');
        $this->migrator->delete('image-to-hdr.title');
        $this->migrator->delete('image-to-hdr.name');
        $this->migrator->delete('image-to-hdr.metaDescription');
        $this->migrator->delete('image-to-hdr.metaKeywords');
        $this->migrator->delete('image-to-hdr.headerTitle');
        $this->migrator->delete('image-to-hdr.headerSubtitle');
        $this->migrator->delete('image-to-hdr.entryTitle');
        $this->migrator->delete('image-to-hdr.entrySummary');
        $this->migrator->delete('image-to-hdr.showTopAd');
        $this->migrator->delete('image-to-hdr.showMiddleAd');
        $this->migrator->delete('image-to-hdr.showBottomAd');
        $this->migrator->delete('image-to-hdr.showShareButtons');
        $this->migrator->delete('image-to-hdr.description');
    }
};
