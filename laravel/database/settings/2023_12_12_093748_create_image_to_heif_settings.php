<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-heif.enabled', true);
        $this->migrator->add('image-to-heif.title', 'Image to HEIF');
        $this->migrator->add('image-to-heif.name', 'imageToHeifSlug');
        $this->migrator->add("image-to-heif.metaKeywords", "");
        $this->migrator->add("image-to-heif.metaDescription", "Image to HEIF converter is a useful tool that allows you to converte images to HEIF format.");
        $this->migrator->add('image-to-heif.headerTitle', 'Images to HEIF Converter');
        $this->migrator->add('image-to-heif.headerSubtitle', 'Image to HEIF converter is a useful tool that allows you to convert images to HEIF format');
        $this->migrator->add('image-to-heif.entryTitle', 'Images to HEIF Converter');
        $this->migrator->add('image-to-heif.entrySummary', 'Convert your images to the HEIF format with this free online converter');
        $this->migrator->add('image-to-heif.showTopAd', true);
        $this->migrator->add('image-to-heif.showMiddleAd', true);
        $this->migrator->add('image-to-heif.showBottomAd', true);
        $this->migrator->add('image-to-heif.showShareButtons', true);
        $this->migrator->add('image-to-heif.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-heif.enabled');
        $this->migrator->delete('image-to-heif.title');
        $this->migrator->delete('image-to-heif.name');
        $this->migrator->delete('image-to-heif.metaDescription');
        $this->migrator->delete('image-to-heif.metaKeywords');
        $this->migrator->delete('image-to-heif.headerTitle');
        $this->migrator->delete('image-to-heif.headerSubtitle');
        $this->migrator->delete('image-to-heif.entryTitle');
        $this->migrator->delete('image-to-heif.entrySummary');
        $this->migrator->delete('image-to-heif.showTopAd');
        $this->migrator->delete('image-to-heif.showMiddleAd');
        $this->migrator->delete('image-to-heif.showBottomAd');
        $this->migrator->delete('image-to-heif.showShareButtons');
        $this->migrator->delete('image-to-heif.description');
    }
};
