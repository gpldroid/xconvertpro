<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-svg.enabled', true);
        $this->migrator->add('image-to-svg.title', 'Image to SVG');
        $this->migrator->add('image-to-svg.name', 'imageToSvgSlug');
        $this->migrator->add("image-to-svg.metaKeywords", "");
        $this->migrator->add("image-to-svg.metaDescription", "Image to SVG converter is a useful tool that allows you to converte images to SVG format.");
        $this->migrator->add('image-to-svg.headerTitle', 'Images to SVG Converter');
        $this->migrator->add('image-to-svg.headerSubtitle', 'Image to SVG converter is a useful tool that allows you to convert images to SVG format');
        $this->migrator->add('image-to-svg.entryTitle', 'Images to SVG Converter');
        $this->migrator->add('image-to-svg.entrySummary', 'Convert your images to the SVG format with this free online converter');
        $this->migrator->add('image-to-svg.showTopAd', true);
        $this->migrator->add('image-to-svg.showMiddleAd', true);
        $this->migrator->add('image-to-svg.showBottomAd', true);
        $this->migrator->add('image-to-svg.showShareButtons', true);
        $this->migrator->add('image-to-svg.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-svg.enabled');
        $this->migrator->delete('image-to-svg.title');
        $this->migrator->delete('image-to-svg.name');
        $this->migrator->delete('image-to-svg.metaDescription');
        $this->migrator->delete('image-to-svg.metaKeywords');
        $this->migrator->delete('image-to-svg.headerTitle');
        $this->migrator->delete('image-to-svg.headerSubtitle');
        $this->migrator->delete('image-to-svg.entryTitle');
        $this->migrator->delete('image-to-svg.entrySummary');
        $this->migrator->delete('image-to-svg.showTopAd');
        $this->migrator->delete('image-to-svg.showMiddleAd');
        $this->migrator->delete('image-to-svg.showBottomAd');
        $this->migrator->delete('image-to-svg.showShareButtons');
        $this->migrator->delete('image-to-svg.description');
    }
};
