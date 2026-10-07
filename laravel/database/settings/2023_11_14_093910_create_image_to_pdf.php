<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-pdf.enabled', true);
        $this->migrator->add('image-to-pdf.title', 'Image to PDF');
        $this->migrator->add('image-to-pdf.name', 'imageToPdfSlug');
        $this->migrator->add("image-to-pdf.metaKeywords", "");
        $this->migrator->add("image-to-pdf.metaDescription", "Image to PDF converter is a useful tool that allows you to converte images to PDF format.");
        $this->migrator->add('image-to-pdf.headerTitle', 'Images to PDF Converter');
        $this->migrator->add('image-to-pdf.headerSubtitle', 'Image to PDF converter is a useful tool that allows you to convert images to PDF format');
        $this->migrator->add('image-to-pdf.entryTitle', 'Images to PDF Converter');
        $this->migrator->add('image-to-pdf.entrySummary', 'Convert your images to the PDF format with this free online converter');
        $this->migrator->add('image-to-pdf.showTopAd', true);
        $this->migrator->add('image-to-pdf.showMiddleAd', true);
        $this->migrator->add('image-to-pdf.showBottomAd', true);
        $this->migrator->add('image-to-pdf.showShareButtons', true);
        $this->migrator->add('image-to-pdf.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-pdf.enabled');
        $this->migrator->delete('image-to-pdf.title');
        $this->migrator->delete('image-to-pdf.name');
        $this->migrator->delete('image-to-pdf.metaDescription');
        $this->migrator->delete('image-to-pdf.metaKeywords');
        $this->migrator->delete('image-to-pdf.headerTitle');
        $this->migrator->delete('image-to-pdf.headerSubtitle');
        $this->migrator->delete('image-to-pdf.entryTitle');
        $this->migrator->delete('image-to-pdf.entrySummary');
        $this->migrator->delete('image-to-pdf.showTopAd');
        $this->migrator->delete('image-to-pdf.showMiddleAd');
        $this->migrator->delete('image-to-pdf.showBottomAd');
        $this->migrator->delete('image-to-pdf.showShareButtons');
        $this->migrator->delete('image-to-pdf.description');
    }
};
