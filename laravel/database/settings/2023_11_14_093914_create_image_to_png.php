<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-png.enabled', true);
        $this->migrator->add('image-to-png.title', 'Image to PNG');
        $this->migrator->add('image-to-png.name', 'imageToPngSlug');
        $this->migrator->add("image-to-png.metaKeywords", "");
        $this->migrator->add("image-to-png.metaDescription", "Image to PNG converter is a useful tool that allows you to converte images to PNG format.");
        $this->migrator->add('image-to-png.headerTitle', 'Images to PNG Converter');
        $this->migrator->add('image-to-png.headerSubtitle', 'Image to PNG converter is a useful tool that allows you to convert images to PNG format');
        $this->migrator->add('image-to-png.entryTitle', 'Images to PNG Converter');
        $this->migrator->add('image-to-png.entrySummary', 'Convert your images to the PNG format with this free online converter');
        $this->migrator->add('image-to-png.showTopAd', true);
        $this->migrator->add('image-to-png.showMiddleAd', true);
        $this->migrator->add('image-to-png.showBottomAd', true);
        $this->migrator->add('image-to-png.showShareButtons', true);
        $this->migrator->add('image-to-png.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-png.enabled');
        $this->migrator->delete('image-to-png.title');
        $this->migrator->delete('image-to-png.name');
        $this->migrator->delete('image-to-png.metaDescription');
        $this->migrator->delete('image-to-png.metaKeywords');
        $this->migrator->delete('image-to-png.headerTitle');
        $this->migrator->delete('image-to-png.headerSubtitle');
        $this->migrator->delete('image-to-png.entryTitle');
        $this->migrator->delete('image-to-png.entrySummary');
        $this->migrator->delete('image-to-png.showTopAd');
        $this->migrator->delete('image-to-png.showMiddleAd');
        $this->migrator->delete('image-to-png.showBottomAd');
        $this->migrator->delete('image-to-png.showShareButtons');
        $this->migrator->delete('image-to-png.description');
    }
};
