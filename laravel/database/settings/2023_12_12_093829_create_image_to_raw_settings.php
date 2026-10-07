<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-raw.enabled', true);
        $this->migrator->add('image-to-raw.title', 'Image to RAW');
        $this->migrator->add('image-to-raw.name', 'imageToRawSlug');
        $this->migrator->add("image-to-raw.metaKeywords", "");
        $this->migrator->add("image-to-raw.metaDescription", "Image to RAW converter is a useful tool that allows you to converte images to RAW format.");
        $this->migrator->add('image-to-raw.headerTitle', 'Images to RAW Converter');
        $this->migrator->add('image-to-raw.headerSubtitle', 'Image to RAW converter is a useful tool that allows you to convert images to RAW format');
        $this->migrator->add('image-to-raw.entryTitle', 'Images to RAW Converter');
        $this->migrator->add('image-to-raw.entrySummary', 'Convert your images to the RAW format with this free online converter');
        $this->migrator->add('image-to-raw.showTopAd', true);
        $this->migrator->add('image-to-raw.showMiddleAd', true);
        $this->migrator->add('image-to-raw.showBottomAd', true);
        $this->migrator->add('image-to-raw.showShareButtons', true);
        $this->migrator->add('image-to-raw.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-raw.enabled');
        $this->migrator->delete('image-to-raw.title');
        $this->migrator->delete('image-to-raw.name');
        $this->migrator->delete('image-to-raw.metaDescription');
        $this->migrator->delete('image-to-raw.metaKeywords');
        $this->migrator->delete('image-to-raw.headerTitle');
        $this->migrator->delete('image-to-raw.headerSubtitle');
        $this->migrator->delete('image-to-raw.entryTitle');
        $this->migrator->delete('image-to-raw.entrySummary');
        $this->migrator->delete('image-to-raw.showTopAd');
        $this->migrator->delete('image-to-raw.showMiddleAd');
        $this->migrator->delete('image-to-raw.showBottomAd');
        $this->migrator->delete('image-to-raw.showShareButtons');
        $this->migrator->delete('image-to-raw.description');
    }
};
