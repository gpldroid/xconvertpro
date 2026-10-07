<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-gif.enabled', true);
        $this->migrator->add('image-to-gif.title', 'Image to Gif');
        $this->migrator->add('image-to-gif.name', 'imageToGifSlug');
        $this->migrator->add("image-to-gif.metaKeywords", "");
        $this->migrator->add("image-to-gif.metaDescription", "Image to Gif converter is a useful tool that allows you to converte images to Gif format.");
        $this->migrator->add('image-to-gif.headerTitle', 'Images to Gif Converter');
        $this->migrator->add('image-to-gif.headerSubtitle', 'Image to GIF converter is a useful tool that allows you to convert images to GIF format');
        $this->migrator->add('image-to-gif.entryTitle', 'Images to Gif Converter');
        $this->migrator->add('image-to-gif.entrySummary', 'Convert your images to the GIF format with this free online converter');
        $this->migrator->add('image-to-gif.showTopAd', true);
        $this->migrator->add('image-to-gif.showMiddleAd', true);
        $this->migrator->add('image-to-gif.showBottomAd', true);
        $this->migrator->add('image-to-gif.showShareButtons', true);
        $this->migrator->add('image-to-gif.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-gif.enabled');
        $this->migrator->delete('image-to-gif.title');
        $this->migrator->delete('image-to-gif.name');
        $this->migrator->delete('image-to-gif.metaDescription');
        $this->migrator->delete('image-to-gif.metaKeywords');
        $this->migrator->delete('image-to-gif.headerTitle');
        $this->migrator->delete('image-to-gif.headerSubtitle');
        $this->migrator->delete('image-to-gif.entryTitle');
        $this->migrator->delete('image-to-gif.entrySummary');
        $this->migrator->delete('image-to-gif.showTopAd');
        $this->migrator->delete('image-to-gif.showMiddleAd');
        $this->migrator->delete('image-to-gif.showBottomAd');
        $this->migrator->delete('image-to-gif.showShareButtons');
        $this->migrator->delete('image-to-gif.description');
    }
};
