<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-heic.enabled', true);
        $this->migrator->add('image-to-heic.title', 'Image to HEIC');
        $this->migrator->add('image-to-heic.name', 'imageToHeicSlug');
        $this->migrator->add("image-to-heic.metaKeywords", "");
        $this->migrator->add("image-to-heic.metaDescription", "Image to HEIC converter is a useful tool that allows you to converte images to HEIC format.");
        $this->migrator->add('image-to-heic.headerTitle', 'Images to HEIC Converter');
        $this->migrator->add('image-to-heic.headerSubtitle', 'Image to HEIC converter is a useful tool that allows you to convert images to HEIC format');
        $this->migrator->add('image-to-heic.entryTitle', 'Images to HEIC Converter');
        $this->migrator->add('image-to-heic.entrySummary', 'Convert your images to the HEIC format with this free online converter');
        $this->migrator->add('image-to-heic.showTopAd', true);
        $this->migrator->add('image-to-heic.showMiddleAd', true);
        $this->migrator->add('image-to-heic.showBottomAd', true);
        $this->migrator->add('image-to-heic.showShareButtons', true);
        $this->migrator->add('image-to-heic.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-heic.enabled');
        $this->migrator->delete('image-to-heic.title');
        $this->migrator->delete('image-to-heic.name');
        $this->migrator->delete('image-to-heic.metaDescription');
        $this->migrator->delete('image-to-heic.metaKeywords');
        $this->migrator->delete('image-to-heic.headerTitle');
        $this->migrator->delete('image-to-heic.headerSubtitle');
        $this->migrator->delete('image-to-heic.entryTitle');
        $this->migrator->delete('image-to-heic.entrySummary');
        $this->migrator->delete('image-to-heic.showTopAd');
        $this->migrator->delete('image-to-heic.showMiddleAd');
        $this->migrator->delete('image-to-heic.showBottomAd');
        $this->migrator->delete('image-to-heic.showShareButtons');
        $this->migrator->delete('image-to-heic.description');
    }
};
