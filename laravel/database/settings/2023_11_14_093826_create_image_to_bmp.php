<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-bmp.enabled', true);
        $this->migrator->add('image-to-bmp.title', 'Image to BMP');
        $this->migrator->add('image-to-bmp.name', 'imageToBmpSlug');
        $this->migrator->add("image-to-bmp.metaKeywords", "");
        $this->migrator->add("image-to-bmp.metaDescription", "Image to BMP converter is a useful tool that allows you to convert images to BMP format.");
        $this->migrator->add('image-to-bmp.headerTitle', 'Images to BMP Converter');
        $this->migrator->add('image-to-bmp.headerSubtitle', 'Image to BMP converter is a useful tool that allows you to convert images to BMP format');
        $this->migrator->add('image-to-bmp.entryTitle', 'Images to BMP Converter');
        $this->migrator->add('image-to-bmp.entrySummary', 'Convert your images to the BMP format with this free online converter');
        $this->migrator->add('image-to-bmp.showTopAd', true);
        $this->migrator->add('image-to-bmp.showMiddleAd', true);
        $this->migrator->add('image-to-bmp.showBottomAd', true);
        $this->migrator->add('image-to-bmp.showShareButtons', true);
        $this->migrator->add('image-to-bmp.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-bmp.enabled');
        $this->migrator->delete('image-to-bmp.title');
        $this->migrator->delete('image-to-bmp.name');
        $this->migrator->delete('image-to-bmp.metaDescription');
        $this->migrator->delete('image-to-bmp.metaKeywords');
        $this->migrator->delete('image-to-bmp.headerTitle');
        $this->migrator->delete('image-to-bmp.headerSubtitle');
        $this->migrator->delete('image-to-bmp.entryTitle');
        $this->migrator->delete('image-to-bmp.entrySummary');
        $this->migrator->delete('image-to-bmp.showTopAd');
        $this->migrator->delete('image-to-bmp.showMiddleAd');
        $this->migrator->delete('image-to-bmp.showBottomAd');
        $this->migrator->delete('image-to-bmp.showShareButtons');
        $this->migrator->delete('image-to-bmp.description');
    }
};
