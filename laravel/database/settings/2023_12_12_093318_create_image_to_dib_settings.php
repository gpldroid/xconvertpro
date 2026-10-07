<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-dib.enabled', true);
        $this->migrator->add('image-to-dib.title', 'Image to DIB');
        $this->migrator->add('image-to-dib.name', 'imageToDibSlug');
        $this->migrator->add("image-to-dib.metaKeywords", "");
        $this->migrator->add("image-to-dib.metaDescription", "Image to DIB converter is a useful tool that allows you to converte images to DIB format.");
        $this->migrator->add('image-to-dib.headerTitle', 'Images to DIB Converter');
        $this->migrator->add('image-to-dib.headerSubtitle', 'Image to DIB converter is a useful tool that allows you to convert images to DIB format');
        $this->migrator->add('image-to-dib.entryTitle', 'Images to DIB Converter');
        $this->migrator->add('image-to-dib.entrySummary', 'Convert your images to the DIB format with this free online converter');
        $this->migrator->add('image-to-dib.showTopAd', true);
        $this->migrator->add('image-to-dib.showMiddleAd', true);
        $this->migrator->add('image-to-dib.showBottomAd', true);
        $this->migrator->add('image-to-dib.showShareButtons', true);
        $this->migrator->add('image-to-dib.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-dib.enabled');
        $this->migrator->delete('image-to-dib.title');
        $this->migrator->delete('image-to-dib.name');
        $this->migrator->delete('image-to-dib.metaDescription');
        $this->migrator->delete('image-to-dib.metaKeywords');
        $this->migrator->delete('image-to-dib.headerTitle');
        $this->migrator->delete('image-to-dib.headerSubtitle');
        $this->migrator->delete('image-to-dib.entryTitle');
        $this->migrator->delete('image-to-dib.entrySummary');
        $this->migrator->delete('image-to-dib.showTopAd');
        $this->migrator->delete('image-to-dib.showMiddleAd');
        $this->migrator->delete('image-to-dib.showBottomAd');
        $this->migrator->delete('image-to-dib.showShareButtons');
        $this->migrator->delete('image-to-dib.description');
    }
};
