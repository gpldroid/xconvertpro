<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-ico.enabled', true);
        $this->migrator->add('image-to-ico.title', 'Image to ICO');
        $this->migrator->add('image-to-ico.name', 'imageToIcoSlug');
        $this->migrator->add("image-to-ico.metaKeywords", "");
        $this->migrator->add("image-to-ico.metaDescription", "Image to ICO converter is a useful tool that allows you to converte images to ICO format.");
        $this->migrator->add('image-to-ico.headerTitle', 'Images to ICO Converter');
        $this->migrator->add('image-to-ico.headerSubtitle', 'Image to ICO converter is a useful tool that allows you to convert images to ICO format');
        $this->migrator->add('image-to-ico.entryTitle', 'Images to ICO Converter');
        $this->migrator->add('image-to-ico.entrySummary', 'Convert your images to the ICO format with this free online converter');
        $this->migrator->add('image-to-ico.showTopAd', true);
        $this->migrator->add('image-to-ico.showMiddleAd', true);
        $this->migrator->add('image-to-ico.showBottomAd', true);
        $this->migrator->add('image-to-ico.showShareButtons', true);
        $this->migrator->add('image-to-ico.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-ico.enabled');
        $this->migrator->delete('image-to-ico.title');
        $this->migrator->delete('image-to-ico.name');
        $this->migrator->delete('image-to-ico.metaDescription');
        $this->migrator->delete('image-to-ico.metaKeywords');
        $this->migrator->delete('image-to-ico.headerTitle');
        $this->migrator->delete('image-to-ico.headerSubtitle');
        $this->migrator->delete('image-to-ico.entryTitle');
        $this->migrator->delete('image-to-ico.entrySummary');
        $this->migrator->delete('image-to-ico.showTopAd');
        $this->migrator->delete('image-to-ico.showMiddleAd');
        $this->migrator->delete('image-to-ico.showBottomAd');
        $this->migrator->delete('image-to-ico.showShareButtons');
        $this->migrator->delete('image-to-ico.description');
    }
};
