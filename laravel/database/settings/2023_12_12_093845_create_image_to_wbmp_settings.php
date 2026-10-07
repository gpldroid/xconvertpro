<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-wbmp.enabled', true);
        $this->migrator->add('image-to-wbmp.title', 'Image to WBMP');
        $this->migrator->add('image-to-wbmp.name', 'imageToWbmpSlug');
        $this->migrator->add("image-to-wbmp.metaKeywords", "");
        $this->migrator->add("image-to-wbmp.metaDescription", "Image to WBMP converter is a useful tool that allows you to converte images to WBMP format.");
        $this->migrator->add('image-to-wbmp.headerTitle', 'Images to WBMP Converter');
        $this->migrator->add('image-to-wbmp.headerSubtitle', 'Image to WBMP converter is a useful tool that allows you to convert images to WBMP format');
        $this->migrator->add('image-to-wbmp.entryTitle', 'Images to WBMP Converter');
        $this->migrator->add('image-to-wbmp.entrySummary', 'Convert your images to the WBMP format with this free online converter');
        $this->migrator->add('image-to-wbmp.showTopAd', true);
        $this->migrator->add('image-to-wbmp.showMiddleAd', true);
        $this->migrator->add('image-to-wbmp.showBottomAd', true);
        $this->migrator->add('image-to-wbmp.showShareButtons', true);
        $this->migrator->add('image-to-wbmp.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-wbmp.enabled');
        $this->migrator->delete('image-to-wbmp.title');
        $this->migrator->delete('image-to-wbmp.name');
        $this->migrator->delete('image-to-wbmp.metaDescription');
        $this->migrator->delete('image-to-wbmp.metaKeywords');
        $this->migrator->delete('image-to-wbmp.headerTitle');
        $this->migrator->delete('image-to-wbmp.headerSubtitle');
        $this->migrator->delete('image-to-wbmp.entryTitle');
        $this->migrator->delete('image-to-wbmp.entrySummary');
        $this->migrator->delete('image-to-wbmp.showTopAd');
        $this->migrator->delete('image-to-wbmp.showMiddleAd');
        $this->migrator->delete('image-to-wbmp.showBottomAd');
        $this->migrator->delete('image-to-wbmp.showShareButtons');
        $this->migrator->delete('image-to-wbmp.description');
    }
};
