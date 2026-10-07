<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-jp2.enabled', true);
        $this->migrator->add('image-to-jp2.title', 'Image to JP2');
        $this->migrator->add('image-to-jp2.name', 'imageToJp2Slug');
        $this->migrator->add("image-to-jp2.metaKeywords", "");
        $this->migrator->add("image-to-jp2.metaDescription", "Image to JP2 converter is a useful tool that allows you to converte images to JP2 format.");
        $this->migrator->add('image-to-jp2.headerTitle', 'Images to JP2 Converter');
        $this->migrator->add('image-to-jp2.headerSubtitle', 'Image to JP2 converter is a useful tool that allows you to convert images to JP2 format');
        $this->migrator->add('image-to-jp2.entryTitle', 'Images to JP2 Converter');
        $this->migrator->add('image-to-jp2.entrySummary', 'Convert your images to the JP2 format with this free online converter');
        $this->migrator->add('image-to-jp2.showTopAd', true);
        $this->migrator->add('image-to-jp2.showMiddleAd', true);
        $this->migrator->add('image-to-jp2.showBottomAd', true);
        $this->migrator->add('image-to-jp2.showShareButtons', true);
        $this->migrator->add('image-to-jp2.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-jp2.enabled');
        $this->migrator->delete('image-to-jp2.title');
        $this->migrator->delete('image-to-jp2.name');
        $this->migrator->delete('image-to-jp2.metaDescription');
        $this->migrator->delete('image-to-jp2.metaKeywords');
        $this->migrator->delete('image-to-jp2.headerTitle');
        $this->migrator->delete('image-to-jp2.headerSubtitle');
        $this->migrator->delete('image-to-jp2.entryTitle');
        $this->migrator->delete('image-to-jp2.entrySummary');
        $this->migrator->delete('image-to-jp2.showTopAd');
        $this->migrator->delete('image-to-jp2.showMiddleAd');
        $this->migrator->delete('image-to-jp2.showBottomAd');
        $this->migrator->delete('image-to-jp2.showShareButtons');
        $this->migrator->delete('image-to-jp2.description');
    }
};
