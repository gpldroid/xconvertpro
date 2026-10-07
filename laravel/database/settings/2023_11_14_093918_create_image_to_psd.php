<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-psd.enabled', true);
        $this->migrator->add('image-to-psd.title', 'Image to PSD');
        $this->migrator->add('image-to-psd.name', 'imageToPsdSlug');
        $this->migrator->add("image-to-psd.metaKeywords", "");
        $this->migrator->add("image-to-psd.metaDescription", "Image to PSD converter is a useful tool that allows you to converte images to PSD format.");
        $this->migrator->add('image-to-psd.headerTitle', 'Images to PSD Converter');
        $this->migrator->add('image-to-psd.headerSubtitle', 'Image to PSD converter is a useful tool that allows you to convert images to PSD format');
        $this->migrator->add('image-to-psd.entryTitle', 'Images to PSD Converter');
        $this->migrator->add('image-to-psd.entrySummary', 'Convert your images to the PSD format with this free online converter');
        $this->migrator->add('image-to-psd.showTopAd', true);
        $this->migrator->add('image-to-psd.showMiddleAd', true);
        $this->migrator->add('image-to-psd.showBottomAd', true);
        $this->migrator->add('image-to-psd.showShareButtons', true);
        $this->migrator->add('image-to-psd.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-psd.enabled');
        $this->migrator->delete('image-to-psd.title');
        $this->migrator->delete('image-to-psd.name');
        $this->migrator->delete('image-to-psd.metaDescription');
        $this->migrator->delete('image-to-psd.metaKeywords');
        $this->migrator->delete('image-to-psd.headerTitle');
        $this->migrator->delete('image-to-psd.headerSubtitle');
        $this->migrator->delete('image-to-psd.entryTitle');
        $this->migrator->delete('image-to-psd.entrySummary');
        $this->migrator->delete('image-to-psd.showTopAd');
        $this->migrator->delete('image-to-psd.showMiddleAd');
        $this->migrator->delete('image-to-psd.showBottomAd');
        $this->migrator->delete('image-to-psd.showShareButtons');
        $this->migrator->delete('image-to-psd.description');
    }
};
