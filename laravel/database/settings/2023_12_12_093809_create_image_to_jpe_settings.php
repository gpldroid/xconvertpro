<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-jpe.enabled', true);
        $this->migrator->add('image-to-jpe.title', 'Image to JPE');
        $this->migrator->add('image-to-jpe.name', 'imageToJpeSlug');
        $this->migrator->add("image-to-jpe.metaKeywords", "");
        $this->migrator->add("image-to-jpe.metaDescription", "Image to JPE converter is a useful tool that allows you to converte images to JPE format.");
        $this->migrator->add('image-to-jpe.headerTitle', 'Images to JPE Converter');
        $this->migrator->add('image-to-jpe.headerSubtitle', 'Image to JPE converter is a useful tool that allows you to convert images to JPE format');
        $this->migrator->add('image-to-jpe.entryTitle', 'Images to JPE Converter');
        $this->migrator->add('image-to-jpe.entrySummary', 'Convert your images to the JPE format with this free online converter');
        $this->migrator->add('image-to-jpe.showTopAd', true);
        $this->migrator->add('image-to-jpe.showMiddleAd', true);
        $this->migrator->add('image-to-jpe.showBottomAd', true);
        $this->migrator->add('image-to-jpe.showShareButtons', true);
        $this->migrator->add('image-to-jpe.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-jpe.enabled');
        $this->migrator->delete('image-to-jpe.title');
        $this->migrator->delete('image-to-jpe.name');
        $this->migrator->delete('image-to-jpe.metaDescription');
        $this->migrator->delete('image-to-jpe.metaKeywords');
        $this->migrator->delete('image-to-jpe.headerTitle');
        $this->migrator->delete('image-to-jpe.headerSubtitle');
        $this->migrator->delete('image-to-jpe.entryTitle');
        $this->migrator->delete('image-to-jpe.entrySummary');
        $this->migrator->delete('image-to-jpe.showTopAd');
        $this->migrator->delete('image-to-jpe.showMiddleAd');
        $this->migrator->delete('image-to-jpe.showBottomAd');
        $this->migrator->delete('image-to-jpe.showShareButtons');
        $this->migrator->delete('image-to-jpe.description');
    }
};
