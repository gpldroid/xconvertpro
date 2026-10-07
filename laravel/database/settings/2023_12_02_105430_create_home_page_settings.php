<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('homePage.title', 'Online Image Converter');
        $this->migrator->add('homePage.metaDescription', 'Convert images online from one format into another.');
        $this->migrator->add('homePage.metaKeywords', 'meta, key, words');
        $this->migrator->add('homePage.headerTitle', 'Online Image Converter');
        $this->migrator->add('homePage.headerSubtitle', 'Convert images online from one format into another. Please select the target format below:');
        $this->migrator->add('homePage.topAd', true);
        $this->migrator->add('homePage.middleAd', true);
        $this->migrator->add('homePage.bottomAd', true);
        $this->migrator->add('homePage.showShareButtons', true);
        $this->migrator->add('homePage.content', '<p>Lorem ipsum dolor sit amet, nostrud perpetua cotidieque cu sit. Cu omnium debitis cum. At libris noster admodum eum. Mea vide omnesque ad.</p>
        <p>Te nec scaevola recusabo, sea voluptua corrumpit et. Ex pri erant aliquid efficiantur, movet maiorum senserit an ius. Ad mea timeam suavitate vulputate. Tation graeci ut vim. Ea eos inani deseruisse, porro legimus ne vim.</p>
        <p>Eu ius latine volumus luptatum, ea iudico tempor vel. Solet eruditi delicatissimi sea eu. Animal mandamus ne vix, in melius sensibus dissentias est. Sea quis dolore philosophia te. Nostro feugiat accusam cum id. Ut noluisse partiendo qui, ius ea augue aeque oporteat.</p>');
    }

    public function down(): void
    {
        $this->migrator->delete('homePage.title');
        $this->migrator->delete('homePage.metaDescription');
        $this->migrator->delete('homePage.metaKeywords');
        $this->migrator->delete('homePage.headerTitle');
        $this->migrator->delete('homePage.headerSubtitle');
        $this->migrator->delete('homePage.topAd');
        $this->migrator->delete('homePage.middleAd');
        $this->migrator->delete('homePage.bottomAd');
        $this->migrator->delete('homePage.showShareButtons');
        $this->migrator->delete('homePage.content');
    }
};
