<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-apng.enabled', true);
        $this->migrator->add('image-to-apng.title', 'Image to APNG');
        $this->migrator->add('image-to-apng.name', 'imageToApngSlug');
        $this->migrator->add("image-to-apng.metaKeywords", "");
        $this->migrator->add("image-to-apng.metaDescription", "Image to APNG converter is a useful tool that allows you to converte images to APNG format.");
        $this->migrator->add('image-to-apng.headerTitle', 'Images to APNG Converter');
        $this->migrator->add('image-to-apng.headerSubtitle', 'Image to APNG converter is a useful tool that allows you to convert images to APNG format');
        $this->migrator->add('image-to-apng.entryTitle', 'Images to APNG Converter');
        $this->migrator->add('image-to-apng.entrySummary', 'Convert your images to the APNG format with this free online converter');
        $this->migrator->add('image-to-apng.showTopAd', true);
        $this->migrator->add('image-to-apng.showMiddleAd', true);
        $this->migrator->add('image-to-apng.showBottomAd', true);
        $this->migrator->add('image-to-apng.showShareButtons', true);
        $this->migrator->add('image-to-apng.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-apng.enabled');
        $this->migrator->delete('image-to-apng.title');
        $this->migrator->delete('image-to-apng.name');
        $this->migrator->delete('image-to-apng.metaDescription');
        $this->migrator->delete('image-to-apng.metaKeywords');
        $this->migrator->delete('image-to-apng.headerTitle');
        $this->migrator->delete('image-to-apng.headerSubtitle');
        $this->migrator->delete('image-to-apng.entryTitle');
        $this->migrator->delete('image-to-apng.entrySummary');
        $this->migrator->delete('image-to-apng.showTopAd');
        $this->migrator->delete('image-to-apng.showMiddleAd');
        $this->migrator->delete('image-to-apng.showBottomAd');
        $this->migrator->delete('image-to-apng.showShareButtons');
        $this->migrator->delete('image-to-apng.description');
    }
};
