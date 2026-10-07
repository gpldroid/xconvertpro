<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('image-to-ai.enabled', true);
        $this->migrator->add('image-to-ai.title', 'Image to AI');
        $this->migrator->add('image-to-ai.name', 'imageToAiSlug');
        $this->migrator->add("image-to-ai.metaKeywords", "");
        $this->migrator->add("image-to-ai.metaDescription", "Image to AI converter is a useful tool that allows you to convert images to AI format.");
        $this->migrator->add('image-to-ai.headerTitle', 'Image to AI Converter');
        $this->migrator->add('image-to-ai.headerSubtitle', 'Convert your images to the AI format with this free online converter');
        $this->migrator->add('image-to-ai.entryTitle', 'Image to AI Converter');
        $this->migrator->add('image-to-ai.entrySummary', 'Convert your images to the AI format with this free online converter');
        $this->migrator->add('image-to-ai.showTopAd', true);
        $this->migrator->add('image-to-ai.showMiddleAd', true);
        $this->migrator->add('image-to-ai.showBottomAd', true);
        $this->migrator->add('image-to-ai.showShareButtons', true);
        $this->migrator->add('image-to-ai.description', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('image-to-ai.enabled');
        $this->migrator->delete('image-to-ai.title');
        $this->migrator->delete('image-to-ai.name');
        $this->migrator->delete('image-to-ai.metaDescription');
        $this->migrator->delete('image-to-ai.metaKeywords');
        $this->migrator->delete('image-to-ai.headerTitle');
        $this->migrator->delete('image-to-ai.headerSubtitle');
        $this->migrator->delete('image-to-ai.entryTitle');
        $this->migrator->delete('image-to-ai.entrySummary');
        $this->migrator->delete('image-to-ai.showTopAd');
        $this->migrator->delete('image-to-ai.showMiddleAd');
        $this->migrator->delete('image-to-ai.showBottomAd');
        $this->migrator->delete('image-to-ai.showShareButtons');
        $this->migrator->delete('image-to-ai.description');
    }
};
