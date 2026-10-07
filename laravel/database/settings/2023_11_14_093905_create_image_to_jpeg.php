<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-jpeg.enabled', true);
        $this->migrator->add('image-to-jpeg.title', 'Image to JPEG');
        $this->migrator->add('image-to-jpeg.name', 'imageToJpegSlug');
        $this->migrator->add("image-to-jpeg.metaKeywords", "");
        $this->migrator->add("image-to-jpeg.metaDescription", "Image to JPEG converter is a useful tool that allows you to converte images to JPEG format.");
        $this->migrator->add('image-to-jpeg.headerTitle', 'Images to JPEG Converter');
        $this->migrator->add('image-to-jpeg.headerSubtitle', 'Image to JPEG converter is a useful tool that allows you to convert images to JPEG format');
        $this->migrator->add('image-to-jpeg.entryTitle', 'Images to JPEG Converter');
        $this->migrator->add('image-to-jpeg.entrySummary', 'Convert your images to the JPEG format with this free online converter');
        $this->migrator->add('image-to-jpeg.showTopAd', true);
        $this->migrator->add('image-to-jpeg.showMiddleAd', true);
        $this->migrator->add('image-to-jpeg.showBottomAd', true);
        $this->migrator->add('image-to-jpeg.showShareButtons', true);
        $this->migrator->add('image-to-jpeg.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-jpeg.enabled');
        $this->migrator->delete('image-to-jpeg.title');
        $this->migrator->delete('image-to-jpeg.name');
        $this->migrator->delete('image-to-jpeg.metaDescription');
        $this->migrator->delete('image-to-jpeg.metaKeywords');
        $this->migrator->delete('image-to-jpeg.headerTitle');
        $this->migrator->delete('image-to-jpeg.headerSubtitle');
        $this->migrator->delete('image-to-jpeg.entryTitle');
        $this->migrator->delete('image-to-jpeg.entrySummary');
        $this->migrator->delete('image-to-jpeg.showTopAd');
        $this->migrator->delete('image-to-jpeg.showMiddleAd');
        $this->migrator->delete('image-to-jpeg.showBottomAd');
        $this->migrator->delete('image-to-jpeg.showShareButtons');
        $this->migrator->delete('image-to-jpeg.description');
    }
};
