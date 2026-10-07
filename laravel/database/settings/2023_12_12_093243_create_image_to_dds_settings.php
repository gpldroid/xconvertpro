<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-dds.enabled', true);
        $this->migrator->add('image-to-dds.title', 'Image to DDS');
        $this->migrator->add('image-to-dds.name', 'imageToDdsSlug');
        $this->migrator->add("image-to-dds.metaKeywords", "");
        $this->migrator->add("image-to-dds.metaDescription", "Image to DDS converter is a useful tool that allows you to converte images to DDS format.");
        $this->migrator->add('image-to-dds.headerTitle', 'Images to DDS Converter');
        $this->migrator->add('image-to-dds.headerSubtitle', 'Image to DDS converter is a useful tool that allows you to convert images to DDS format');
        $this->migrator->add('image-to-dds.entryTitle', 'Images to DDS Converter');
        $this->migrator->add('image-to-dds.entrySummary', 'Convert your images to the DDS format with this free online converter');
        $this->migrator->add('image-to-dds.showTopAd', true);
        $this->migrator->add('image-to-dds.showMiddleAd', true);
        $this->migrator->add('image-to-dds.showBottomAd', true);
        $this->migrator->add('image-to-dds.showShareButtons', true);
        $this->migrator->add('image-to-dds.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-dds.enabled');
        $this->migrator->delete('image-to-dds.title');
        $this->migrator->delete('image-to-dds.name');
        $this->migrator->delete('image-to-dds.metaDescription');
        $this->migrator->delete('image-to-dds.metaKeywords');
        $this->migrator->delete('image-to-dds.headerTitle');
        $this->migrator->delete('image-to-dds.headerSubtitle');
        $this->migrator->delete('image-to-dds.entryTitle');
        $this->migrator->delete('image-to-dds.entrySummary');
        $this->migrator->delete('image-to-dds.showTopAd');
        $this->migrator->delete('image-to-dds.showMiddleAd');
        $this->migrator->delete('image-to-dds.showBottomAd');
        $this->migrator->delete('image-to-dds.showShareButtons');
        $this->migrator->delete('image-to-dds.description');
    }
};
