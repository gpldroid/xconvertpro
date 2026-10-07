<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-avif.enabled', true);
        $this->migrator->add('image-to-avif.title', 'Image to AVIF');
        $this->migrator->add('image-to-avif.name', 'imageToAvifSlug');
        $this->migrator->add("image-to-avif.metaKeywords", "");
        $this->migrator->add("image-to-avif.metaDescription", "Image to AVIF converter is a useful tool that allows you to converte images to AVIF format.");
        $this->migrator->add('image-to-avif.headerTitle', 'Images to AVIF Converter');
        $this->migrator->add('image-to-avif.headerSubtitle', 'Image to AVIF converter is a useful tool that allows you to convert images to AVIF format');
        $this->migrator->add('image-to-avif.entryTitle', 'Images to AVIF Converter');
        $this->migrator->add('image-to-avif.entrySummary', 'Convert your images to the AVIF format with this free online converter');
        $this->migrator->add('image-to-avif.showTopAd', true);
        $this->migrator->add('image-to-avif.showMiddleAd', true);
        $this->migrator->add('image-to-avif.showBottomAd', true);
        $this->migrator->add('image-to-avif.showShareButtons', true);
        $this->migrator->add('image-to-avif.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-avif.enabled');
        $this->migrator->delete('image-to-avif.title');
        $this->migrator->delete('image-to-avif.name');
        $this->migrator->delete('image-to-avif.metaDescription');
        $this->migrator->delete('image-to-avif.metaKeywords');
        $this->migrator->delete('image-to-avif.headerTitle');
        $this->migrator->delete('image-to-avif.headerSubtitle');
        $this->migrator->delete('image-to-avif.entryTitle');
        $this->migrator->delete('image-to-avif.entrySummary');
        $this->migrator->delete('image-to-avif.showTopAd');
        $this->migrator->delete('image-to-avif.showMiddleAd');
        $this->migrator->delete('image-to-avif.showBottomAd');
        $this->migrator->delete('image-to-avif.showShareButtons');
        $this->migrator->delete('image-to-avif.description');
    }
};
