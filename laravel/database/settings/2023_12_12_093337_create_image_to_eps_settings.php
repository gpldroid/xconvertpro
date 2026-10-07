<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-eps.enabled', true);
        $this->migrator->add('image-to-eps.title', 'Image to EPS');
        $this->migrator->add('image-to-eps.name', 'imageToEpsSlug');
        $this->migrator->add("image-to-eps.metaKeywords", "");
        $this->migrator->add("image-to-eps.metaDescription", "Image to EPS converter is a useful tool that allows you to converte images to EPS format.");
        $this->migrator->add('image-to-eps.headerTitle', 'Images to EPS Converter');
        $this->migrator->add('image-to-eps.headerSubtitle', 'Image to EPS converter is a useful tool that allows you to convert images to EPS format');
        $this->migrator->add('image-to-eps.entryTitle', 'Images to EPS Converter');
        $this->migrator->add('image-to-eps.entrySummary', 'Convert your images to the EPS format with this free online converter');
        $this->migrator->add('image-to-eps.showTopAd', true);
        $this->migrator->add('image-to-eps.showMiddleAd', true);
        $this->migrator->add('image-to-eps.showBottomAd', true);
        $this->migrator->add('image-to-eps.showShareButtons', true);
        $this->migrator->add('image-to-eps.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-eps.enabled');
        $this->migrator->delete('image-to-eps.title');
        $this->migrator->delete('image-to-eps.name');
        $this->migrator->delete('image-to-eps.metaDescription');
        $this->migrator->delete('image-to-eps.metaKeywords');
        $this->migrator->delete('image-to-eps.headerTitle');
        $this->migrator->delete('image-to-eps.headerSubtitle');
        $this->migrator->delete('image-to-eps.entryTitle');
        $this->migrator->delete('image-to-eps.entrySummary');
        $this->migrator->delete('image-to-eps.showTopAd');
        $this->migrator->delete('image-to-eps.showMiddleAd');
        $this->migrator->delete('image-to-eps.showBottomAd');
        $this->migrator->delete('image-to-eps.showShareButtons');
        $this->migrator->delete('image-to-eps.description');
    }
};
