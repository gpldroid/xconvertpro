<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-webp.enabled', true);
        $this->migrator->add('image-to-webp.title', 'Image to WEBP');
        $this->migrator->add('image-to-webp.name', 'imageToWebpSlug');
        $this->migrator->add("image-to-webp.metaKeywords", "");
        $this->migrator->add("image-to-webp.metaDescription", "Image to WEBP converter is a useful tool that allows you to converte images to WEBP format.");
        $this->migrator->add('image-to-webp.headerTitle', 'Images to WEBP Converter');
        $this->migrator->add('image-to-webp.headerSubtitle', 'Image to WEBP converter is a useful tool that allows you to convert images to WEBP format');
        $this->migrator->add('image-to-webp.entryTitle', 'Images to WEBP Converter');
        $this->migrator->add('image-to-webp.entrySummary', 'Convert your images to the WEBP format with this free online converter');
        $this->migrator->add('image-to-webp.showTopAd', true);
        $this->migrator->add('image-to-webp.showMiddleAd', true);
        $this->migrator->add('image-to-webp.showBottomAd', true);
        $this->migrator->add('image-to-webp.showShareButtons', true);
        $this->migrator->add('image-to-webp.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-webp.enabled');
        $this->migrator->delete('image-to-webp.title');
        $this->migrator->delete('image-to-webp.name');
        $this->migrator->delete('image-to-webp.metaDescription');
        $this->migrator->delete('image-to-webp.metaKeywords');
        $this->migrator->delete('image-to-webp.headerTitle');
        $this->migrator->delete('image-to-webp.headerSubtitle');
        $this->migrator->delete('image-to-webp.entryTitle');
        $this->migrator->delete('image-to-webp.entrySummary');
        $this->migrator->delete('image-to-webp.showTopAd');
        $this->migrator->delete('image-to-webp.showMiddleAd');
        $this->migrator->delete('image-to-webp.showBottomAd');
        $this->migrator->delete('image-to-webp.showShareButtons');
        $this->migrator->delete('image-to-webp.description');
    }
};
