<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-tga.enabled', true);
        $this->migrator->add('image-to-tga.title', 'Image to TGA');
        $this->migrator->add('image-to-tga.name', 'imageToTgaSlug');
        $this->migrator->add("image-to-tga.metaKeywords", "");
        $this->migrator->add("image-to-tga.metaDescription", "Image to TGA converter is a useful tool that allows you to converte images to TGA format.");
        $this->migrator->add('image-to-tga.headerTitle', 'Images to TGA Converter');
        $this->migrator->add('image-to-tga.headerSubtitle', 'Image to TGA converter is a useful tool that allows you to convert images to TGA format');
        $this->migrator->add('image-to-tga.entryTitle', 'Images to TGA Converter');
        $this->migrator->add('image-to-tga.entrySummary', 'Convert your images to the TGA format with this free online converter');
        $this->migrator->add('image-to-tga.showTopAd', true);
        $this->migrator->add('image-to-tga.showMiddleAd', true);
        $this->migrator->add('image-to-tga.showBottomAd', true);
        $this->migrator->add('image-to-tga.showShareButtons', true);
        $this->migrator->add('image-to-tga.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-tga.enabled');
        $this->migrator->delete('image-to-tga.title');
        $this->migrator->delete('image-to-tga.name');
        $this->migrator->delete('image-to-tga.metaDescription');
        $this->migrator->delete('image-to-tga.metaKeywords');
        $this->migrator->delete('image-to-tga.headerTitle');
        $this->migrator->delete('image-to-tga.headerSubtitle');
        $this->migrator->delete('image-to-tga.entryTitle');
        $this->migrator->delete('image-to-tga.entrySummary');
        $this->migrator->delete('image-to-tga.showTopAd');
        $this->migrator->delete('image-to-tga.showMiddleAd');
        $this->migrator->delete('image-to-tga.showBottomAd');
        $this->migrator->delete('image-to-tga.showShareButtons');
        $this->migrator->delete('image-to-tga.description');
    }
};
